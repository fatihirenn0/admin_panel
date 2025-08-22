@extends('theme1.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ __('Ekibimiz') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('Ekibimiz') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Team area start here -->
    <section class="team-area pt-120 pb-120">
        <div class="container">
            <div class="team__wrp">
                <div class="row g-2 g-sm-4 g-lg-5 ">
                    <div class="col-md-8">
                        <div class="row">
                            @foreach($teams as $team)
                                <div class="col-12 col-md-6 wow fadeInLeft" data-wow-delay="{{ 200 * $loop->index % 400 }}ms" data-wow-duration="1500ms">
                                    <div class="team__item">
                                        <a href="{{ route(getResourceFullLink('teams','show'),$team) }}" class="team__image w-100">
                                            <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                                        </a>
                                        <h3 class="fw-400 mt-15"><a class="primary-hover" href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h3>
                                        <span>{{ $team->job }}</span>
                                        <div class="socials">
                                            <i class="fa-solid fa-share-nodes"></i>
                                            <ul>
                                                @if($team->facebook)
                                                    <li><a href="{{ $team->facebook }}"><i class="fa-brands fa-facebook"></i></a></li>
                                                @endif
                                                @if($team->twitter)
                                                    <li><a href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a></li>
                                                @endif
                                                @if($team->linkedin)
                                                    <li><a href="{{ $team->linkedin }}"><i class="fa-brands fa-linkedin"></i></a></li>
                                                @endif
                                                @if($team->instagram)
                                                    <li><a href="{{ $team->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                                                @endif
                                                @if($team->tiktok)
                                                    <li><a href="{{ $team->tiktok }}"><i class="fa-brands fa-tiktok"></i></a></li>
                                                @endif
                                                @if($team->youtube)
                                                    <li><a href="{{ $team->youtube }}"><i class="fa-brands fa-youtube"></i></a></li>
                                                @endif
                                                @if($team->github)
                                                    <li><a href="{{ $team->github }}"><i class="fa-brands fa-github"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12 col-md-6 wow fadeInLeft" data-wow-delay="700ms" data-wow-duration="1500ms">
                                <a href="#" class="team__item-add">
                                    <div class="team__image w-100">
                                        <img class="static-image" src="/theme1/images/team/team-image6.png" alt="{{ __('Ekibimize Katılın') }}">
                                    </div>
                                    <i class="fa-light fa-arrow-up-right"></i>
                                    <h3>{{ __('Ekibimize Katılın') }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shop-sidebar">
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h5 class="widget-title">{{ __('Kategoriler') }}</h5>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        @foreach($teamCategories as $teamCategory)
                                            <li><a href="{{ route(getResourceFullLink('team_categories','show'),$teamCategory) }}">{{ $teamCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
