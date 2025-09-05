@extends('theme3.pages.build') @section('title',$service->name) @section('meta_keywords',$service->meta_keywords) @section('meta_description',$service->meta_description) @section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Hizmet Detay Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ $service->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $service->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->
    <!--Start Services Details-->
    <section class="services-details">
        <div class="container">
            <div class="row">
                <!--Start Services Details Sidebar-->
                <div class="col-xl-4 col-lg-4">
                    <div class="service-sidebar">
                        <!--Start Services Details Sidebar Single-->
                        <div class="sidebar-widget service-sidebar-single">
                            <div class="sidebar-service-list">
                                <ul>
                                    @foreach($serviceCategories as $serviceCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}" class="{{ $loop->first ? 'current' : '' }}">
                                                <i class="fas fa-angle-right"></i>
                                                <span>{{ $serviceCategory->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--End Services Details Sidebar-->
                    </div>
                </div>

                <!--Start Services Details Content-->
                <div class="col-xl-8 col-lg-8">
                    <div class="services-details__content">
                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                        <h3 class="mt-4">{{ $service->name }}</h3>
                        <p>{!! $service->long_description !!}</p>
                        <div class="content mt-40">
                            <div class="feature-list mt-4">
                                <div class="row clearfix">
                                    @foreach($serviceImages as $serviceImage)
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <img class="mb-3" src="/storage/{{ $serviceImage->image_url }}" alt="{{ $serviceImage->name }}" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Services Details Content-->
            </div>
        </div>
    </section>
    <!--End Services Details-->

@endsection
