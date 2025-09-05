@extends('theme2.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');"  alt="{{__('Ekip Detay Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Ekip Detay Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png"alt="{{__('Ekip Detay Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ $team->name }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{__('Ana Sayfa')}}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Ekip Detay Sayfası 2.İkon')}}">
                        </li>
                        <li>
                            {{ $team->name }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Ekip Detay Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img class="static-image" src="/storage/{{ $team->image }}" alt="{{__( $team->image )}}">
            </div>
        </div>
    </div>

    <!-- Team Details Section Start -->
    <section class="team-details-section fix section-padding">
        <div class="container">
            <div class="team-details-wrapper">
                <div class="details-header">
                    <div class="content">
                        <h2>{{ $team->name }}</h2>
                        <span>{{ $team->job }}</span>
                    </div>
                    <div class="social-icon d-flex align-items-center">
                        @if($team->facebook)
                            <a class="text-white" href="{{ $team->facebook }}"><i class="fab fa-facebook"></i></a>
                        @endif
                        @if($team->twitter)
                            <a class="text-white" href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($team->linkedin)
                            <a class="text-white" href="{{ $team->linkedin }}"><i class="fab fa-linkedin"></i></a>
                        @endif
                        @if($team->instagram)
                            <a class="text-white" href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($team->tiktok)
                            <a class="text-white" href="{{ $team->tiktok }}"><i class="fab fa-tiktok"></i></a>
                        @endif
                        @if($team->youtube)
                            <a class="text-white" href="{{ $team->youtube }}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if($team->github)
                            <a class="text-white" href="{{ $team->github }}"><i class="fab fa-github"></i></a>
                        @endif
                    </div>
                </div>
                <div class="info-icon-wrapper">
                    <div class="icon-items">
                        <div class="icon">
                            <img src="/theme2/img/icon/call-icon.svg" alt="{{__('Ekip Detay Sayfası 5.İkon')}}">
                        </div>
                        <div class="content">
                            <span>{{__('Telefon')}}</span>
                            <h3><a href="tel:{{ $team->telephone }}">{{ $team->telephone }}</a></h3>
                        </div>
                    </div>
                    <div class="icon-items">
                        <div class="icon">
                            <img src="/theme2/img/icon/email-icon.svg" alt="img">
                        </div>
                        <div class="content">
                            <span>{{__('E-Posta Adresi')}}</span>
                            <h3><a href="mailto:{{ $team->email }}" class="link">{{ $team->email }}</a></h3>
                        </div>
                    </div>
                </div>
                <div class="details-content">
                    <h2 class="text-white mb-4">
                        {{ $team->name }} {{__('Hakkında')}}
                    </h2>
                    <p>
                       {!! $team->description !!}
                    </p>
                </div>
                <div class="skills-wrap">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="skill-content">
                                <h3>{{__('İş Deneyimi')}} :</h3>
                                <p style="color:#ffffff;">
                                    {{ $team->work_experience }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="skill-content">
                                <h3>{{__('Eğitim')}} :</h3>
                                <p  style="color:#ffffff;">
                                    {{ $team->education }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
