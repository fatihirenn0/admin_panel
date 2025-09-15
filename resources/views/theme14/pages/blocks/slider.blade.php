@php $slider = $sliders->first(); @endphp @if($slider)
<!-- Banner Area Start Here -->
<section class="banner-area">
    <div class="banner__wrp">

        @foreach($sliders as $slider)
        <div class="banner__image">
            <div class="swiper banner__slider">
                <div class="swiper-wrapper">
                        <div class="swiper-slide">
                        <div class="parallax-bg"><img src="/storage/{{ $slider->file_url }}" alt="{{ $slider->name }}" data-swiper-parallax="300"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="banner__content">
            <h1 class="title" data-animation="slideInLeft" data-duration="1s" data-delay="1s">{{ $slider->title }}</h1>
            <p class="text" data-animation="slideInLeft" data-duration="1.5s" data-delay="1.1s">{{ $slider->sub_text }}</p>
            <div class="btn-box" data-animation="slideInLeft" data-duration="2s" data-delay="1.2s">
                <a href="{{ $slider->link }}" class="btn-one mt-50 mr-30" data-wow-delay="200ms" data-wow-duration="1500ms" data-splitting data-text="{{ $slider->link_text }}">{{ $slider->link_text }}<i class="fa-light fa-arrow-up-right"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Banner Area End Here -->
@endif
