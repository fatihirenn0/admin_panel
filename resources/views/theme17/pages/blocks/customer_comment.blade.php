<!-- Testimonials Start -->
<section class="main-testimonials">
    <span class="testimonial-bg-shape"><img class="static-bg-image" src="/theme17/images/testimonial-bg-shape.svg" width="405" height="641" alt="{{ __('Anasayfa Müşteri Yorumlar Arka Plan Görseli') }}" /></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonials-title text-center">
                    <span class="sub-title">{{ __('Müşteri Yorumları') }}</span>
                    <h2 class="h2-title">{{ __('Müvekkillerimiz Ne Diyor?') }}</h2>
                </div>
                <div class="testimonial-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($allComments as $indexComment)
                            <div class="swiper-slide">
                                <div class="testimonial-box">
                                    <div class="testimonial-box-shape">
                                        <img class="static-image" src="/theme17/images/testimonial-box-shape.svg" width="170" height="55" alt="{{ __('Anasayfa Müşteri Yorumlar Sayfası Görsel') }}" />
                                    </div>
                                    <span class="quote-icon"> <img class="static-image" src="/theme17/images/Quote.svg" width="76" height="56" alt="{{ __('Müşteri Yorumlar Sayfası 1.İkon') }}" /></span>

                                    <div class="testimonial-img back-img" style="background-image: url('/storage/{{ $indexComment->image }}')"></div>
                                    <div class="review-by">
                                        <h4 class="h4-title">{{ $indexComment->name }}</h4>
                                        <p>{{ $indexComment->job }}</p>
                                    </div>
                                    <div class="testimonial-text">
                                        <p>
                                            {{ $indexComment->comment }}
                                        </p>
                                    </div>
                                    <div class="testimonial-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials End -->
