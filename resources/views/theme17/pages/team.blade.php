@extends('theme17.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ $team->name }}</h1>
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
            <li>{{ $team->name }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Team Detail Start -->
    <section class="main-team-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-detail-img wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="team-img-wp">
                            <div class="team-img">
                                <img src="/storage/{{ $team->image }}" width="317" height="368" alt="{{ $team->name }}" />
                            </div>
                            <div class="team-social">
                                <div class="team-social-share">
                                    <img class="static-image" src="/theme17/images/share-icon.svg" width="15" height="17" alt="{{ __('Ekip Detay Sayfası 1.İkon') }}" />
                                </div>
                                <ul>
                                    @if($team->facebook)
                                        <li>
                                            <a href="{{ $team->facebook }}"><i class="fab fa-facebook"></i></a>
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
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-detail-content wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <span class="sub-title">{{ $team->job }}</span>
                        <h2 class="h2-title">{{ $team->name }}</h2>
                        <div class="team-detail-content-text">
                            <p>
                                {!! $team->description !!}
                            </p>
                        </div>
                        <div class="team-detail-contact">
                            <div class="contact-link-box">
                                <div class="icon">
                                    <img class="static-image" src="/theme17/images/phone-icon.svg" width="26" height="26" alt="{{ __('Ekip Detay Sayfası 2.İkon') }}" />
                                </div>
                                <div class="text">
                                    <p>
                                        <strong>{{ __('Telefon Numarası') }} : </strong>
                                        <a href="tel:{{ $team->telephone }}" title="{{ $team->telephone }}">{{ $team->telephone }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-link-box">
                                <div class="icon">
                                    <img class="static-image" src="/theme17/images/email-icon.svg" width="33" height="25" alt="{{ __('Ekip Detay Sayfası 3.İkon') }}" />
                                </div>
                                <div class="text">
                                    <p>
                                        <strong>{{ __('E-Posta Adresi') }} : </strong>
                                        <a href="mailto:{{ $team->email }}" title="{{ $team->email }}"><span class="__cf_email__">{{ $team->email }}</span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-link-box">
                                <div class="icon">
                                    <img class="static-image" src="/theme17/images/Experience-icon.svg" width="26" height="26" alt="{{ __('Ekip Detay Sayfası 4.İkon') }}" />
                                </div>
                                <div class="text">
                                    <p>
                                        <strong>{{ __('İş Tecrübesi') }} : </strong>
                                        {{ $team->work_experience }}
                                    </p>
                                </div>
                            </div>
                            <div class="contact-link-box">
                                <div class="icon">
                                    <img class="static-image" src="/theme17/images/Qualification-icon.svg" width="26" height="26" alt="{{ __('Ekip Detay Sayfası 5.İkon') }}" />
                                </div>
                                <div class="text">
                                    <p>
                                        <strong>{{ __('Eğitim Bilgileri') }}: </strong>
                                        {{ $team->education }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Detail End -->
@endsection
