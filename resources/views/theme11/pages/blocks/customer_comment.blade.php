<!-- Testimonail Section -->
<section class="testimonial-section static-bg-image" style="background-image: url(/theme11/images/background/pattern-3.png);" alt="{{ __('Anasayfa Müşteri Yorumları Arka Plan Görseli') }}">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>{{ __('Birlikte Yazdığımız Başarı Hikâyeleri') }}</h2>
        </div>
        <div class="inner-container">
            <div class="single-item-carousel owl-carousel owl-theme">
                @foreach($allComments as $indexComment)
                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="author-image">
                                <img src="/storage/{{ $indexComment->image }}" alt="{{ $indexComment->name }}" />
                            </div>
                            <span class="quote-icon flaticon-quote-1"></span>
                            <div class="text">{{ $indexComment->comment }}</div>
                            <div class="name">{{ $indexComment->name }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Testimonail Section -->
