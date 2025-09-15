<!-- Popular Services Area Start Here -->
<section class="service-popular pt-130 pb-130">
    <div class="container">
        <div class="section-header text-center mb-50">
            <h6>{{ __('Hizmetlerimiz') }}</h6>
            <h2 class="wow splt-txt" data-splitting>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h2>
        </div>
        <div class="service-popular__wrp">
            <div class="row g-0">
                @foreach($allServices as $indexService)
                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-sm-12">
                    <div class="service-popular__item text-center">
                        <figure class="image-box">
                            <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}">
                        </figure>
                        <h4 class="title">{{ $indexService->name }}</h4>
                        <p class="text">{!! $indexService->short_description  !!}</p>
                        <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" class="btn-more-2 mt-25 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms" data-splitting data-text="{{ __('İncele') }}">{{ __('İncele') }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Popular Services Area End Here -->
