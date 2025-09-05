@extends('theme7.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')

    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ $page->name }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ $page->name }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- About Start -->
    <section class="about-light-section">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="about-dark-left-section">
                        <div class="pbmit-heading animation-style2">
                            <h2 class="pbmit-title">{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                            <div class="pbmit-heading-desc">{!! $page->description !!}</div>
                        </div>
                    </div>
                    <div class="text-end pbmit-animation-style1">
                        <img class="static-image" src="/theme7/images/pbmit-about2-new.png" class="img-fluid" alt="{{ __('Hakkımızda Sayfası 2. Görsel') }}" />
                    </div>
                </div>
                <div class="col-md-6 pbmit-bg-color-white">
                    <div class="about-dark-right-section">
                        <div class="pbminfotech-ele-fid-style-1">
                            <div class="pbmit-fld-contents">
                                <div class="pbmit-fld-wrap">
                                    <div class="pbmit-fid-title">{{ __('İtibaren') }}</div>
                                    <h4 class="pbmit-fid-inner">
                                        <span class="pbmit-fid"></span>
                                        <span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="1987" data-interval="10" data-before="" data-before-style="" data-after="" data-after-style="">
                                        1987
                                    </span>
                                        <span class="pbmit-fid"></span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="text-end pbmit-animation-style2">
                                <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}" class="img-fluid" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->
@endsection
