<section class="th-service-1 overflow-hidden space" id="service-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-8">
                <div class="title-area text-center">
                    <span class="sub-title justify-content-center">{{ __('Hizmetlerimiz') }}</span>
                    <h2 class="sec-title">{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h2>
                </div>
            </div>
        </div>
        <div class="row gy-30 justify-content-center">
            @foreach($allServices as $indexService)
                <div class="col-xl-4 col-md-6">
                <div class="service-card">
                    <div class="shape-mockup service_card-bg-1"><img class="static-image" src="/theme12/img/bg/service_card-bg-1_1.png" alt="{{ __('Anasayfa Hizmetler İkon') }}" /></div>
                    <div class="box-icon"><img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" /></div>
                    <div class="box-content">
                        <h3 class="box-title"><a href="{{ route(getResourceFullLink('services')) }}">{{ $indexService->name }}</a></h3>
                        <p class="box-text">{!! $indexService->short_description !!}</p>
                    </div>
                    <a href="{{ route(getResourceFullLink('services')) }}" class="link-btn">{{ __('İncele') }} <i class="fa-regular fa-arrow-right-long"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
