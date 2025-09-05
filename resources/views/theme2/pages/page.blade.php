@extends('theme2.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');"  alt="{{__('Kurumsal Sayfa Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Kurumsal Sayfa Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Kurumsal Sayfa 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ $page->name }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Ana Sayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Kurumsal Sayfa 2.İkon')}}">
                        </li>
                        <li>
                            {{ $page->name }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Kurumsal Sayfa 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img class="static-image" src="/theme2/img/breadcrumb/about-breadcrumb.jpg" alt="{{__('Kurumsal Sayfa 2. Görsel')}}">
            </div>
        </div>
    </div>

    <!-- About Section Start -->
    <section class="about-section fix section-padding">
        <div class="container-fluid">
            <div class="about-wrapper">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="about-image wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <img src="/storage/{{ $page->image }}" alt="{{ $page->image }}">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-content">
                            <div class="section-title">
                                    <span class="wow fadeInUp">
                                        <img class="static-image" src="/theme2/img/icon/sub-title-icon.svg" alt="{{__('Kurumsal Sayfa 4.İkon')}}">
                                        {{ $page->name }}
                                    </span>
                                <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                                    {{ __('Slogan') }}
                                </h2>
                            </div>
                            <p class="about-text wow fadeInUp" data-wow-delay=".5s">
                              {!! $page->description !!}
                            </p>
                            <div class="row g-4">
                                <div class="col-lg-5">
                                    <div class="about-image-2">
                                        @foreach($pageImages as $pageImage)
                                                <img src="/storage/{{ $pageImage->image_url }}" alt="{{ $pageImage->image_url }}">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="about-icon-wrap">
                                        <div class="about-icon-items wow fadeInUp" data-wow-delay=".5s">
                                            <div class="icon-item">
                                                <div class="icon">
                                                    <img class="static-image" src="/theme2/img/icon/icon-1.svg" alt="{{__('Kurumsal Sayfa 5.İkon')}}">
                                                </div>
                                                <h4>
                                                    {{ __('Deneyimli ve Güvenilir') }}
                                                </h4>
                                            </div>
                                            <div class="icon-item">
                                                <div class="icon">
                                                    <img class="static-image" src="/theme2/img/icon/icon-2.svg" alt="{{__('Kurumsal Sayfa 6.İkon')}}">
                                                </div>
                                                <h4>
                                                    {{ __('Güçlü Hukuki Çözümler') }}
                                                </h4>
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
@endsection
