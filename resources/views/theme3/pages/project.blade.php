@extends('theme3.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Proje Detay Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ $project->name }}</h1>
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a>
                    </li>
                    <li>{{ $project->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Start Services Details-->
    <section class="services-details">
        <div class="container">
            <div class="row">
                <!--Start Services Details Sidebar-->
                <div class="col-xl-4 col-lg-4">
                    <div class="service-sidebar">
                        <div class="sidebar-widget service-sidebar-single">
                            <div class="sidebar-service-list">
                                <ul>
                                    @foreach($projectCategories as $projectCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('project_categories','show'),$projectCategory) }}" class="{{ $loop->first ? 'current' : '' }}">
                                                <i class="fas fa-angle-right"></i>
                                                <span>{{ $projectCategory->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Services Details Sidebar-->

                <!--Start Services Details Content-->
                <div class="col-xl-8 col-lg-8">
                    <div class="services-details__content">
                        <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                        <h3 class="mt-4">{{ $project->name }}</h3>
                        <p>{!! $project->description !!}</p>

                        <div class="content mt-40">
                            <div class="feature-list mt-4">
                                <div class="row clearfix">
                                    @foreach($projectImages as $projectImage)
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <img class="mb-3" src="/storage/{{ $projectImage->image_url }}" alt="{{ $projectImage->name }}" />
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
    </section>
    <!--End Services Details-->
@endsection
