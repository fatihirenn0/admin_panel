@extends('theme2.pages.build')
@if(isset($serviceCategory))
    @section('title',$serviceCategory->name)
    @section('meta_keywords',$serviceCategory->meta_keywords)
    @section('meta_description',$serviceCategory->meta_description)
@else
    @section('title',__('Hizmetler'))
@endif
@section('content')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Hizmet Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Hizmet Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Hizmet Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s"> {{ __('Hizmetler') }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Ana Sayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Hizmet Sayfası 2.İkon')}}">
                        </li>
                        <li>
                            {{ __('Hizmetler') }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Hizmet Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                @foreach($serviceCategories as $serviceCategory)
                    <img src="/storage/{{ $serviceCategory->image }}"  alt="{{ $serviceCategory->name }}">
                @endforeach
            </div>
        </div>
    </div>

    <!-- Service Section Start -->
    <section class="service-section section-padding">
        <div class="container">
            <div class="row g-2 g-sm-4 g-lg-5 align-items-center">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($services as $service)
                        <div class="col-md-4">
                            <div class="service-box-items mt-0">
                                <div class="icon">
                                    <img class="static-image" src="/theme2/img/icon/icon-4.svg" alt="{{__('Hizmet Sayfası 4.İkon')}}">
                                </div>
                                <div class="thumb">
                                    <img src="/storage/{{ $service->cover }}" alt="{{ $service->cover }}">
                                    <a href="{{ route(getResourceFullLink('services','show'),$service) }}" class="arrow-icon">
                                        <img class="static-image" src="/theme2/img/icon/big-arrow-right.svg" alt="{{__('Hizmet Sayfası 4.İkon')}}">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3><a href="{{ route(getResourceFullLink('services','show'),$service) }}">{{ $service->name }}</a></h3>
                                    <p>
                                      {!! $service->short_description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-sidebar sticky-style">

                        @foreach($serviceCategories as $serviceCategory)
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4 style="color: #ffffff">{{ __('Kategoriler') }}</h4>
                                </div>
                                <div class="news-widget-categories">
                                    <ul>
                                        <li><a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}" style="color: #ffffff">{{ $serviceCategory->name }} </a></li>

                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
