<!-- Service Start -->
<section class="service-section-home1 pbmit-element-service-style-1" data-cursor="global-color">
    <div class="container">
        <div class="pbmit-heading text-left bg-color-dark animation-style2">
            <h2 class="pbmit-title">
                {{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}
            </h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="swiper-slider pbmit-element-service-style-1" data-cursor-text="Drag" data-loop="true" data-autoplay="false" data-dots="false" data-arrows="false" data-columns="2.5" data-margin="30" data-effect="slide">
                    <div class="pbmit-ele-header-area"></div>
                    <div class="swiper-wrapper">
                        @foreach($allServices as $indexService)
                            <div class="swiper-slide">
                                <!-- Slide1 -->
                                <article class="pbmit-service-style-1">
                                    <div class="pbminfotech-post-item">
                                        <div class="d-flex">
                                            <div class="pbmit-service-image-wrapper static-bg-image" style="background-image:url('/storage/{{ $indexService->image }}')" alt="{{ $indexService->name }}">
                                                <div class="pbmit-featured-img-wrapper">
                                                    <div class="pbmit-featured-wrapper">
                                                        <img src="/storage/{{ $indexService->image }}" class="img-fluid" alt="{{ $indexService->name }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pbminfotech-box-content pbmit-text-color-white">
                                                <div class="pbminfotech-box-number">{{ $indexService->id }}</div>
                                                <h3 class="pbmit-service-title">
                                                    <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}">{{ $indexService->name }}</a>
                                                </h3>
                                                <div class="pbmit-service-content">
                                                    <div class="at-above-post-homepage addthis_tool"></div>
                                                    <p>
                                                        {!! $indexService->short_description !!}
                                                    </p>
                                                    <div class="at-below-post-homepage addthis_tool"></div>
                                                </div>
                                                <div class="pbmit-service-icon-wrapper">
                                                    <i class="pbmit-attorly-icon pbmit-attorly-icon-gavel-2"></i>
                                                </div>
                                                <div class="pbmit-service-btn">
                                                    <a class="btn-arrow" href="{{ route(getResourceFullLink('services','show'), $indexService) }}"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service End -->
