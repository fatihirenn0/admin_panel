@extends('theme6.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords)
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img class="static-image" src="/theme6/img/bg/practice-breadcrumb-bg.jpg" alt="{{ __('Hizmet Sayfası Görseli') }}" />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h3>
                        <ul class="bc-list">
                            <li><a href="#">{{ __('Anasayfa') }}</a></li>
                            <li>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Area Of Practice -->
    <section class="practice-page-area">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                        <div class="single-practice">
                            <div class="sp-icon">
                                <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                            </div>
                            <div class="sp-text">
                                <h4>{{ $service->name }}</h4>
                                <p>{!! $service->short_description !!}</p>
                                <a href="{{ route(getResourceFullLink('services','show'), $service) }}">{{ __('İncele') }}<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Area Of Practice -->
@endsection
