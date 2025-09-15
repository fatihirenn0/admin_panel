@extends('theme12.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Ekip Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $team->name }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ $team->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="team-details mb-60">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="mb-40 mb-xl-0"><img class="w-100" src="/storage/{{ $team->image }}" alt="{{ $team->name }}" /></div>
                    </div>
                    <div class="col-xl-7 ps-3 ps-xl-5 align-self-center">
                        <div class="team-about">
                            <div class="team-wrapp">
                                <div class="top-wrap">
                                    <div class="title-wrap">
                                        <h3 class="team-about_title">{{ $team->name }}</h3>
                                        <p class="team-about_desig">{{ $team->job }}</p>
                                    </div>
                                    <div class="th-social">
                                        @if($team->facebook)
                                            <a href="{{ $team->facebook }}">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <span class="sr-only">Facebook</span>
                                                </a>

                                        @endif
                                        @if($team->twitter)
                                            <a href="{{ $team->twitter }}">
                                                    <i class="fab fa-twitter"></i>
                                                    <span class="sr-only">Twitter</span>
                                                </a>

                                        @endif
                                        @if($team->instagram)
                                            <a href="{{ $team->instagram }}">
                                                    <i class="fab fa-instagram"></i>
                                                    <span class="sr-only">İnstagram</span>
                                                </a>

                                        @endif
                                        @if($team->youtube)
                                            <a href="{{ $team->youtube }}">
                                                    <i class="fab fa-youtube"></i>
                                                    <span class="sr-only">Youtube</span>
                                                </a>

                                        @endif
                                        @if($team->github)
                                             <a href="{{ $team->github }}">
                                                    <i class="fab fa-github"></i>
                                                    <span class="sr-only">Github</span>
                                                </a>

                                        @endif
                                        @if($team->linkedin)
                                            <a href="{{ $team->linkedin }}">
                                                    <i class="fab fa-linkedin"></i>
                                                    <span class="sr-only">Linkedin</span>
                                                </a>

                                        @endif
                                            @if($team->tiktok)
                                                <a href="{{ $team->tiktok }}">
                                                    <i class="fab fa-tiktok"></i>
                                                    <span class="sr-only">Tiktok</span>
                                                </a>

                                            @endif
                                    </div>
                                </div>
                                <p class="team-about_text">
                                    {!! $team->description !!}
                                </p>
                            </div>
                            <div class="about-info-wrap">
                                <div class="about-info">
                                    <div class="about-info_icon"><i class="fa-solid fa-user"></i></div>
                                    <div class="about-info_content">
                                        <p class="about-info_subtitle">{{ __('İş Tecrübesi') }}</p>
                                        <h6 class="about-info_title">{{ $team->work_experience }}</h6>
                                    </div>
                                </div>
                                <div class="about-info">
                                    <div class="about-info_icon"><i class="fas fa-envelope"></i></div>
                                    <div class="about-info_content">
                                        <p class="about-info_subtitle">{{ __('E-Posta Adresi') }}</p>
                                        <h6 class="about-info_title"><a href="mailto:{{ $team->email }}">{{ $team->email }}</a></h6>
                                    </div>
                                </div>
                                <div class="about-info">
                                    <div class="about-info_icon"><i class="fas fa-phone"></i></div>
                                    <div class="about-info_content">
                                        <p class="about-info_subtitle">{{ __('Telefon Numarası') }}</p>
                                        <h6 class="about-info_title"><a href="tel:{{ $team->telephone }}">{{ $team->telephone }}</a></h6>
                                    </div>
                                </div>
                                <div class="about-info">
                                    <div class="about-info_icon"><i class="fas fa-user-graduate"></i></div>
                                    <div class="about-info_content">
                                        <p class="about-info_subtitle">{{ __('Eğitim Bilgileri') }}</p>
                                        <h6 class="about-info_title">{{ $team->education }}</h6>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route(getOtherFullLink('contact')) }}" class="th-btn style2">{{ __('Bize Ulaşın') }}<i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
