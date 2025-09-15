@php $slider = $sliders->first(); @endphp @if($slider)
    <div class="th-hero-wrapper hero-1" id="hero">
        <div class="shape-mockup hero-img-shape-1"></div>
        <div class="th-hero-bg static-bg-image" data-bg-src="/theme12/img/bg/hero_bg_1_1.jpg"><img src="/theme12/img/bg/hero1-overlay.png" alt="{{ __('Slider Arka Plan Görseli') }}" /></div>
        <div class="hero-1-scroll-icon-bg-shape scroll-down"></div>
        <div class="swiper th-slider" id="heroSlidee1" data-slider-options='{"effect":"fade", "autoHeight": "true"}'>
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="hero-inner hero-style1">
                            <div class="container">
                                <div class="row gy-4 align-items-center">
                                    <div class="col-xl-7 col-lg-7">
                                        <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s">{{ $slider->title }}</span>
                                        <div data-ani="slideinup" data-ani-delay="0.4s">
                                            <h1 class="hero-title">{!! $slider->text !!}</h1>
                                            <div class="hero-title">
                                                {!! $slider->sub_text !!}
                                            </div>
                                        </div>
                                        <div class="btn-group justify-content-center" data-ani="slideinup" data-ani-delay="0.6s">
                                            <a href="{{ $slider->link }}" class="th-btn">{{ $slider->link_text }} <i class="fa-regular fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5">
                                        <div class="hero-img">
                                            <div class="img-main" data-ani="slideinrighthero" data-ani-delay="0.8s"><img src="/storage/{{ $slider->file_url }}" alt="{{ $slider->title }}" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-pagination"></div>
        </div>
    </div>
@endif
