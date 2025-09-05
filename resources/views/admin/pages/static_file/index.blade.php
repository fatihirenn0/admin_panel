@extends('admin.pages.build')
@section('title',__('Statik Dosyalar'))
@push('css')
    <style>
        .view-icon-bg{
            position: absolute;
            left: 5px;
            top: 5px;
            background: #fff;
            padding: 1px;
            border-radius: 10px;
        }
    </style>
@endpush
@php
    function formatBytes($bytes, $precision = 2) {
       $units = ['B', 'KB', 'MB', 'GB', 'TB'];
       $bytes = max($bytes, 0);
       $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
       $pow = min($pow, count($units) - 1);
       $bytes /= pow(1024, $pow);
       return round($bytes, $precision) . ' ' . $units[$pow];
   }
@endphp
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-12 g-6">
            @foreach($items as $staticFile)
                <div class="col-12 col-md-6">
                    <form method="post" action="{{ route('admin.static-files.update',$staticFile) }}" enctype="multipart/form-data">@csrf @method('put')
                        <div class="card">
                            <div class="d-flex flex-md-row flex-column">
                                <div class="text-center">
                                    @php
                                        $accept = '';
                                        $width = 0;
                                        $height = 0;
                                        $path = public_path(ltrim($staticFile->file_path, '/'));
                                        if(file_exists($path)) {
                                            $fileSize = filesize($path);
                                        }

                                        if(\Illuminate\Support\Str::startsWith($staticFile->mime_type, 'image/')) {
                                            $accept = 'image/*';
                                            [$width, $height] = getimagesize($path);
                                        } elseif(\Illuminate\Support\Str::startsWith($staticFile->mime_type, 'video/')) {
                                            $accept = 'video/*';
                                        }
                                    @endphp
                                    <div>
                                        <a href="{{ $staticFile->file_path }}" target="_blank" class="view-icon-bg">
                                            <i style="margin-inline-end: 0" class="menu-icon icon-base ti tabler-eye"></i>
                                        </a>
                                        <img id="preview{{ $staticFile->id }}"
                                             class="card-img card-img-left"
                                             style="width: 140px;height: 210px"
                                             src="{{ $staticFile->file_path }}"
                                             data-original="{{ $staticFile->file_path }}"
                                             alt="" />
                                    </div>
                                    <button onclick="$('#fileInput{{ $staticFile->id }}').click()" type="button"
                                            class="btn btn-sm btn-secondary mt-2">Görseli Değiştir {{ $width > 0 && $height > 0 ? "({$width}x{$height})" : "" }}</button>
                                    <input id="fileInput{{ $staticFile->id }}"
                                           type="file"
                                           name="file"
                                           @if($width > 0 && $height > 0)
                                               data-cropWidth="{{ $width }}" data-cropHeight="{{ $height }}"
                                                class="crop-static-image"
                                           @endif
                                           accept="{{ $accept }}"
                                           style="display: none"
                                           onchange="previewFile(this, 'preview{{ $staticFile->id }}')">
                                </div>
                                <div class="w-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $staticFile->name }}</h5>
                                        <p class="text-muted mb-1">Boyut: {{ formatBytes($fileSize) }}</p>
                                        @foreach($locales as $locale)
                                            <div class="mt-1">
                                                @include('inputs.input',[
                                                    'title'=>'Alt Etiketi ('.$locale->language.')',
                                                    'value' => $staticFile->getTranslation('alt',$locale->locale),
                                                    'name' => 'alt['.$locale->locale.']'
                                                ])
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('js')
    <script>
        function previewFile(input, previewId) {
            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(previewId).src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }

                if (file.type.startsWith('video/')) {
                    const video = document.createElement('video');
                    video.src = URL.createObjectURL(file);
                    video.style.width = '140px';
                    video.style.height = '210px';
                    video.controls = true;

                    const container = document.getElementById(previewId).parentNode;
                    container.replaceChild(video, document.getElementById(previewId));
                    video.id = previewId;
                }
            }
        }

        // ✅ Görsel Kırpma
        const cropImageElements = document.querySelectorAll('.crop-static-image');
        const modalImage = document.getElementById('modalImage');
        const cropImageButton = document.getElementById('cropImageButton');
        let fileInput = null;
        const modal = new bootstrap.Modal(document.getElementById('imageCropModal'));
        let fileName = null;
        let cropWidth = null;
        let cropHeight = null;
        let cropper;

        cropImageElements.forEach(function (cropImageElement){
            cropImageElement.addEventListener('change', function (event) {
                fileInput = event.target;
                cropWidth = fileInput.dataset.cropwidth;
                cropHeight = fileInput.dataset.cropheight;
                const files = event.target.files;

                if (files && files.length > 0) {
                    const file = files[0];
                    if (file.type.startsWith('video/')) return;

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        modalImage.src = e.target.result;
                        modalImage.style.display = 'block';
                        modal.show();

                        document.getElementById('imageCropModal').addEventListener('shown.bs.modal', function () {
                            if (cropper) cropper.destroy();

                            cropper = new Cropper(modalImage, {
                                aspectRatio: cropWidth / cropHeight,
                                viewMode: 2,
                                responsive: true,
                                cropBoxResizable: false,
                                dragMode: 'move',
                                cropBoxMovable: true,
                                autoCropArea: 1,
                            });
                        }, { once: true });
                    };
                    reader.readAsDataURL(file);
                    fileName = file.name;
                }
            });
        });

        cropImageButton?.addEventListener('click', function () {
            if (cropper) {
                const canvas = cropper.getCroppedCanvas({
                    width: cropWidth,
                    height: cropHeight
                });

                canvas.toBlob(function (blob) {
                    const file = new File([blob], fileName, { type: "image/webp" });
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;

                    // anında önizlemeyi güncelle
                    document.getElementById(fileInput.id.replace('fileInput','preview')).src = URL.createObjectURL(file);

                    modal.hide();
                }, 'image/webp');
            }
        });

        document.getElementById('cancelCropImageButton')?.addEventListener('click', function () {
            if (fileInput) {
                // input temizle
                fileInput.value = "";

                // önizlemeyi eski haline getir
                const previewId = fileInput.id.replace('fileInput','preview');
                const previewEl = document.getElementById(previewId);
                const originalSrc = previewEl.getAttribute('data-original');
                if (originalSrc) {
                    previewEl.src = originalSrc;
                }
            }

            modal.hide();
        });

    </script>
@endpush

