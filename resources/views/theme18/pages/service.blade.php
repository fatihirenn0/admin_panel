@extends('theme18.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ $service->name }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ $service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Practice Details -->
    <div class="practice-details-area pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="practice-details-item">
                        <div class="practice-details-content">
                            <div class="section-title text-left">
                                <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                <h2>{{ $service->name }}</h2>
                            </div>
                            <p>{!! $service->long_description !!}</p>
                        </div>
                    </div>
                    <div class="practice-details-case">
                        <div class="row justify-content-center">
                            @foreach($serviceImages as $serviceImage)
                                <div class="col-sm-6 col-lg-6">
                                    <div class="portfolio-item wow fadeInUp" data-wow-delay=".3s">
                                        <img src="/storage/{{ $serviceImage->image_url }}" alt="{{ $service->name }}" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="practice-details-item">
                        <div class="blog-details-category">
                            <ul>
                                @foreach($serviceCategories as $serviceCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}"> <i class="ion-ios-arrow-right"></i>{{ $serviceCategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Practice Details -->
@endsection
