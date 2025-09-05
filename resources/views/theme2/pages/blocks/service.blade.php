<!-- Service Section Start -->
<section class="service-section section-padding pt-0">
    <div class="service-shape float-bob-x">
        <img class="static-image" src="/theme2/img/service/service-shape.png"  alt="{{__('Ana Sayfa Hizmetlerimiz 1.Arkaplan Görseli')}}">
    </div>
    <div class="container">
        <div class="section-title text-center">
                    <span class="wow fadeInUp">
                        <img class="static-image" src="/theme2/img/icon/sub-title-icon.svg"  alt="{{__('Ana Sayfa Hizmetlerimiz 1. İkon')}}">
                        {{ __('Faaliyet Alanlarımız') }}
                    </span>
            <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                {{ __('Hizmet Sunduğumuz Alanlar') }}
            </h2>
        </div>
        <div class="swiper service-slider">
            <div class="swiper-wrapper">
                @foreach($allServices as $indexService)
                <div class="swiper-slide">
                    <div class="service-box-items">
                        <div class="icon">
                            <img class="static-image" src="/theme2/img/icon/icon-4.svg"  alt="{{__('Ana Sayfa Hizmetlerimiz 2. İkon')}}">
                        </div>
                        <div class="thumb">
                            <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}">
                            <a href="{{ route(getResourceFullLink('services','show'),$indexService) }}" class="arrow-icon">
                                <img class="static-image" src="/theme2/img/icon/big-arrow-right.svg"  alt="{{__('Ana Sayfa Hizmetlerimiz 3. İkon')}}">
                            </a>
                        </div>
                        <div class="content">
                            <h3><a href="{{ route(getResourceFullLink('services','show'),$indexService) }}">{{ $indexService->name }}</a></h3>
                            <p>
                                {!! $indexService->short_description !!}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-dot text-center">
                <div class="dot"></div>
            </div>
        </div>
    </div>
</section>
