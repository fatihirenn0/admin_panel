@extends('admin.pages.build')
@section('title',__('Çeviri Yönetimi'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex mb-3" style="justify-content: space-between">
                            <h6 class="main-content-label mb-1">Çeviriler</h6>
                            <div>
                                <a href="{{ route('admin.translations',['type'=>'delete']) }}" onclick="return confirm('Bütün çevirileriniz gidecektir!')" class="btn btn-sm btn-danger">Kelimeleri Sil</a>
                                <a href="{{ route('admin.translations',['type'=>'find']) }}" class="btn btn-sm btn-primary">Kelimeleri Bul</a>
                                <a href="{{ route('admin.locales.index') }}" class="btn btn-sm btn-success">Dil Yönetimi</a>
                            </div>
                        </div>
                        <iframe src="/translations/view/_json" style="width: 100%;height: 600px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
