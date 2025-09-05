<!-- main-slider-start -->
<section class="main-slider-two" id="home">
    @php $slider = $sliders->first(); @endphp @if($slider)
        <div
            class="main-slider-two__carousel procounsel-owl__carousel owl-carousel"
            data-owl-options='{
		"loop": true,
		"animateOut": "fadeOut",
		"animateIn": "fadeIn",
		"items": 1,
		"autoplay": true,
		"autoplayTimeout": 7000,
		"smartSpeed": 1000,
		"nav": false,
        "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
		"dots": true,
		"margin": 0
	    }'
        >
            @foreach($sliders as $slider)
                <div class="item">
                    <div class="main-slider-two__item">
                        <div class="main-slider-two__shape-one static-image" style="background-image: url(/theme4/images/shapes/hero-banner-2-1-shape.png);" alt="{{ __('Anasayfa Slider 1. Görsel') }}"></div>
                        <div class="main-slider-two__shape-two static-image" style="background-image: url(/theme4/images/shapes/hero-banner-2-2-shape.png);" alt="{{ __('Anasayfa Slider 2. Görsel') }}"></div>
                        <div class="main-slider-two__bg" style="background-image: url('/storage/{{ $slider->file_url }}');" alt="{{ $slider->name }}"></div>
                        <!-- bg -->
                        <div class="main-slider-two__overlay"></div>
                        <div class="container text-center">
                            <div class="main-slider-two__content">
                                <h3 class="main-slider-two__sub__title">{{ $slider->title}}</h3>
                                <h2 class="main-slider-two__title">
                                    {{ $slider->text }}
                                </h2>
                                <!-- slider-title -->
                                <div class="main-slider-two__btn">
                                    @if($slider->link)
                                        <a href="{{ $slider->link }}" class="procounsel-btn">
                                            <i>{{ $slider->link_text }}</i>
                                            <span>{{ $slider->link_text }}</span>
                                        </a>
                                        <!-- slider-btn -->
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- item -->
            @endforeach
        </div>
    @endif
</section>
<!-- main-slider-end -->
