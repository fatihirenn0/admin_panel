@extends('theme1.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ $service->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li><a href="{{ route(getResourceFullLink('services')) }}">{{ __('Hizmetler') }}</a></li>
                    <li>{{ $service->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Start Services Details-->
    <section class="services-details position-relative overflow-hidden pt-120 pb-120">
        <div class="container">
            <div class="">
                <div class="row">
                    <!--Start Services Details Sidebar-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="service-sidebar">
                            <!--Start Services Details Sidebar Single-->
                            <div class="sidebar-widget service-sidebar-single">
                                <div class="sidebar-service-list">
                                    <ul>
                                        @foreach($serviceCategories as $serviceCategory)
                                            <li class="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) == url()->current() ? 'current' : '' }}">
                                                <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}"><i class="fas fa-angle-right"></i><span>{{ $serviceCategory->name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="service-details-help">
                                    <div class="help-shape-1"></div>
                                    <div class="help-shape-2"></div>
                                    <h2 class="help-title">{{ __('Bizimle iletişime geçin.') }}</h2>
                                    <div class="help-icon">
                                        <span class="fa-regular fa-headset"></span>
                                    </div>
                                    <div class="help-contact">
                                        <p>{{ __('Destek Hattı') }}</p>
                                        <a href="tel:{{ $settings->get('telephone') }}">{{ $settings->get('telephone') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!--End Services Details Sidebar-->
                        </div>
                    </div>

                    <!--Start Services Details Content-->
                    <div class="col-xl-8 col-lg-8">
                        <div class="services-details__content position-relative overflow-hidden px-3">
                            <img class="w-100" src="/storage/{{ $service->image }}" alt="{{ $service->name }}">
                            <h3 class="mt-4">{{ $service->name }}</h3>
                            <p class="mt-20">
                                {!! $service->long_description !!}
                            </p>
                        </div>
                    </div>
                    <!--End Services Details Content-->
                </div>
            </div>
        </div>
    </section>
@endsection
