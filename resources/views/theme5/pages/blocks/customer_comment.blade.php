<!-- Testimonial Section -->
<section class="testimonial-section bg-white">
    <div class="divider"></div>

    <div class="container">
        <div class="row g-4 align-items-end">
            <div class="col-12 col-sm-6">
                <div class="section-heading">
                    <div class="sub-title">
                        <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa Müşteri Yorumları İkon') }}">
                        {{ __('Müşteri Yorumları') }}
                    </div>
                    <h2>{{ __('Birlikte Yazdığımız Başarı Hikâyeleri') }}</h2>
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="swiper-navigation-container">
                    <div class="testimonial-button-prev">
                        <i class="ti ti-arrow-left"></i>
                    </div>
                    <div class="testimonial-button-next">
                        <i class="ti ti-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Testimonial Slider -->
                <div class="testimonial-slide">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            @foreach($allComments as $indexComment)
                            <!-- Testimonial Slide -->
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="testimonial-thumbnail" style="background-image: url('/storage/{{ $indexComment->image }}')" alt=" {{ $indexComment->name }}">
                                    </div>
                                    <div class="testimonial-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewbox="0 0 40 40" fill="none">
                                            <path d="M10.8329 5C16.1566 5 19.9996 9.39508 19.9995 15.9027C19.9654 25.3579 12.8574 32.0431 2.60313 33.3269C1.65178 33.446 1.28495 32.1281 2.16102 31.7386C6.09567 29.989 8.08287 27.7689 8.33955 25.5714C8.53132 23.9296 7.63883 22.4915 6.51816 22.2222C3.61285 21.524 1.66627 17.906 1.66627 14.1667C1.66627 9.10406 5.77033 5 10.8329 5Z" fill="#E8BF96"></path>
                                            <path d="M30.8329 5C36.1566 5 39.9996 9.39508 39.9995 15.9027C39.9654 25.3579 32.8574 32.0431 22.6031 33.3269C21.6518 33.446 21.2849 32.1281 22.161 31.7386C26.0957 29.989 28.0829 27.7689 28.3395 25.5714C28.5313 23.9296 27.6388 22.4915 26.5182 22.2222C23.6129 21.524 21.6663 17.906 21.6663 14.1667C21.6663 9.10406 25.7703 5 30.8329 5Z" fill="#E8BF96"></path>
                                        </svg>
                                        <p class="testimonial-text">“{{$indexComment->comment}}”</p>
                                        <p class="name mb-0"> {{ $indexComment->name }}</p>
                                        <p class="designation mb-0">{{ $indexComment->job }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>
</section>
