@extends('theme13.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Banner section -->
    <section class="about-banner position-relative space-header">
        <div class="container position-relative">
            <div class="about-line-1 d-none d-xl-block"></div>
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Anasayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- experts section -->
    <section class="services experts overflow-x-hidden" id="experts">
        <div class="left-text d-none d-xl-block">
            <h2 class="vertical-white">{{ __('Ekibimiz') }}</h2>
        </div>

        <div class="container">
            <div class="row align-items-end g-4 section-title">
                <div class="col-lg-6">
                    <h2 class="mb-3">{{ __('Her Alanda Uzman Avukat Kadromuz') }}</h2>
                    <p>{{ __('Her biri kendi alanında deneyimli avukatlarımız; dava stratejisi, danışmanlık ve müzakere süreçlerinde şeffaf, çözüm odaklı ve etik bir yaklaşım benimser. Müvekkillerimizin ihtiyaçlarına özel çözümler üreterek sürecin her adımında yanlarında oluruz.') }}</p>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <div class="btns">
                        <button class="expert-prev"><i class="ti ti-arrow-narrow-left"></i></button>
                        <button class="expert-next"><i class="ti ti-arrow-narrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="swiper expertSwiper">
                <div class="swiper-wrapper">
                    @foreach($teams as $team)
                        <div class="swiper-slide">
                        <div class="expert-card">
                            <div class="img-box">
                                <img src="/storage/{{ $team->image }}" class="img-fluid" alt="{{ $team->name }}">
                                <div class="social">
                                    <ul class="links mb-0">
                                        @if($team->facebook)
                                            <li><a href="{{ $team->facebook }}"><i class="ti ti-brand-facebook"></i></a></li>
                                        @endif
                                        @if($team->twitter)
                                            <li><a href="{{ $team->twitter }}"><i class="ti ti-brand-twitter"></i></a></li>
                                        @endif
                                        @if($team->linkedin)
                                            <li><a href="{{ $team->linkedin }}"><i class="ti ti-brand-linkedin"></i></a></li>
                                        @endif
                                        @if($team->instagram)
                                            <li><a href="{{ $team->instagram }}"><i class="ti ti-brand-instagram"></i></a></li>
                                        @endif
                                        @if($team->tiktok)
                                            <li><a href="{{ $team->tiktok }}"><i class="ti ti-brand-tiktok"></i></a></li>
                                        @endif
                                        @if($team->youtube)
                                            <li><a href="{{ $team->youtube }}"><i class="ti ti-brand-youtube"></i></a></li>
                                        @endif
                                        @if($team->github)
                                            <li><a href="{{ $team->github }}"><i class="ti ti-brand-github"></i></a></li>
                                        @endif
                                    </ul>
                                    <button class="social-btn z-2"><i class="ti ti-plus"></i></button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between card-footer align-items-end">
                                <div>
                                    <h5 class="fw-semibold">{{ $team->name }}</h5>
                                    <p class="mb-0">{{ $team->job }}</p>
                                </div>
                                <div class="number">
                                    {{ $team->id }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
