@extends('theme14.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Start main-content -->
    <section class="breadcrumb-area" data-background="/theme14/assets//theme14/images/banner/banner-inner.html">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Team Section Seven -->
    <section class="team-five-area pt-120 pb-120">
        <div class="container-lg">
            <div class="row g-4 g-lg-5">
                @foreach($teams as $team)
                    <div class="col-sm-6 col-xl-4 wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="team__item">
                        <div class="socials">
                            <i class="fa-regular fa-plus"></i>
                            <ul>
                                @if($team->facebook)
                                    <a href="{{ $team->facebook }}">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                @endif
                                @if($team->twitter)
                                    <a href="{{ $team->twitter }}">
                                        <i class="fa-brands fa-x"></i>
                                    </a>
                                @endif
                                @if($team->instagram)
                                    <a href="{{ $team->instagram }}">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                @endif
                                @if($team->youtube)
                                    <a href="{{ $team->youtube }}">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                @endif
                                @if($team->tiktok)
                                    <a href="{{ $team->tiktok }}">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </a>
                                @endif
                                @if($team->github)
                                    <a href="{{ $team->github }}">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                @endif
                                @if($team->linkedin)
                                    <a href="{{ $team->linkedin }}">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                @endif
                            </ul>
                        </div>
                        <div class="team__image">
                            <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                        </div>
                        <h4><a class="hover-link" href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h4>
                        <span>{{ $team->job }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team Section -->
@endsection
