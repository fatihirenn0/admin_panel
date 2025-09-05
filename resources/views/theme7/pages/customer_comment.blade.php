@extends('theme7.pages.build') @section('title',__('Müşteri Yorumları')) @section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ __('Müşteri Yorumları') }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ __('Müşteri Yorumları') }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- Testimonial Start -->
    <section class="testimonail-section-home1" data-cursor="white-color">
        <div class="container">
            <div class="swiper-slider pbmit-element-testimonial-style-1" data-loop="true" data-autoplay="false" data-dots="false" data-arrows="true" data-columns="1" data-margin="30" data-effect="slide">
                <div class="swiper-wrapper">
                    @foreach($customerComments as $customerComment)
                        <div class="swiper-slide">
                            <!-- Slide1 -->
                            <article class="pbmit-testimonial-style-1">
                                <div class="pbminfotech-post-item">
                                    <div class="pbmit-featured-wrapper">
                                        <img src="/storage/{{ $customerComment->image }}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="pbminfotech-box-content">
                                        <div class="pbminfotech-box-desc">
                                            <blockquote class="pbminfotech-testimonial-text">
                                                <div class="at-above-post-homepage addthis_tool"></div>
                                                <p>“ {{ $customerComment->comment }}”</p>
                                                <div class="at-below-post-homepage addthis_tool"></div>
                                            </blockquote>
                                        </div>
                                        <div class="pbminfotech-box-author">
                                            <h3 class="pbminfotech-box-title">{{ $customerComment->name }}</h3>
                                            <div class="pbminfotech-testimonial-detail">{{ $customerComment->job }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->
@endsection
