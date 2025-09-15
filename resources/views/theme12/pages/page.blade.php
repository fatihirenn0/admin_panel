@extends('theme12.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Kurumsal Sayfa Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $page->name }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $page->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-1-wrapper space bg-smoke2" id="about-sec">
        <div class="shape-mockup jump" data-left="0%" data-bottom="0%"><img class="static-image" src="/theme12/img/shape/about1-left-shape.png" alt="{{ __('Kurumsal Sayfa 1.İkon') }}" /></div>
        <div class="shape-mockup jump" data-top="11%" data-right="4%"><img class="static-image" src="/theme12/img/shape/about1-right-top.png" alt="{{ __('Kurumsal Sayfa 2.İkon') }}" /></div>
        <div class="shape-mockup jump-reverse d-none d-md-block" data-right="0" data-bottom="4%"><img class="static-image" src="/theme12/img/shape/about1-right-bottom.png" alt="{{ __('Kurumsal Sayfa 3.İkon') }}" /></div>
        <div class="container">
            <div class="row gy-40 gx-60 align-items-center">
                <div class="col-xl-7 mb-xl-0">
                    <div class="img-box1 about-1">
                        <div class="shape-mockup logo-shape">
                        </div>
                        <div class="img1"><img class="tilt-active" src="/storage/{{ $page->image }}" alt="{{ $page->name }}" /></div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="title-area mb-25">
                        <span class="sub-title before-none">{{ $page->name }}</span>
                        <h2 class="sec-title">{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                        <p class="sec-text">{!! $page->description !!}</p>
                    </div>
                    <div>
                        <a href="{{ route(getOtherFullLink('contact')) }}" class="th-btn style4">{{ __('Bize Ulaşın') }} <i class="fa-regular fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
