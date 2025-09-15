@extends('theme18.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Team -->
    <section class="team-area team-area-two pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($teams as $team)
                    <div class="col-sm-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" />
                            <div class="team-inner">
                                <ul>
                                    @if($team->facebook)
                                        <li>
                                            <a href="{{ $team->facebook }}"><i class="icofont-facebook"></i></a>
                                        </li>
                                    @endif @if($team->twitter)
                                        <li>
                                            <a href="{{ $team->twitter }}"><i class="icofont-twitter"></i></a>
                                        </li>
                                    @endif @if($team->linkedin)
                                        <li>
                                            <a href="{{ $team->linkedin }}"><i class="icofont-linkedin"></i></a>
                                        </li>
                                    @endif @if($team->instagram)
                                        <li>
                                            <a href="{{ $team->instagram }}"><i class="icofont-instagram"></i></a>
                                        </li>
                                    @endif @if($team->tiktok)
                                        <li>
                                            <a href="{{ $team->tiktok }}"><i class="icofont-tiktok"></i></a>
                                        </li>
                                    @endif @if($team->youtube)
                                        <li>
                                            <a href="{{ $team->youtube }}"><i class="icofont-youtube"></i></a>
                                        </li>
                                    @endif @if($team->github)
                                        <li>
                                            <a href="{{ $team->github }}"><i class="icofont-github"></i></a>
                                        </li>
                                    @endif
                                </ul>
                                <h3>
                                    <a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a>
                                </h3>
                                <span>{{ $team->job }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team -->
@endsection
