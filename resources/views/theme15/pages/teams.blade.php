@extends('theme15.pages.build') @if(isset($teamCategory)) @section('title',$teamCategory->name) @section('meta_keywords',$teamCategory->meta_keywords) @section('meta_description',$teamCategory->meta_description) @else
    @section('title',__('Ekibimiz')) @endif @section('content')
    <!-- Section: home -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Ekip Sayfası Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Anasayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Team -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    @foreach($teams as $team)
                        <div class="col-md-6 col-lg-4">
                            <div class="tm-sc tm-sc-staff staff-style5-current-theme mb-md-30">
                                <div class="tm-staff">
                                    <div class="staff-inner">
                                        <div class="box-hover-effect">
                                            <div class="effect-wrapper">
                                                <div class="thumb">
                                                    <img src="/storage/{{ $team->image }}" class="img-fullwidth wp-post-image" alt="{{ $team->name }}" />
                                                </div>
                                                <div class="overlay-shade"></div>
                                                <div class="icons-holder icons-holder-middle staff-social-links">
                                                    <div class="icons-holder-inner">
                                                        <ul class="styled-icons icon-dark icon-theme-colored2 icon-circled icon-sm">
                                                            @if($team->facebook)
                                                                <li>
                                                                    <a class="styled-icons-item" href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a>
                                                                </li>
                                                            @endif @if($team->twitter)
                                                                <li>
                                                                    <a class="styled-icons-item" href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a>
                                                                </li>
                                                            @endif @if($team->linkedin)
                                                                <li>
                                                                    <a class="styled-icons-item" href="{{ $team->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                                                </li>
                                                            @endif @if($team->instagram)
                                                                <li>
                                                                    <a class="styled-icons-item" href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a>
                                                                </li>
                                                            @endif @if($team->youtube)
                                                                <li>
                                                                    <a class="styled-icons-item" href="{{ $team->youtube }}"><i class="fa fa-youtube"></i></a>
                                                                </li>
                                                            @endif @if($team->github)
                                                                <li>
                                                                    <a class="styled-icons-item" href="{{ $team->github }}"><i class="fa fa-github"></i></a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="staff-content">
                                                <h4 class="name"><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h4>
                                                <div class="speciality">{{ $team->job }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Divider -->
@endsection
