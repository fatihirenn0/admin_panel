@extends('theme17.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ $service->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-box">
        <ul>
            <li>
                <a href="{{ route('site.index') }}" title="{{ __('Anasayfa') }}">{{ __('Anasayfa') }}</a>
            </li>
            <li>{{ $service->name }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Service Detail Start -->
    <section class="main-service-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-detail-content wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="service-detail-content-title">
                            <div class="icon">
                                <img class="static-image" src="/theme17/images/Professional-Advice.svg" width="35" height="35" alt="{{ __('Hizmet Detay Sayfası 1.İkon') }}" />
                            </div>
                            <h2 class="h2-title">{{ $service->name }}</h2>
                        </div>
                        <div class="service-detail-content-box">
                            <p>
                                {!! $service->long_description !!}
                            </p>
                        </div>
                        <div class="service-detail-content-box img">
                            <img src="/storage/{{ $service->image }}" width="830" height="450" alt="{{ $service->name }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Detail End -->
@endsection
