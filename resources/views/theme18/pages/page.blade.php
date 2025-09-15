@extends('theme18.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-area-three title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ $page->name }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ $page->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Help -->
    <div class="help-area help-area-two help-area-four pb-70">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="help-item help-left">
                        <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="help-item">
                        <div class="help-right">
                            <h2>{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                            <p>{!! $page->description !!}</p>
                            <div class="help-inner-left">
                                <ul>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        {{ __('Evrak ve Süreç Yönetimi') }}
                                    </li>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        {{ __('Güvenilir Hukuki Ağ') }}
                                    </li>
                                </ul>
                            </div>
                            <div class="help-inner-right">
                                <ul>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        {{ __('Memnun Müvekkil') }}
                                    </li>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        {{ __('Kişiye Özel Stratejiler')}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Help -->
@endsection
