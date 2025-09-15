@extends('theme14.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')

    <!-- Breadcrumb area start here -->
    <section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('Kurumsal Sayfa Görseli') }}">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ $page->name }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ $page->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end here -->

    <!-- About area start here -->
    <section class="about-two-area bg-sub pt-120 pb-120">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-6">
                    <div class="about-two-left">
                        <div class="section-header mb-50">
                            <h6>{{ $page->name }}</h6>
                            <h2 class="wow splt-txt" data-splitting>{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                        </div>
                        <div class="about-two__image imageUpToDown wow gsap__parallax">
                            <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-two-right">
                        <div class="section-header mb-20">
                            <p class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                                {!! $page->description !!}
                            </p>
                        </div>
                        <div class="about-two__content">
                            <ul class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <li><i class="fa-light fa-check"></i>{{ __('Evrak ve Süreç Yönetimi') }}</li>
                                <li><i class="fa-light fa-check"></i>{{ __('Güvenilir Hukuki Ağ') }}</li>
                            </ul>
                            <ul class="wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <li><i class="fa-light fa-check"></i>{{ __('Memnun Müvekkil') }}</li>
                                <li><i class="fa-light fa-check"></i>{{ __('Kişiye Özel Stratejiler')}}</li>
                            </ul>
                        </div>
                        <a href="{{ route(getOtherFullLink('contact')) }}" class="btn-discover mt-50 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms" data-splitting data-text="{{ __('Bize Ulaşın') }}">{{ __('Bize Ulaşın') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About area end here -->
@endsection
