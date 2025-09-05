@extends('theme2.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Ekip Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Ekip Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Ekip Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Ana Sayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Ekip Sayfası 2.İkon')}}">
                        </li>
                        <li>
                            {{ __('Ekibimiz') }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Ekip Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img class="static-image" src="/theme2/img/breadcrumb/team-breadcrumb.jpg" alt="{{__('Ekip Sayfası 2. Görsel')}}">
            </div>
        </div>
    </div>

    <!-- Team Section Start -->
    <section class="team-section section-padding">
        <div class="container">
            <div class="row g-2 g-sm-4 g-lg-5">
                <div class="col-lg-8 " >
                    <div class="row">
                        @foreach($teams as $team)
                            <div class="col-md-6">
                                <div class="team-card-items mt-0 wow fadeInUp" data-wow-delay="{{ number_format(0.3 + $loop->index * 0.2, 1) }}s">
                            <div class="team-image">
                                <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                                <div class="social-icon d-grid align-items-center">
                                    @if($team->facebook)
                                        <a class="text-white" href="{{ $team->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                                    @endif
                                    @if($team->twitter)
                                        <a class="text-white" href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                    @endif
                                    @if($team->linkedin)
                                        <a class="text-white" href="{{ $team->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                    @endif
                                    @if($team->instagram)
                                        <a class="text-white" href="{{ $team->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                    @endif
                                    @if($team->tiktok)
                                        <a class="text-white" href="{{ $team->tiktok }}"><i class="fa-brands fa-tiktok"></i></a>
                                    @endif
                                    @if($team->youtube)
                                        <a class="text-white" href="{{ $team->youtube }}"><i class="fa-brands fa-youtube"></i></a>
                                    @endif
                                    @if($team->github)
                                        <a class="text-white" href="{{ $team->github }}"><i class="fa-brands fa-github"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="team-content">
                                <div class="content">
                                    <h3><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h3>
                                    <p>{{ $team->job }}</p>
                                </div>
                                <a href="{{ route(getResourceFullLink('teams','show'),$team) }}" class="icon">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-sidebar sticky-style">
                        @foreach($teamCategories as $teamCategory)
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4 style="color: #ffffff">{{ __('Kategoriler') }}</h4>
                            </div>
                            <div class="news-widget-categories">
                                <ul>
                                    <li><a href="{{ route(getResourceFullLink('team_categories','show'),$teamCategory) }}" style="color: #ffffff">{{ $teamCategory->name }} </a></li>
                                </ul>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <a href="#" class="our-team">
                {{ __('Ekibimize Katılın') }}
                <span class="icon">
                        <img class="static-image" src="/theme2/img/head-arrow.svg" alt="{{ __('Ekibimize Katılın') }}">
                </span>
            </a>
        </div>
    </section>

@endsection
