@extends('theme15.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Section: inner-header -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Kurumsal Sayfa Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ $page->name }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Ana Sayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2">{{ $page->name }}</span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: About -->
    <section class="bg-no-repeat bg-img-center-bottom static-bg-image" data-tm-bg-img="/theme15/images/bg/1.png" alt="{{ __('Kurumsal Sayfa Arka Plan Görseli') }}">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="tm-sc tm-sc-animated-layer-images mb-lg-80">
                            <div class="layer-image-wrapper tm-animation move-right">
                                <div class="layer-image"><img src="/storage/{{ $page->image }}" alt="{{ $page->name }}" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-7">
                        <h2 class="mt-0">{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
                        <p class="mt-30 mb-30">{!! $page->description !!}</p>
                        <div class="row">
                            <div class="mb-sm-40 col-md-3 col-lg-3 col-has-fill">
                                <div class="tm-sc tm-sc-funfact funfact text-center">
                                    <h2 class="counter mt-0 line-height-1 font-size-86 text-theme-colored2">
                                        <span class="animate-number" data-value="84" data-animation-duration="1500">0</span>
                                    </h2>
                                    <h5 class="mt-30 font-size-17">{{ __('Evrak ve Süreç Yönetimi') }}</h5>
                                </div>
                            </div>
                            <div class="mb-sm-40 col-md-3 col-lg-3 col-has-fill">
                                <div class="tm-sc tm-sc-funfact funfact text-center">
                                    <h2 class="counter mt-0 line-height-1 font-size-86 text-theme-colored2">
                                        <span class="animate-number" data-value="96" data-animation-duration="1500">0</span>
                                    </h2>
                                    <h5 class="mt-30 font-size-17">{{ __('Güvenilir Hukuki Ağ') }}</h5>
                                </div>
                            </div>
                            <div class="mb-sm-40 col-md-3 col-lg-3 col-has-fill">
                                <div class="tm-sc tm-sc-funfact funfact text-center">
                                    <h2 class="counter mt-0 line-height-1 font-size-86 text-theme-colored2">
                                        <span class="animate-number" data-value="68" data-animation-duration="1500">0</span>
                                    </h2>
                                    <h5 class="mt-30 font-size-17">{{ __('Memnun Müvekkil') }}</h5>
                                </div>
                            </div>
                            <div class="mb-sm-40 col-md-3 col-lg-3">
                                <div class="tm-sc tm-sc-funfact funfact text-center">
                                    <h2 class="counter mt-0 line-height-1 font-size-86 text-theme-colored2">
                                        <span class="animate-number" data-value="30" data-animation-duration="1500">0</span>
                                    </h2>
                                    <h5 class="mt-30 font-size-17">{{ __('Kişiye Özel Stratejiler')}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Divider -->
@endsection
