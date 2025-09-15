@extends('theme17.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')

    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-box">
        <ul>
            <li>
                <a href="{{ route('site.index') }}" title="{{ __('Anasayfa') }}">{{ __('Anasayfa') }}</a>
            </li>
            <li>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Our Team Start -->
    <section class="page-our-team">
        <div class="container">
            <div class="page-team-list">
                <div class="row">
                    @foreach($teams as $team)
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="team-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                <div class="team-img-wp">
                                    <div class="team-img">
                                        <img src="/storage/{{ $team->image }}" width="317" height="368" alt="{{ $team->name }}" />
                                    </div>
                                    <div class="team-social">
                                        <div class="team-social-share">
                                            <img class="static-image" src="/theme17/images/share-icon.svg" width="15" height="17" alt="{{ __('Ekip Sayfası 1.İkon') }}" />
                                        </div>
                                        <ul>
                                            @if($team->facebook)
                                                <li>
                                                    <a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                            @endif @if($team->twitter)
                                                <li>
                                                    <a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                                </li>
                                            @endif @if($team->linkedin)
                                                <li>
                                                    <a href="{{ $team->linkedin }}"><i class="fab fa-linkedin"></i></a>
                                                </li>
                                            @endif @if($team->instagram)
                                                <li>
                                                    <a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                                                </li>
                                            @endif @if($team->youtube)
                                                <li>
                                                    <a href="{{ $team->youtube }}"><i class="fab fa-youtube"></i></a>
                                                </li>
                                            @endif @if($team->github)
                                                <li>
                                                    <a href="{{ $team->github }}"><i class="fab fa-github"></i></a>
                                                </li>
                                            @endif @if($team->tiktok)
                                                <li>
                                                    <a href="{{ $team->tiktok }}"><i class="fab fa-tiktok"></i></a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <p>{{ $team->job }}</p>
                                <h4 class="h4-title">
                                    <a href="{{ route(getResourceFullLink('teams','show'),$team) }}" title="{{ $team->name }}">{{ $team->name }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Our Team End -->
@endsection
