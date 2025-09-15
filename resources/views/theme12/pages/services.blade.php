@extends('theme12.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords )
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Hizmetler Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-service-1 overflow-hidden space" id="service-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-8">
                    <div class="title-area text-center">
                        <span class="sub-title justify-content-center">{{ __('Hizmetler') }}</span>
                        <h2 class="sec-title">{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-30 justify-content-center">
                @foreach($services as $service)
                    <div class="col-xl-4 col-md-6">
                        <div class="service-card">
                            <div class="shape-mockup service_card-bg-1 static-image"><img src="/theme12/img/bg/service_card-bg-1_1.png" alt="{{ __('Hizmetler Sayfası İkon') }}" /></div>
                            <div class="box-icon"><img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" /></div>
                            <div class="box-content">
                                <h3 class="box-title"><a href="{{ route(getResourceFullLink('services','show'), $service) }}">{{ $service->name }}</a></h3>
                                <p class="box-text">{!! $service->short_description !!}</p>
                            </div>
                            <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="link-btn">{{ __('İncele') }}<i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
