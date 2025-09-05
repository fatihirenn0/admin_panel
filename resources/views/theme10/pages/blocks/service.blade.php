<!-- Services Section Two -->
<section class="services-section-two static-image" style="background-image: url(/theme10/images/background/1.jpg);" alt="{{ __('Anasayfa Hizmetler Görseli') }}">
    <div class="container">
        <!-- Sec Title -->
        <div class="section-title light centered">
            <div class="title">{{ __('Hizmetlerimiz') }}</div>
            <h3>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h3>
        </div>
        <div class="row clearfix">
            @foreach($allServices as $indexService)
                <!-- Services Block Two -->
                <div class="services-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" />
                        </div>
                        <h3>{{ $indexService->name }}</h3>
                        <div class="text">{!! $indexService->short_description !!}</div>
                        <div class="overlay-box" style="background-image: url('/storage/{{ $indexService->image }}');">
                            <div class="overlay-inner">
                                <div class="content">
                                    <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}" />
                                    <h4><a href="{{ route(getResourceFullLink('services')) }}">{{ $indexService->name }}</a></h4>
                                    <a href="{{ route(getResourceFullLink('services')) }}" class="theme-btn btn-style-one">{{ __('Tüm Hizmetler') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Lower Section -->
        <div class="lower-section">
            <div class="carousel-box">
                <div class="content">
                    <div class="single-item-carousel owl-carousel owl-theme">
                        @foreach($allComments as $indexComment)
                            <!-- Testimonial Block -->
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="testimonial-content">
                                        <span class="quote-icon flaticon-left-quote"></span>
                                        <div class="text">{{ $indexComment->comment }}</div>
                                        <!-- Lower Box -->
                                        <div class="lower-box">
                                            <div class="box-inner">
                                                <div class="image">
                                                    <img src="/storage/{{ $indexComment->image }}" alt="" />
                                                </div>
                                                <h3>{{ $indexComment->name }}</h3>
                                                <div class="designation">{{ $indexComment->job }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Section Two -->
