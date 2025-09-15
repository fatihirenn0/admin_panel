@extends('theme13.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Banner section -->
    <section class="about-banner position-relative space-header">
        <div class="line d-none d-xl-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ $service->name }}</h2>
                    <ul class="list-unstyled ps-0 d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Anasayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ $service->name }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- service details -->
    <section class="service-details">
        <div class="container">
            <div class="row g-4 position-relative">
                <div class="col-md-7 col-lg-8">
                    <div class="details-left">
                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" class="img-fluid w-100" />
                        <div class="details-content">
                            <h2>{{ $service->name }}</h2>
                            <p>{!! $service->long_description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4 position-sticky">
                    <div class="details-search">
                        <h4>{{__('Bloglarda Ara')}}</h4>
                        <form method="post" action="{{ route(getResourceFullLink('blogs','index')) }}">
                            <input type="text" placeholder="{{__('Bloglarda Ara')}}" />
                            <i class="ti ti-search"></i>
                        </form>
                    </div>
                    <div class="details-search">
                        <h4>{{ __('Kategoriler') }}</h4>
                        <ul class="category-list">
                            @foreach($serviceCategories as $serviceCategory)
                                <li>
                                    <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">
                                        <div class="img-wrapper">
                                            <img width="20" src="/storage/{{ $serviceCategory->image }}" alt="{{ $serviceCategory->name }}" />
                                        </div>
                                        <span>{{ $serviceCategory->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
