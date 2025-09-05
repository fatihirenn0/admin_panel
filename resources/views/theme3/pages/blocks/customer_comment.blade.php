<!-- Testimonial Section -->
<section class="testimonial-section-three">
    <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/icons/icon-plane-13.png);" alt="{{__('Anasayfa Yorumlar Arka Plan 1. Görseli')}}"></div>
    <div class="bg bg-image2 static-bg-image" style="background-image: url(/theme3/images/icons/pattern3-2.png);" alt="{{__('Anasayfa Yorumlar Arka Plan 2. Görseli')}}"></div>
    <div class="icon-big-legal-5 bounce-y"></div>
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ __('Müşteri Yorumları') }}</span>
            <h2 class="words-slide-up text-split">{{ __('Müvekkillerimizin Tecrübeleriyle Bizi Tanıyın') }}</h2>
        </div>
        <div class="carousel-outer col-xl-12 offset-xl-1">
            <div class="testimonial-carousel-three owl-carousel owl-theme default-dots">
                @foreach($allComments as $indexComment)
                    <!-- Testimonial Block -->
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="thumb overlay-anim static-image"><img src="/storage/{{ $indexComment->image }}" alt="{{ $indexComment->name }}" /></figure>
                            </div>
                            <div class="info-box">
                                <div class="info-box-content">
                                    <div class="icon-book-1 bounce-y"></div>
                                    <div class="icon-quote"></div>
                                    <div class="text">{{ $indexComment->comment }}</div>
                                    <h6 class="name">{{ $indexComment->name }}</h6>
                                    <span class="designation">{{ $indexComment->job }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->
