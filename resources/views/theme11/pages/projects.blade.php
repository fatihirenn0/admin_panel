@extends('theme11.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('Proje Sayfası Görseli') }}">
        <div class="auto-container">
            <h1>{{ __('Projeler') }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li>{{ __('Projeler') }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- case-style-three -->
    <section class="case-style-three bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-12 case-block">
                        <div class="case-block-two wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                                    <div class="link">
                                        <a href="{{ route(getResourceFullLink('projects','show'),$project) }}"><i class="flaticon-link"></i></a>
                                    </div>
                                    <div class="overlay-layer"></div>
                                </figure>
                                <div class="lower-content">
                                    <div class="box">
                                        <div class="icon-box"><i class="flaticon-notebook"></i></div>
                                        @foreach($projectCategories as $projectCategory)
                                            <p>{{ $projectCategory->name }}</p>
                                        @endforeach
                                        <h4><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h4>
                                    </div>
                                    <div class="text">
                                        <p>{!! $project->description !!}</p>
                                    </div>
                                    <div class="link">
                                        <a href="{{ route(getResourceFullLink('projects','show'),$project) }}"><i class="flaticon-right"></i>{{ __('İncele') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- case-style-three end -->
@endsection
