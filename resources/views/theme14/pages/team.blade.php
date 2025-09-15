@extends('theme14.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Start main-content -->
    <section class="breadcrumb-area" data-background="assets/images/banner/banner-inner.html">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ $team->name }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ $team->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Team Details Start-->
    <section class="team-details">
        <div class="container-lg pt-130 pb-100">
            <div class="team-five__wrp">
                <div class="team-details__top pb-70">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__top-left">
                                <div class="team-details__top-img">
                                    <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" />
                                    <div class="team-details__big-text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__top-right">
                                <div class="team-details__top-content">
                                    <h3 class="team-details__top-name">{{ $team->name }}</h3>
                                    <p class="team-details__top-title">{{ $team->job }}</p>
                                    <p class="team-details__top-text-1">{!! $team->description !!}</p>
                                    <div class="team-details-contact mb-30">
                                        <h5 class="mb-0">{{ __('E-Posta Adresi') }}</h5>
                                        <div class="">
                                            <span><a href="mailto:{{ $team->email }}" class="__cf_email__">{{ $team->email }}</a></span>
                                        </div>
                                    </div>
                                    <div class="team-details-contact mb-30">
                                        <h5 class="mb-0">{{ __('Telefon Numarası') }}</h5>
                                        <div class=""><span>{{ $team->telephone }}</span></div>
                                    </div>
                                    <div class="team-details__social">
                                        @if($team->facebook)
                                            <a class="text-white" href="{{ $team->facebook }}">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        @endif @if($team->twitter)
                                            <li>
                                                <a class="text-white" href="{{ $team->twitter }}">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        @endif @if($team->instagram)
                                            <li>
                                                <a class="text-white" href="{{ $team->instagram }}">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        @endif @if($team->youtube)
                                            <li>
                                                <a class="text-white" href="{{ $team->youtube }}">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                        @endif @if($team->github)
                                            <li>
                                                <a class="text-white" href="{{ $team->github }}">
                                                    <i class="fab fa-github"></i>
                                                </a>
                                            </li>
                                        @endif @if($team->linkedin)
                                            <li>
                                                <a class="text-white" href="{{ $team->linkedin }}">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-details__bottom pt-100">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__bottom-left">
                                <h4 class="team-details__bottom-left-title">{{ __('İş Tecrübesi') }}</h4>
                                <p class="team-details__bottom-left-text">{!! $team->work_experience !!}</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__bottom-left">
                                <h4 class="team-details__bottom-left-title">{{ __('Eğitim Bilgileri') }}</h4>
                                <p class="team-details__bottom-left-text">{!! $team->education !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Team Details End-->
@endsection
