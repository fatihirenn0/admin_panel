@extends('admin.pages.build')
@section('title',__('İletişim Kişileri Görüntüle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <form id="mainForm" method="post" action="{{ route('admin.contact-people.update', $contactPeople) }}" enctype="multipart/form-data">
                @csrf @method('put')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('inputs.input',[
                                    'title'=>__('İsim'),
                                    'name' =>'name',
                                    'value'=>$contactPeople->name
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Email'),
                                   'name' =>'email',
                                   'value'=>$contactPeople->email
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Telefon'),
                                    'name' =>'telephone',
                                    'value'=>$contactPeople->telephone
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.input',[
                                    'title'=>__('Gösterim Sırası'),
                                    'type'=>'number',
                                    'name'=>'rank',
                                    'value' => $contactPeople->rank
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.textarea',[
                                    'title'=>__('Adres'),
                                    'name' =>'address',
                                    'value' => $contactPeople->address
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('inputs.file',[
                                    'title'=>__('Resim'),
                                    'name' =>'image',
                                    'value' => '/storage/'.$contactPeople->image,
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
