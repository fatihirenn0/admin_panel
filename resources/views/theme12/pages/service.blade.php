@extends('theme12.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Hizmet Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $service->name }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ $service->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="space-top space-extra2-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single mb-30">
                        <div class="page-img"><img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" /></div>
                        <div class="page-content">
                            <h2 class="sec-title page-title">{{ $service->name }}</h2>
                            <p class="">
                                {!! $service->long_description !!}
                            </p>
                            <div class="row mt-30 gx-40">
                                @foreach($serviceImages as $serviceImage)
                                    <div class="col-md-6">
                                        <div class="page-img"><img class="w-100" src="/storage/{{ $serviceImage->image_url }}" alt="{{ $serviceImage->name }}" /></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories">
                            <h3 class="widget_title">{{ __('Kategoriler') }}</h3>
                            <ul>
                                @foreach($serviceCategories as $serviceCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">{{ $serviceCategory->name }}</a> <span><i class="fa-sharp fa-light fa-arrow-right"></i></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
