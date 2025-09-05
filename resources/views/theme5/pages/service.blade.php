@extends('theme5.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{ __('Hizmet Detay Sayfası Görseli') }}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ $service->name }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}"> {{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $service->name }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Service Details Section -->
    <div class="service-details-section bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-5">
                <!-- Service Details Content -->
                <div class="col-12 col-lg-8">
                    <div class="service-details-content">
                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                        <div class="h2">{{ $service->name }}</div>
                        <p>{!! $service->long_description !!}</p>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="d-flex flex-column gap-5">
                        <!-- Service Widget -->
                        <div class="service-widget">
                            <div class="h4 fw-semibold mb-4">{{ __('Kategoriler') }}</div>

                            <ul class="service-list">
                                @foreach(\App\Models\ServiceCategory::orderBy('rank')->get() as $serviceCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">
                                            {{ $serviceCategory->name }}
                                            <i class="ti ti-arrow-right"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>
    </div>
@endsection
