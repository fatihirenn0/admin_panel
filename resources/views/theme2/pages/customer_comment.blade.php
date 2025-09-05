@extends('theme2.pages.build')
@section('title',__('Müşteri Yorumları'))
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Müşteri Yorumlar Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Müşteri Yorumlar Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Müşteri Yorumlar Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ __('Müşteri Yorumları') }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Anasayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Müşteri Yorumlar Sayfası 2. İkon')}}">
                        </li>
                        <li>
                            {{ __('Müşteri Yorumları') }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Müşteri Yorumlar Sayfası 3. İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img class="static-image" src="/theme2/img/breadcrumb/testimonial-breadcrumb.jpg" alt="{{__('Müşteri Yorumlar Sayfası 2. Görseli')}}">
            </div>
        </div>
    </div>

    <!-- Testimonial Section Start -->
    <section class="testimonail-section-11 fix section-padding">
        <div class="container">
            <div class="row g-4">
                @foreach($customerComments as $customerComment)
                <div class="col-lg-6 col-md-6">
                    <div class="testimonial-content-box-11">
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p>
                            {{ $customerComment->comment }}
                        </p>
                        <div class="client-info">
                            <div class="client-content">
                                <h4> {{ $customerComment->name }}</h4>
                                <span> {{ $customerComment->job }}</span>
                            </div>
                            <img class="static-image" src="/theme2/img/testimonial/quote-icon.png" alt="{{__('Müşteri Yorumlar Sayfası 4. İkon')}}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
