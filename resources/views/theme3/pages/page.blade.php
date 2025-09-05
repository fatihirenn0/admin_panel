@extends('theme3.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Kurumsal Sayfa 1. Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ $page->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}"> {{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $page->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->
    <!-- About Section -->
    <section class="about-section-three pt-120">
        <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/icons/pattern3-2.png);" alt="{{__('Kurumsal Sayfa 2. Arka Plan Görseli')}}"></div>
        <div class="icon-sailboat-line-3 bounce-y"></div>
        <div class="auto-container">
            <div class="outer-box">
                <div class="row">
                    <div class="content-column col-lg-6">
                        <div class="inner-column">
                            <div class="icon-wheel-5"></div>
                            <div class="sec-title m-0">
                                <span class="sub-title">{{ $page->name }}</span>
                                <h2 class="words-slide-up text-split">{{ __('Slogan') }}</h2>
                            </div>
                            <figure class="image overlay-anim reveal"><img src="/storage/{{ $page->image }}" alt="{{ $page->image }}" /></figure>
                        </div>
                    </div>
                    <div class="content-column-two col-lg-6">
                        <div class="inner-column">
                            <div class="top-box">
                                <div class="text-box">
                                    <div class="text text-one">{!! $page->description !!}</div>
                                </div>
                            </div>
                            <div class="bottom-box wow fadeInRight" data-wow-delay="300ms">
                                <div class="icon-dots-5"></div>
                                <div class="row">
                                    <div class="about-block col-sm-6">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image overlay-anim">
                                                    <a href="#"> <img class="static-image" src="/theme3/images/resource/about3-2.jpg" alt="{{__('Kurumsal Sayfa 2. Görsel')}}" /> </a>
                                                </figure>
                                            </div>
                                            <div class="content-box">
                                                <h4 class="title">{{ __('Deneyimli ve Güvenilir') }}</h4>
                                                <div class="text">{{ __('Müvekkillerimize yılların tecrübesiyle güvenilir, şeffaf ve profesyonel hizmet sunuyoruz') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="about-block col-sm-6">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image overlay-anim">
                                                    <a href="#"> <img class="static-image" src="/theme3/images/resource/about3-3.jpg" alt="{{__('Kurumsal Sayfa 3. Görsel')}}" /> </a>
                                                </figure>
                                            </div>
                                            <div class="content-box">
                                                <h4 class="title">{{ __('Güçlü Hukuki Çözümler') }}</h4>
                                                <div class="text">{{ __('Her davada kapsamlı analiz ve etkili stratejilerle en uygun hukuki çözümleri üretiyoruz.') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->
    <!-- client Section -->
    <section class="clients-section">
        <div class="auto-container">
            <div class="clients-carousel owl-carousel owl-theme">
                @foreach($references as $reference)
                    <!-- client block -->
                    <div class="client-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="/storage/{{ $reference->image }}"><img src="/storage/{{ $reference->image }}" alt="{{ $reference->name }}" /></a>
                                </figure>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End client Section -->
@endsection
