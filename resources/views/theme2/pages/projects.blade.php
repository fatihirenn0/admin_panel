@extends('theme2.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Proje Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Proje Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Proje Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ __('Projeler') }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Ana Sayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Proje Sayfası 2.İkon')}}">
                        </li>
                        <li>
                            {{ __('Projeler') }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Proje Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                @foreach($projectCategories as $projectCategory)
                <img src="/storage/{{ $projectCategory->image }}"  alt="{{ $projectCategory->name }}">
                @endforeach
            </div>
        </div>
    </div>

    <!-- Project Section Start -->
    <section class="project-section-2 fix section-padding">
        <div class="container custom-container">
            <div class="row g-2 g-sm-4 g-lg-5">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($projects as $project)
                            <div class="col-md-6 mt-5">
                              <div class="project-image-items-3 mt-0">
                                    <img src="/storage/{{ $project->image }}"  alt="{{ $project->name }}">
                                    <a href="{{ route(getResourceFullLink('projects','show'),$project) }}" class="circle-box">
                                            <span>
                                               {{ __('Görüntüle') }}
                                            </span>
                                    </a>
                                    <div class="content">
                                        <span>{{ $projectCategory->name }}</span>
                                        <h4><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h4>
                                    </div>
                                </div>
                             </div>
                        @endforeach
                    </div>
                </div>
                    <div class="col-lg-4">
                        <div class="main-sidebar sticky-style">
                            @foreach($projectCategories as $projectCategory)
                                <div class="single-sidebar-widget">
                                    <div class="wid-title">
                                        <h4 style="color: #ffffff">{{ __('Kategoriler') }}</h4>
                                    </div>
                                    <div class="news-widget-categories">
                                        <ul>
                                            <li><a href="{{ route(getResourceFullLink('project_categories','show'),$projectCategory) }}" style="color: #ffffff">{{ $projectCategory->name }} </a></li>

                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
