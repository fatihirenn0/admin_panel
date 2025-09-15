<!-- =============== testimonial-section start =============== -->

<div class="testimonial-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="section-title1 text-center">
                    <h2>{{ __('Müşteri Yorumları') }}</h2>
                    <p>{{ __('Birlikte Yazdığımız Başarı Hikâyeleri') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="swiper testi3-slider">
                <div class="swiper-wrapper">
                    @foreach($allComments as $indexComment)
                        <div class="swiper-slide">
                            <div class="testi3-single sibling2">
                                <div class="image">
                                    <img src="/storage/{{ $indexComment->image }}" alt="{{ $indexComment->name }}" />
                                    <div class="img-content">
                                        <h3>{{ $indexComment->name }}</h3>
                                        <span>{{ $indexComment->job }}</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <img src="/theme9/images/icons/testi-quote.svg" class="testi3-quote static-image" alt="{{ __('Müşteri Yorumları 1.İkon') }}" />
                                    <p>{{ $indexComment->comment }}</p>
                                    <span class="ms-auto">{{ $indexComment->id }} </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="slider-arrows testi3-arrows text-center d-lg-flex d-none flex-row justify-content-center align-items-center gap-5">
                <div class="testi3-prev swiper-prev-arrow style-3" tabindex="0" role="button" aria-label="Previous slide">
                    <img class="static-image" src="/theme9/images/icons/arr-prev.svg" alt="{{ __('Müşteri Yorumları 2.İkon') }}" />
                </div>
                <div class="testi3-next swiper-next-arrow style-3" tabindex="0" role="button" aria-label="Next slide">
                    <img class="static-image" src="/theme9/images/icons/arr-next.svg" alt="{{ __('Müşteri Yorumları 3.İkon') }}" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =============== testimonial-section end =============== -->
