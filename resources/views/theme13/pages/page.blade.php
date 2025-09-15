@extends('theme13.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Banner section -->
    <section class="about-banner position-relative space-header">
        <div class="container position-relative">
            <div class="about-line-1 d-none d-xl-block"></div>
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ $page->name }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ $page->name }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section id="about" class="about about-page">
        <div class="right-text d-none d-lg-block">
            <h2 class="vertical">
                {{ $page->name }}
            </h2>
        </div>
        <img src="/storage/{{ $page->image }}" class="about-img img-fluid d-none d-xl-block" alt="" />
        <div class="counter-wrapper position-relative z-3">
            <div class="container counter">
                <div class="row g-3 text-center counter-inner">
                    <div class="col-sm-6 col-lg-3 d-flex flex-column align-items-center z-1">
                        <h2 class="display-3 mb-0"><span id="odometer1" class="odometer fw-semibold" data-count="25"></span>+</h2>
                        <span>{{ __('Evrak ve Süreç Yönetimi') }}</span>
                    </div>
                    <div class="col-sm-6 col-lg-3 d-flex flex-column align-items-center z-1">
                        <h2 class="display-3 mb-0"><span id="odometer2" class="odometer fw-semibold" data-count="3.7"></span>k+</h2>
                        <span>{{ __('Güvenilir Hukuki Ağ') }}</span>
                    </div>
                    <div class="col-sm-6 col-lg-3 d-flex flex-column align-items-center z-1">
                        <h2 class="display-3 mb-0"><span id="odometer3" data-count="500" class="odometer fw-semibold"></span>+</h2>
                        <span>{{ __('Memnun Müvekkil') }}</span>
                    </div>
                    <div class="col-sm-6 col-lg-3 d-flex flex-column align-items-center z-1 full-width">
                        <h2 class="display-3 mb-0"><span id="odometer4" data-count="47" class="odometer fw-semibold"></span>+</h2>
                        <span>{{ __('Kişiye Özel Stratejiler')}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-inner overflow-x-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-6 z-2 position-relative">
                        <div class="about-content">
                            <h2 class="fw-semibold text-white mb-3">{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                            <p class="text-light pb-lg-3">{!! $page->description !!}</p>
                            <ul class="team-feature">
                                <li><i class="ti ti-discount-check"></i> <span>{{ __('Sigorta Hukuku') }} </span></li>
                                <li><i class="ti ti-discount-check"></i> <span>{{ __('Ceza Hukuku') }}</span></li>
                                <li><i class="ti ti-discount-check"></i> <span>{{ __('Ticaret Hukuku') }} </span></li>
                            </ul>
                            <a href="{{ route(getOtherFullLink('contact')) }}" class="primary-btn">{{ __('Bize Ulaşın') }} <i class="ti ti-arrow-up-right"></i> </a>
                        </div>
                        <div class="about-line-1"></div>
                        <div class="about-line-2"></div>
                        <div class="about-line-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
