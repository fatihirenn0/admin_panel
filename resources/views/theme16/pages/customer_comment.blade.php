@extends('theme16.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ __('Müşteri Yorumları') }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li class="active">{{ __('Müşteri Yorumları') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section style="padding: 120px 0;">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12">
                    <div class="swiper_testimonial">
                        <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach($customerComments as $customerComment)
                                    <div class="swiper-slide">
                                    <div class="slider">
                                        <div class="testimonial_inner">
                                            <div class="tesmonial_inner_image">
                                                <img src="/storage/{{ $customerComment->image }}" alt="{{ $customerComment->name }}">
                                                <img class="static-image" src="/theme16/images/comma.png" alt="{{ __('Müşteri Yorumlar Sayfası İkon') }}">
                                            </div>
                                            <p>{{ $customerComment->comment }}</p>
                                            <h6>{{ $customerComment->name }}</h6>
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
@endsection
