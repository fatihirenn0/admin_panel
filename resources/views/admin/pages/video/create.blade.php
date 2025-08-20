@extends('admin.pages.build')
@section('parent_menu', __('Videolar'))
@section('parent_menu_link', route('admin.videos.index'))
@section('title',__('Video Ekle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <form id="mainForm" method="post" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-7 col-xl-9 col-sm-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="nav-align-top nav-tabs-shadow">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('inputs.select',[
                                        'options' =>['' => 'Kategori Seçilmedi'] + $videoCategories->pluck('name', 'id')->toArray() ,
                                        'title' => __('Kategoriler'),
                                        'name' => 'video_categories[]',
                                        'multiple' => true,
                                        'loopIndex' => 0
                                    ])
                                </div>
                                <div class="col-md-12">
                                    @include('inputs.input',[
                                        'title'=>__('İsim'),
                                        'name' =>'title',
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.input',[
                                        'title'=>__('Gösterim Sırası'),
                                        'type'=>'number',
                                        'name'=>'rank'
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.file',[
                                        'title'=>__('Video'),
                                        'name' =>'video_url',
                                        'loopIndex' => 0
                                    ])
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">{{ __('Kaydet') }}</button>
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
