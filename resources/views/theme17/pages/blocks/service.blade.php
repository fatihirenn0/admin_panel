<!-- Our Services Start -->
<section class="main-our-services">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="our-services-title">
                    <span class="sub-title">{{ __('Hizmetlerimiz') }}</span>
                    <h2 class="h2-title">{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="our-services-content">
                    <a href="{{ route(getResourceFullLink('services')) }}" class="link-btn" title="Discover More Services"><span>{{ __('Tüm Hizmetler') }}</span> <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="services-list">
            <div class="services-list-bg-shape">
                <img class="static-bg-image" src="/theme17/images/service-list-bg-shape.svg" width="1936" height="218" alt="{{ __('Anasayfa Hizmetler Arka Plan Görseli') }}" />
            </div>
            <div class="row">
                @foreach($allServices as $indexService)
                    <div class="col-md-6 col-xl-3">
                        <div class="service-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <div class="icon">
                                <img src="/storage/{{ $indexService->image }}" width="35" height="35" alt="{{ $indexService->name }}" />
                            </div>
                            <h4 class="h4-title">
                                <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" title="{{ $indexService->name }}">{{ $indexService->name }}</a>
                            </h4>
                            <p>{!! $indexService->short_description !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Our Services End -->
