@extends('theme3.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Ekip Detay Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ $team->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{__('Ana Sayfa')}}</a></li>
                    <li>{{ $team->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Team Details Start-->
    <section class="team-details">
        <div class="container pb-100">
            <div class="team-details__top pb-70">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__top-left">
                            <div class="team-details__top-img">
                                <img src="/storage/{{ $team->image }}" alt="{{__( $team->image )}}" />
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
                                    <h5 class="mb-0">{{__('E-Posta Adresi')}}</h5>
                                    <div class="">
                                        <span><a href="mailto:{{ $team->email }}" class="__cf_email__">{{ $team->email }}</a></span>
                                    </div>
                                </div>
                                <div class="team-details-contact mb-30">
                                    <h5 class="mb-0">{{__('Telefon')}}</h5>
                                    <div class="">
                                        <span> <a href="tel:{{ $team->telephone }}">{{ $team->telephone }}</a></span>
                                    </div>
                                </div>
                                <div class="team-details-contact">
                                    <h5 class="mb-0">Web Address</h5>
                                    <div class=""><span>www.yourdomain.com</span></div>
                                </div>
                                <div class="team-details__social">
                                    @if($team->facebook)
                                        <a class="text-white" href="{{ $team->facebook }}"><i class="fab fa-facebook"></i></a>
                                    @endif @if($team->twitter)
                                        <a class="text-white" href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                    @endif @if($team->linkedin)
                                        <a class="text-white" href="{{ $team->linkedin }}"><i class="fab fa-linkedin"></i></a>
                                    @endif @if($team->instagram)
                                        <a class="text-white" href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                                    @endif @if($team->tiktok)
                                        <a class="text-white" href="{{ $team->tiktok }}"><i class="fab fa-tiktok"></i></a>
                                    @endif @if($team->youtube)
                                        <a class="text-white" href="{{ $team->youtube }}"><i class="fab fa-youtube"></i></a>
                                    @endif @if($team->github)
                                        <a class="text-white" href="{{ $team->github }}"><i class="fab fa-github"></i></a>
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
                            <h4 class="team-details__bottom-left-title">{{__('Eğitim')}}</h4>
                            <p class="team-details__bottom-left-text">{{ $team->education }}</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__bottom-left">
                            <h4 class="team-details__bottom-left-title">{{__('İş Deneyimi')}}</h4>
                            <p class="team-details__bottom-left-text">{{ $team->work_experience }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Team Details End-->
@endsection
