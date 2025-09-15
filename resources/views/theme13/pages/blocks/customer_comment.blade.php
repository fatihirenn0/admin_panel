<!-- testimonial sectoin -->

<section class="testimonial-3 overflow-x-hidden">
    <div class="container-fluid">
        <div class="row g-5">
            <div class="col-lg-5 px-0 position-relative z-2">
                <img src="/theme13/images/testimonial-bg-3.png" class="w-100 h-100 static-image" alt="{{ __('Anasayfa Müşteri Yorumları Görsel') }}" />
            </div>
            <div class="col-lg-7 col-xxl-6 offset-xxl-1 left-side px-3">
                <h2 class="mb-3">{{ __('Müşteri Yorumları') }}</h2>
                <p class="pb-2 pb-lg-4">{{ __('Birlikte Yazdığımız Başarı Hikâyeleri') }}</p>
                <div class="swiper clientSwiper3">
                    <div class="swiper-wrapper">
                        @foreach($allComments as $indexComment )
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="text-primary d-flex gap-2">
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-filled"></i>
                                        <i class="ti ti-star-half-filled"></i>
                                    </div>
                                    <p class="text-white mt-3 pb-2">{{ $indexComment->comment }}</p>
                                    <div class="d-flex gap-3 align-items-center">
                                        <img width="60" height="60" src="/storage/{{ $indexComment->image }}" alt="{{ $indexComment->name }}" />
                                        <div>
                                            <h5 class="text-white mb-1">{{ $indexComment->name }}</h5>
                                            <span>{{ $indexComment->job }}</span>
                                        </div>
                                    </div>
                                    <img class="quote static-image" src="/theme13/images/quote.png" alt="{{ __('Anasayfa Müşteri Yorumları İkon') }}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="btns-client-3 mt-4">
                    <button class="client-prev"><i class="ti ti-arrow-narrow-left"></i></button>
                    <button class="client-next"><i class="ti ti-arrow-narrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
