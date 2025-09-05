@extends('theme5.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{ __('Ekip Sayfası Görseli') }}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Team Members Section -->
    <div class="lawyers-team-section bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row justify-content-center g-4">
                @foreach($teams as $team)
                <!-- Laywer Card -->
                 <div class="col-12 col-sm-6 col-md-4">
                    <div class="laywer-card">
                        <a href="{{ route(getResourceFullLink('teams','show'),$team) }}">
                            <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                        </a>

                        <!-- Laywer Info -->
                        <div class="laywer-info text-center">
                            <div class="laywer-name"><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></div>
                            <div class="laywer-position">{{ $team->job }}</div>
                        </div>

                        <!-- Hover:: Laywer Info -->
                        <div class="hover-laywer-info text-center">
                            <div class="laywer-name"><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></div>
                            <div class="laywer-position">{{ $team->job }}</div>
                            <!-- Social Nav -->
                            <div class="social-nav">
                                @if($team->facebook)
                                    <a href="{{ $team->facebook }}">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                @endif
                                @if($team->twitter)
                                    <a href="{{ $team->twitter }}">
                                        <i class="ti ti-brand-x"></i>
                                    </a>
                                @endif
                                @if($team->instagram)
                                    <a href="{{ $team->instagram }}">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                @endif
                                @if($team->youtube)
                                    <a href="{{ $team->youtube }}">
                                        <i class="ti ti-brand-youtube"></i>
                                    </a>
                                @endif
                                @if($team->tiktok)
                                    <a href="{{ $team->tiktok }}">
                                        <i class="ti ti-brand-tiktok"></i>
                                    </a>
                                @endif
                                @if($team->github)
                                    <a href="{{ $team->github }}">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                @endif
                                @if($team->linkedin)
                                    <a href="{{ $team->linkedin }}">
                                        <i class="ti ti-brand-linkedin"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="divider"></div>
    </div>
@endsection
