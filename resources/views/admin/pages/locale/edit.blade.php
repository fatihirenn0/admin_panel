@extends('admin.pages.build')
@section('title',__('Dil Düzenle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <form id="mainForm" method="post" action="#" enctype="multipart/form-data">
                @csrf @method('put')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('inputs.input',[
                                    'title'=>__('İsim'),
                                    'value'=>$locale->locale
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Email'),
                                   'value'=>$locale->language
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
                                @include('inputs.file',[
                                    'title'=>__('Resim'),
                                    'cropWidth' => 1200,
                                    'cropHeight' => 800,
                                    'value' => '/storage/'.$locale->image,
                                    'loopIndex' => 0
                                ])
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
