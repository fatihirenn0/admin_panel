@extends('theme1.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ $team->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{__('Ana Sayfa')}}</a></li>
                    <li><a href="{{ route(getResourceFullLink('teams')) }}">{{ __('Ekibimiz') }}</a></li>
                    <li>{{ $team->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Team Details Start-->
    <section class="team-details">
        <div class="container pb-100 pt-120">
            <div class="team-five__wrp mt-0">
                <div class="team-details__top pb-70">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__top-left">
                                <div class="team-details__top-img"> <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                                    <div class="team-details__big-text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__top-right">
                                <div class="team-details__top-content">
                                    <h3 class="team-details__top-name">{{ $team->name }}</h3>
                                    <p class="team-details__top-title">{{ $team->job }}</p>
                                    <h4 class="mt-5">{{ __('Hakkında') }}</h4>
                                    <p class="team-details__top-text-1 mb-0">
                                        {!! $team->description !!}
                                    </p>
                                    <h4 class="mt-5">{{ __('Eğitim') }}</h4>
                                    <p class="team-details__top-text-1 mb-0">
                                        {!! $team->education !!}
                                    </p>
                                    <h4 class="mt-5">{{ __('Deneyim') }}</h4>
                                    <p class="team-details__top-text-1 mb-5">
                                        {!! $team->work_experience !!}
                                    </p>
                                    <div class="team-details-contact mb-30">
                                        <h5 class="mb-0">{{ __('E-posta Adresi') }}</h5>
                                        <div>
                                            <a href="mailto:{{ $team->email }}">{{ $team->email }}</a>
                                        </div>
                                    </div>
                                    <div class="team-details-contact mb-30">
                                        <h5 class="mb-0">{{ __('Telefon Numarası') }}</h5>
                                        <div ><span>{{ $team->telephone }}</span></div>
                                    </div>
                                    <div class="team-details__social">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
