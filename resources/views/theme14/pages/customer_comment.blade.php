@extends('theme14.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <!-- Breadcrumb area start here -->
    <section class="breadcrumb-area" data-background="assets/images/banner/banner-inner.html">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ __('Müşteri Yorumları') }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ __('Müşteri Yorumları') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end here -->

    <!-- Testimonial area start here -->
    <section class="testimonial-five-area pt-130 pb-30">
        <div class="container">
            <div class="testimonial-five__wrp">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="testimonial-five__image">
                            <img class="static-image" src="/theme14/images/testimonial/testimonial-five-image.jpg" alt="{{ __('Müşteri Yorumlar Sayfası Görsel') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-five-right">
                            <div class="section-header pb-50 mb-50">
                                <h6>{{ __('Müşteri Yorumları') }}</h6>
                                <h2 class="wow splt-txt" data-splitting>{{ __('Müvekkillerimiz Ne Diyor?') }}</h2>
                            </div>
                            <div class="swiper testimonial-five__slider">
                                <div class="swiper-wrapper">
                                    @foreach($customerComments as $customerComment)
                                        <div class="swiper-slide">
                                            <div class="testimonial-five__item">
                                                <h4 class="title">
                                                    <svg width="38" height="29" viewBox="0 0 38 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M3.33333 26.0417C1.25 23.75 0 21.25 0 17.0833C0 9.79167 5.20833 3.33333 12.5 0L14.375 2.70833C7.5 6.45833 6.04167 11.25 5.625 14.375C6.66667 13.75 8.125 13.5417 9.58333 13.75C13.3333 14.1667 16.25 17.0833 16.25 21.0417C16.25 22.9167 15.4167 24.7917 14.1667 26.25C12.7083 27.7083 11.0417 28.3333 8.95833 28.3333C6.66667 28.3333 4.58333 27.2917 3.33333 26.0417ZM24.1667 26.0417C22.0833 23.75 20.8333 21.25 20.8333 17.0833C20.8333 9.79167 26.0417 3.33333 33.3333 0L35.2083 2.70833C28.3333 6.45833 26.875 11.25 26.4583 14.375C27.5 13.75 28.9583 13.5417 30.4167 13.75C34.1667 14.1667 37.0833 17.0833 37.0833 21.0417C37.0833 22.9167 36.25 24.7917 35 26.25C33.75 27.7083 31.875 28.3333 29.7917 28.3333C27.5 28.3333 25.4167 27.2917 24.1667 26.0417Z"
                                                            fill="#121C27"
                                                        />
                                                    </svg>
                                                    {{ $customerComment->name }}/ <span> {{ $customerComment->job }}</span>
                                                </h4>
                                                <p class="text">{{ $customerComment->comment }}</p>
                                                <div class="ratting">
                                                    <img class="static-image" src="/theme14/images/icon/five-star.png" alt="{{ __('Müşteri Yorumlar Sayfası İkon') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-50">
                                    <div class="swiper__dots testimonial__dot"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial area end here -->
@endsection
