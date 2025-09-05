<!-- Marquee Section -->
<section class="marquee-section-two">
    <div class="marquee-two">
        <div class="marquee-group">
            <div class="text" data-text="{{ __('Danışmanlık') }}">{{ __('Danışmanlık') }}</div>
            <div class="text" data-text="{{ __('İrensoft') }}">{{ __('İrensoft') }}</div>
            <div class="text" data-text="{{ __('Danışmanlık') }}">{{ __('Danışmanlık') }}</div>
            <div class="text" data-text="{{ __('Hukuk') }}">{{ __('Hukuk') }}</div>
            <div class="text" data-text="{{ __('Avukat') }}">{{ __('Avukat') }}</div>
        </div>
        <div aria-hidden="true" class="marquee-group">
            <div class="text" data-text="{{ __('Danışmanlık') }}">{{ __('Danışmanlık') }}</div>
            <div class="text" data-text="{{ __('İrensoft') }}">{{ __('İrensoft') }}</div>
            <div class="text" data-text="{{ __('Danışmanlık') }}">{{ __('Danışmanlık') }}</div>
            <div class="text" data-text="{{ __('Hukuk') }}">{{ __('Hukuk') }}</div>
            <div class="text" data-text="{{ __('Avukat') }}">{{ __('Avukat') }}</div>
        </div>
    </div>
</section>
<!-- End Marquee Section -->
<!-- Feature Section -->
<section class="product-section">
    <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/background/bg-product1-1.jpg);" alt="{{__('Anasayfa Hizmetler Arka Plan')}}"></div>
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ __('Hizmetlerimiz') }}</span>
            <h2 class="words-slide-up text-split">{{ __('Haklarınızı koruyor, hızlı ve güvenilir hukuki çözümler sunuyoruz.') }}</h2>
        </div>
        <div class="carousel-outer">
            <div class="team-carousel owl-carousel owl-theme default-dots">
                <!-- News Block -->
                @foreach($allServices as $indexService)
                    <div class="product-block wow fadeInUp" data-wow-delay="300ms">
                        <div class="inner-box text-start">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ route(getResourceFullLink('services')) }}"><img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" /></a>
                                </figure>
                            </div>
                            <div class="content-box">
                                <h4 class="title"><a href="{{ route(getResourceFullLink('services')) }}">{{ $indexService->name }}</a></h4>
                                <p class="text">{!! $indexService->short_description !!}</p>
                                <a href="{{ route(getResourceFullLink('services')) }}" class="read-more">{{ __('İncele') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--End Feature Section -->
