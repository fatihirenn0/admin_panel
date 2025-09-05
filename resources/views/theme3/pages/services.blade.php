@extends('theme3.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords)
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Page Title -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Hizmet Sayfası 1. Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    @if(isset($serviceCategory))
                        <li><a href="{{ route(getResourceFullLink('services','index')) }}">{{ __('Hizmetler') }}</a></li>
                        <li>{{ $serviceCategory->name }}</li>
                    @else
                        <li>{{ __('Hizmetler') }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </section>

    <!-- Practice Area Section -->
    <section class="product-section pb-90 pt-120">
        <div class="bg bg-image static-bg-image" style="background-image: url(/theme3/images/background/bg-product1-1.jpg);" alt="{{__('Hizmet Sayfası 2. Görseli')}}"></div>
        <div class="auto-container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="shop-sidebar">
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h5 class="widget-title">{{ __('Kategoriler') }}</h5>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach($serviceCategories as $serviceCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('service_categories','show'), $serviceCategory) }}" class="{{ isset($serviceCategory) && $serviceCategory->id === $serviceCategory->id ? 'active' : '' }}">
                                                {{ $serviceCategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-9 col-md-8">
                    <div class="row g-4">
                        @forelse($services as $service)
                            <div class="col-lg-4 col-md-6">
                                <div class="product-block wow fadeInUp" data-wow-delay="100ms">
                                    <div class="inner-box text-start">
                                        <div class="image-box">
                                            <figure class="image">
                                                <a href="{{ route(getResourceFullLink('services','show'), $service) }}">
                                                    <img class="img-fluid w-100" src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" />
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="content-box">
                                            @if(!empty($service->icon))
                                                <span class="icon {{ $service->icon }}"></span>
                                            @else
                                                <span class="icon fas fa-scale-balanced"></span>
                                            @endif

                                            <h4 class="title">
                                                <a href="{{ route(getResourceFullLink('services','show'), $service) }}">
                                                    {{ $service->name }}
                                                </a>
                                            </h4>

                                            @if(!empty($service->short_description))
                                                <p class="text">{{ Str::limit(strip_tags($service->short_description), 140) }}</p>
                                            @endif

                                            <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="read-more">
                                                {{ __('Detayları Gör') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info mb-0">
                                    {{ __('Bu kategoride henüz hizmet bulunmuyor.') }}
                                </div>
                            </div>
                        @endforelse
                    </div>

                    @if(method_exists($services, 'links'))
                        <div class="mt-4">
                            {{ $services->withQueryString()->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
