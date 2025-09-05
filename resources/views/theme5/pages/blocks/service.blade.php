<!-- Service Section -->
<section class="service-section bg-white">
    <div class="divider"></div>

    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-md-4">
                <div class="section-heading pe-lg-4">
                    <div class="sub-title">
                        <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa Hizmetler İkon') }}">
                        {{ __('Hizmetlerimiz') }}
                    </div>
                    <h2>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h2>
                    <a class="btn btn-primary" href="{{ route(getResourceFullLink('services')) }}">
                        <span>{{ __('Hizmetler') }}<i class="ti ti-arrow-up-right"></i></span>
                        <span>{{ __('Hizmetler') }} <i class="ti ti-arrow-up-right"></i></span>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="swiper service-swiper-slider">
                    <div class="swiper-wrapper">
                        @foreach($allServices as $indexService)
                        <!-- Service Slide -->
                        <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" class="swiper-slide">
                            <div class="service-slide-card">
                                <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}">
                                <div class="title">{{ $indexService->name }}</div>
                                <p> {!! $indexService->short_description !!}
                                </p>
                                <div class="btn btn-link">{{ __('İncele') }} <i class="ti ti-arrow-up-right"></i></div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Service Navigation -->
            <div class="col-12">
                <div class="swiper-navigation-container service-swiper-slider-navigation">
                    <div class="service-button-prev">
                        <i class="ti ti-arrow-left"></i>
                    </div>
                    <div class="service-button-next">
                        <i class="ti ti-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>
</section>
