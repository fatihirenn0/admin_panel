@extends('theme5.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords)
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{ __('Hizmetler Sayfası Arka Plan Görseli') }}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Service Section -->
    <div class="service-container bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-4">
                @foreach($services as $service)
                 <!-- Service Card -->
                 <div class="col-12 col-sm-6 col-xl-3">
                    <div class="service-card style-two wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}">
                        <div class="service-title"> {{ $service->name }}</div>
                        <p>{!! $service->short_description !!}</p>
                        <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="btn btn-link">{{ __('İncele') }}<i class="ti ti-arrow-up-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="divider"></div>
    </div>
@endsection
