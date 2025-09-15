@extends('theme17.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ $page->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-box">
        <ul>
            <li>
                <a href="{{ route('site.index') }}" title="{{ __('Ana Sayfa') }}">{{ __('Ana Sayfa') }}</a>
            </li>
            <li>{{ $page->name }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Us Start -->
    <section class="main-about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-us-img-box wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="about-us-img back-img" style="background-image: url('/storage/{{ $page->image }}')"></div>
                        <div class="about-counter-box" id="about_counter">
                            <h3 class="h3-title"><span data-count="584" class="counting">0</span>+</h3>
                            <h4 class="h4-title">{{ __('Memnun Müvekkil') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-content wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <span class="sub-title">{{ $page->name }}</span>
                        <h2 class="h2-title">{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                        <p>
                            {!! $page->description !!}
                        </p>

                        <div class="faq-accordion">
                            <div class="faq-accordion-box">
                                <div class="faq-accordion-title">
                                    <h4 class="h4-title">{{ __('Misyonumuz') }}</h4>
                                    <span class="icon"><i class="fas fa-arrow-right"></i></span>
                                </div>
                                <div class="faq-accordion-content">
                                    <p>{{ __('Alanında uzman hukukçularımız ve danışmanlarımızla, her bir müvekkilin hakkını koruma sorumluluğunu taşıyoruz.') }}</p>
                                </div>
                            </div>
                            <div class="faq-accordion-box">
                                <div class="faq-accordion-title">
                                    <h4 class="h4-title">{{ __('Vizyonumuz') }}</h4>
                                    <span class="icon"><i class="fas fa-arrow-right"></i></span>
                                </div>
                                <div class="faq-accordion-content">
                                    <p>
                                        {{ __('Hukukun üstünlüğünü esas alarak; etik değerlere bağlı, yenilikçi, çözüm odaklı ve müvekkil memnuniyetini ön planda tutan bir anlayışla, sadece bugün değil geleceğin de hukukunu şekillendiren bir
                                        hukuk ofisi olmak.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us End -->
@endsection
