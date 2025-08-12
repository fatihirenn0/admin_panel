@extends('admin.pages.build')
@section('title',__('İletişim Mesaj Görüntüle'))
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
                                    'value'=>$contactMessage->name
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Email'),
                                   'value'=>$contactMessage->email
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Telefon'),
                                    'value'=>$contactMessage->telephone
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Konu'),
                                    'value'=>$contactMessage->subject
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.textarea',[
                                    'title'=>__('Mesaj'),
                                    'value'=>$contactMessage->message
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Diğer Alanlar'),
                                    'value'=>$contactMessage->other
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
