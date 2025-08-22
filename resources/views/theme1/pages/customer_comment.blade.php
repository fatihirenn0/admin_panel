@extends('theme1.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ __('Müşteri Yorumları') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('Müşteri Yorumları') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Testimonial area start here -->
    <section class="testimonial-three-area pt-120 pb-120">
        <div class="container">
            <div class="testimonial-three__wrp">
                <div class="swiper testimonial-three__slider">
                    <div class="swiper-wrapper">
                        @foreach($customerComments as $customerComment)
                            <div class="swiper-slide">
                                <div class="testimonial-three__item">
                                    <p>{!! $customerComment->comment !!}</p>
                                    <div class="info">
                                        <h5>{{ $customerComment->name }}</h5>
                                        <span>{{ $customerComment->job }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper testimonial-three__slider-thumb">
                    <div class="swiper-wrapper">
                        @foreach($customerComments as $customerComment)
                            <div class="swiper-slide">
                                @if($customerComment->image)
                                    <div class="testimonial-three__image">
                                        <img src="/storage/{{ $customerComment->image }}" alt="{{ $customerComment->name }}">
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="testimonial-three__arry-prev"><i class="fa-light fa-chevron-left"></i></button>
                <button class="testimonial-three__arry-next"><i class="fa-light fa-chevron-right"></i></button>
            </div>
        </div>
    </section>
@endsection
