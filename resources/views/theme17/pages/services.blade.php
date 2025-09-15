@extends('theme17.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords )
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h1>
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
            <li>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Our Services Start -->
    <section class="main-service-page-list">
        <div class="container">
            <div class="services-list">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                <div class="icon">
                                    <img src="/storage/{{ $service->image }}" width="35" height="35" alt="{{ $service->name }}" />
                                </div>
                                <h4 class="h4-title">
                                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}" title="{{ $service->name }}">{{ $service->name }}</a>
                                </h4>
                                <p>{!! $service->short_description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Our Services End -->
@endsection
