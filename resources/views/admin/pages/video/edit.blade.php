@extends('admin.pages.build')
@section('title',__('Video Görüntüle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <form id="mainForm" method="post" action="{{ route('admin.videos.update', $video) }}" enctype="multipart/form-data">
                @csrf @method('put')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="col-md-12">
                                        @include('inputs.select',[
                                            'options' =>['' => 'Kategori Seçilmedi'] + $videoCategories->pluck('name', 'id')->toArray() ,
                                            'title' => __('Kategoriler'),
                                            'name' => 'video_category_id',
                                            'loopIndex' => 0,
                                            'selected' => $videoVideoCategories
                                        ])
                                    </div>
                                @include('inputs.input',[
                                    'title'=>__('İsim'),
                                    'name' =>'title',
                                    'value'=>$video->title
                                ])
                            </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.input',[
                                        'title'=>__('Gösterim Sırası'),
                                        'type'=>'number',
                                        'name'=>'rank',
                                        'value' => $video->rank
                                    ])
                                </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.file',[
                                    'title'=>__('Video'),
                                    'name' =>'video_url',
                                    'value' => '/storage/'.$video->video_url,
                                    'loopIndex' => 0
                                ])
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">{{ __('Kaydet') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="/panel/assets/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': '{{__('Dosya Sürükle veya Tıkla')}}',
                'replace': '{{ __('Dosya Sürükle veya Tıkla') }}',
                'remove':  '{{ __('Kaldır') }}',
                'error':   '{{ __('Bir Hata Ortaya Çıktı') }}'
            }
        });
    </script>
@endpush
