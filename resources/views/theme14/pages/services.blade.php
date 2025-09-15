@extends('theme14.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords )
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Breadcrumb area start here -->
    <section class="breadcrumb-area" data-background="/theme14/assets/images/banner/banner-inner.html">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end here -->

    <!-- Service area start here -->
    <section class="service-three-area pt-130 pb-20">
        <div class="container">
            <div class="row g-4">
                @foreach($services as $service)
                    <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="{{ ($loop->index + 1) * 100 }}ms">
                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="service-three__item {{ $loop->first ? 'active' : '' }}">
                        <div class="icon">
                            <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}">
                        </div>
                        <h4>{{ $service->name }}</h4>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Service area end here -->
@endsection
