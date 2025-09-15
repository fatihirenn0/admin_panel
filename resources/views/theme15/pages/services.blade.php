@extends('theme15.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords )
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Section: inner-header -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Hizmetler Sayfası Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Anasayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2"><span>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</span></span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Services -->
    <section class="bg-white-f5 static-bg-image" data-tm-bg-img="/theme15/images/bg/1c9.png" alt="{{ __('Hizmetler Sayfası Arka Plan Görseli') }}">
        <div class="container pb-50">
            <div class="section-content">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="service-style1">
                                <div class="item-thumb">
                                    <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                </div>
                                <div class="item-content">
                                    <h3>{{ $service->name }}</h3>
                                    <p>{!! $service->short_description !!}</p>
                                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="btn btn-outline-theme-colored2 btn-outline mt-20">{{ __('İncele') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Divider -->
@endsection
