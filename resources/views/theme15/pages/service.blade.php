@extends('theme15.pages.build') @section('title',$service->name) @section('meta_keywords',$service->meta_keywords) @section('meta_description',$service->meta_description) @section('content')
    <!-- Section: inner-header -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Hizmetler Sayfası Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ $service->name }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Anasayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2">{{ $service->name }}</span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: service-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <div class="tm-sc tm-sc-vc-sidebars tm-sidebar">
                        <div class="tm-sidebar-nav-menu-style2">
                            <div class="widget widget_nav_menu">
                                <div class="menu-service-nav-menu-container">
                                    <ul id="menu-service-nav-menu" class="menu">
                                        @foreach($serviceCategories as $serviceCategory)
                                            <li class="menu-item current-menu-item">
                                                <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">{{ $serviceCategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-md-12">
                            <img alt="{{ $service->name }}" src="/storage/{{ $service->image }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mt-20 mb-10 text-theme-colored2">{{ $service->name }}</h3>
                            <p class="lead">{!! $service->long_description !!}</p>
                            <div class="row mb-20 mt-20">
                                @foreach($serviceImages as $serviceImage)
                                    <div class="col-md-6 col-lg-4 mb-md-30"><img src="/storage/{{ $serviceImage->image_url }}" alt="{{ $service->name  }}" /></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
