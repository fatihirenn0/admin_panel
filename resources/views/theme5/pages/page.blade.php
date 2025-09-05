@extends('theme5.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{ __('Kurumsal Sayfa Görseli') }}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ $page->name }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}"> {{ __('Ana Sayfa') }}<</a></li>
                    <li>{{ $page->name }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- About Section -->
    <section class="about-section bg-secondary">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- About Thumbnail -->
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail">
                        <div class="row g-4 align-items-end">
                            <div class="col-12 col-sm-6">
                                <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}" class="wow fadeInUp w-100" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <!-- Experience Card -->
                                <div class="experience-card mt-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
                                    <h2><span class="counter">{{ __('20') }}</span><span>+</span></h2>
                                    <p class="mb-0">{{ __('Yıllık Tecrübe') }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <img class="static-image" src="/theme5/img/bg-img/4.jpg" alt="" class="wow fadeInUp w-100" data-wow-duration="1000ms" data-wow-delay="1000ms" alt="{{ __('Hakkımızda Sayfası 2.Görsel') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Content -->
                <div class="col-12 col-lg-6">
                    <div class="about-content ps-md-4">
                        <div class="section-heading">
                            <div class="sub-title">
                                <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Hakkımızda Sayfası İkon') }}">
                                {{ $page->name }}
                            </div>
                            <h2 class="mb-4">{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                            <p class="mb-5">{!! $page->description !!}
                            </p>
                            <a class="btn btn-primary mb-5" href="{{ route('site.contact') }}">
                                <span>{{ __('Bize Ulaşın') }} <i class="ti ti-arrow-up-right"></i></span>
                                <span>{{ __('Bize Ulaşın') }} <i class="ti ti-arrow-up-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>
    </section>

@endsection
