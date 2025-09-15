<section class="testi-card-area-1 overflow-hidden space static-bg-image" id="testi-sec" data-bg-src="/theme12/img/bg/testi-bg-1.png" alt="{{ __('Anasayfa Müşteri Yorumları Arka Plan Görseli') }}">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title before-none">{{ __('Müşteri Yorumları') }}</span>
                    <h2 class="sec-title">{{ __('Birlikte Yazdığımız Başarı Hikâyeleri') }}</h2>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="sec-btn">
                    <div class="icon-box">
                        <button data-slider-prev="#testiSlide11" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                        <button data-slider-next="#testiSlide11" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="testi-card-slide">
            <div
                class="swiper has-shadow th-slider"
                id="testiSlide11"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"2"}}}'
            >
                <div class="swiper-wrapper">
                    @foreach($allComments as $indexComment)
                        <div class="swiper-slide">
                            <div class="testi-block" dir="ltr">
                                <div class="testi-icon-1-top"><img class="static-image" src="/theme12/img/icon/testi-icon-1-top.svg" alt="{{ __('Anasayfa Müşteri Yorumları İkon') }}" /></div>
                                <div class="testi-block-top">
                                    <div class="box-img"><img src="/storage/{{ $indexComment->image }}" alt="{{ $indexComment->name }}" /></div>
                                    <div class="content">
                                        <h3 class="box-title">{{ $indexComment->name }}</h3>
                                        <p class="box-desig">{{ $indexComment->job }}</p>
                                        <div class="box-review">
                                            <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="box-text">
                                    "{{ $indexComment->comment }}"
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
