@extends('theme14.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Start main-content -->
    <section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('Hizmet Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ $service->name }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ $service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Start Services Details-->
    <section class="services-details position-relative overflow-hidden pt-120 pb-120">
        <div class="container-lg">
            <div class="offer__wrp">
                <div class="row">
                    <!--Start Services Details Sidebar-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="service-sidebar">
                            <!--Start Services Details Sidebar Single-->
                            <div class="sidebar-widget service-sidebar-single">
                                <div class="sidebar-service-list">
                                    <ul>
                                        @foreach($serviceCategories as $serviceCategory)
                                        <li><a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}" class="current"><i
                                                    class="fas fa-angle-right"></i><span>{{ $serviceCategory->name }}</span></a>
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
                        <div class="services-details__content position-relative overflow-hidden px-3">
                            <img class="w-100" src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                            <h3 class="mt-4">{{ $service->name }}</h3>
                            <p>{!! $service->long_description !!} </p>
                            <div class="content mt-40">
                                <div class="feature-list mt-4">
                                    <div class="row clearfix">
                                        @foreach($serviceImages as $serviceImage)
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <img class="mb-3 w-100" src="/storage/{{ $serviceImage->image_url }}"  alt="{{ $service->name }}" />
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
        </div>
    </section>
    <!--End Services Details-->
@endsection
