@extends('theme6.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img class="static-image" src="/theme6/img/bg/attorneys-details-bg.jpg" alt="{{ __('Ekip Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ $team->name }}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                            <li>{{ $team->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->
    <!-- Attorneys Area -->
    <section class="attorneys-page-area">
        <div class="container">
            <div class="attoroney-details-wrapper">
                <div class="row">
                    <div class="col-md-9">
                        <div class="attorny-img-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="aii-info">
                                        <div class="aii-title">
                                            <h4>{{ $team->name }}</h4>
                                            <p>{{ $team->job }}</p>
                                        </div>
                                        <h5>{{ __('Eğitim') }}:</h5>
                                        <p>{!! $team->education !!}</p>
                                        <h5>{{ __('İş Tecrübesi') }}: </h5>
                                        <p>{!! $team->work_experience !!}</p>
                                        <p><span>{{ __('Telefon Numarası') }}:</span>{{ $team->telephone }}</p>
                                        <p><span>{{ __('E-Posta Adresi') }}:</span> <a href="mailto:{{ $team->email }}" class="__cf_email__"> {{ $team->email }}</a></p>
                                        <div class="aii-social">
                                            <ul class="social-list">
                                                @if($team->facebook)
                                                    <li> <a href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                                @endif
                                                @if($team->twitter)
                                                        <li> <a href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                                @endif
                                                @if($team->linkedin)
                                                        <li> <a href="{{ $team->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                                @endif
                                                @if($team->instagram)
                                                        <li> <a href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                                @endif
                                                @if($team->youtube)
                                                        <li> <a href="{{ $team->youtube }}"><i class="fa fa-youtube"></i></a></li>
                                                @endif
                                                @if($team->github)
                                                        <li> <a href="{{ $team->github }}"><i class="fa fa-github"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="aii-img">
                                        <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="adi-text">
                            <p> {!! $team->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Attorneys Area -->
@endsection
