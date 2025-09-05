@extends('theme10.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords )
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);" alt="{{ __('Hizmetler Sayfası Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Services Section Two -->
    <section class="services-section-four">
        <div class="container">
            <!-- Sec Title -->
            <div class="section-title centered">
                <div class="title">{{ __('Hizmetler') }}</div>
                <h3>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h3>
            </div>
            <div class="row clearfix">
                @foreach($services as $service)
                    <!-- Services Block Two -->
                    <div class="services-block-two style-two col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="icon-box">
                                <img src="/storage/{{ $service->image }}" alt="" />
                            </div>
                            <h3>{{ $service->name }}</h3>
                            <div class="text">{!! $service->short_description !!}</div>
                            <div class="overlay-box" style="background-image: url('/storage/{{ $service->image }}');">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                        <h4><a href="{{ route(getResourceFullLink('services','show'), $service) }}">{{ $service->name }}</a></h4>
                                        <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="theme-btn btn-style-one">{{ __('İncele') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Section Two -->

@endsection
