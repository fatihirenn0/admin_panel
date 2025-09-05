@extends('theme7.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ $service->name }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ $service->name }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->
    <!-- Service Details -->
    <section class="section-lgx">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 service-left-col order-2 order-lg-1 sidebar">
                    <aside class="service-sidebar">
                        <aside class="widget post-list">
                            <div class="all-post-list">
                                <h2 class="widget-title">{{ __('Kategoriler') }}</h2>
                                <ul>
                                    @foreach(\App\Models\ServiceCategory::orderBy('rank')->get() as $serviceCategory)
                                        <li class="post-active"><a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}"> {{ $serviceCategory->name }} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </aside>
                </div>
                <div class="col-lg-8 service-right-col order-1">
                    <img src="/theme7/images/services/service-03.jpg" class="w-100" alt="" />
                    <div class="service-details">
                        <h4 class="pbmit-title mb-3">{{ $service->name }}</h4>
                        <p>{!! $service->long_description !!}</p>
                        <div class="">
                            <div class="row">
                                @foreach($serviceImages as $serviceImage)
                                    <div class="col-12 col-sm-6">
                                        <div class="pbmit-animation-style1">
                                            <img src="/storage/{{ $serviceImage->image_url }}" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Details End -->
@endsection
