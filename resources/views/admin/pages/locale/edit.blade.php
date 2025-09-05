@extends('admin.pages.build')
@section('parent_menu', __('Diller'))
@section('parent_menu_link', route('admin.locales.index'))
@section('title',__('Dil Düzenle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <form id="mainForm" method="post" action="{{ route('admin.locales.update',$locale) }}" enctype="multipart/form-data">
                <div class="col-xxl-7 col-xl-9 col-sm-12">
                    @csrf @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('inputs.input',[
                                        'title'=>__('Kod'),
                                        'value'=>$locale->locale,
                                        'disabled' => true
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.input',[
                                        'title'=>__('Dil'),
                                       'value'=>$locale->language,
                                       'name' => 'language'
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.input',[
                                        'title'=>__('Gösterim Sırası'),
                                        'type'=>'number',
                                        'name'=>'rank',
                                        'value' => $locale->rank
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.select',[
                                        'title'=>__('Varsayılan Dil'),
                                        'name'=>'default',
                                        'options' => ['1'=>'Evet','0'=>'Hayır'],
                                        'selected' => $locale->default
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.select',[
                                        'title'=>__('Aktiflik Durumu'),
                                        'name'=>'active',
                                        'options' => ['1'=>'Aktif','0'=>'Pasif'],
                                        'selected' => $locale->active
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.file',[
                                        'title'=>__('Resim'),
                                        'cropWidth' => 256,
                                        'cropHeight' => 256,
                                        'value' => '/storage/'.$locale->image,
                                        'loopIndex' => 0,
                                        'name' => 'image'
                                    ])
                                </div>
                                <div class="col-md-6 mt-2">
                                    <button class="btn btn-primary">Kaydet</button>
                                </div>
                            </div>
                        </div>
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
