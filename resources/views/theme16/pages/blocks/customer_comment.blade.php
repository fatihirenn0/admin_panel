<section class="testimonial_padding">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12">
                <div class="swiper_testimonial">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach($allComments as $indexComment)
                                <div class="swiper-slide">
                                    <div class="slider">
                                        <div class="testimonial_inner">
                                            <div class="tesmonial_inner_image">
                                                <img src="/storage/{{ $indexComment->image }}" alt="{{ $indexComment->name }}">
                                                <img class="static-image" src="/theme16/images/comma.png" alt="{{ __('Anasayfa Müşteri Yorumlar İkon') }}">
                                            </div>
                                            <p>{{ $indexComment->comment }}</p>
                                            <h6>{{ $indexComment->name }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="navigation">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
