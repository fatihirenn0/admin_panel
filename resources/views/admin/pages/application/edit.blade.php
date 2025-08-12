@extends('admin.pages.build')
@section('title',__('Başvuru Görüntüler'))
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
                            'title'=>__('Başvuru Adı'),
                            'value'=>$application->name
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Meslek'),
                            'value'=>$application->job
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Email'),
                           'value'=>$application->email
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Tecrübe'),
                            'value'=>$application->experience
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Telefon'),
                            'value'=>$application->telephone
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.file',[
                            'title'=>__('Dosya'),
                            'value'=>$application->file,
                            'cropWidth' => 1200,
                            'cropHeight' => 800,
                            'loopIndex' => 0
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Mesaj'),
                            'value'=>$application->message
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Cinsiyet'),
                            'value'=>$application->gender
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Bölüm Departmanı'),
                            'value'=>$application->department
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Tarih'),
                            'value'=>$application->birthdate
                        ])
                    </div>
                    <div class="col-md-12 mt-2">
                        @include('inputs.input',[
                            'title'=>__('Diğer'),
                            'value'=>$application->type
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
