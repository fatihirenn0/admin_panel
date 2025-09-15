@extends('theme13.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords )
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
<!-- Banner section -->
<section class="service-banner position-relative space-header">
    <div class="line d-none d-xl-block"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content px-3">
                <h2 class="display-4 text-white mb-3">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h2>
                <ul class="list-unstyled d-flex align-items-center gap-2">
                    <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Anasayfa') }}</a></li>
                    <li><i class="ti ti-chevron-right text-white"></i></li>
                    <li><a href="#">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                <div class="about-line-2"></div>
                <div class="about-line-3"></div>
            </div>
        </div>
    </div>
</section>

<!-- services section -->

<section class="all-services">
    <div class="container">
        <div class="row g-4 text-white mb-4 mb-lg-5">
            <div class="col-md-7 col-lg-8">
                <h2>{{ __('Hizmetler') }}</h2>
            </div>
            <div class="col-md-5 col-lg-4">
                <p>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="legal-card">
                        <img height="48" src="/storage/{{ $service->image }}" class="mb-5" alt="{{ $service->name }}">
                        @foreach($serviceCategories as $serviceCategory)
                        <p class="mb-2 pt-2">{{ $serviceCategory->name }}</p>
                        @endforeach
                        <h3>{{ $service->name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
