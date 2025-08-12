@extends('admin.pages.build')
@section('title',__('Dosya Ekle'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <form id="mainForm" method="post" action="{{ route('admin.files.store') }}" enctype="multipart/form-data">
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
                                    @include('inputs.input',[
                                        'title'=>__('İsim'),
                                        'name' =>'name',
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.file',[
                                        'title'=>__('Resim'),
                                        'name' =>'file_url',
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
