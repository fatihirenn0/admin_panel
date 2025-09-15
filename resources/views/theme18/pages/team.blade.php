@extends('theme18.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ $team->name }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ $team->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Attorney Details -->
    <div class="attorney-details pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="attor-details-item">
                        <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" />
                        <div class="attor-details-left">
                            <div class="attor-social">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="attor-details-item">
                        <div class="attor-details-right">
                            <div class="attor-details-name">
                                <h2>{{ $team->name }}</h2>
                                <span>{{ $team->job }}</span>
                            </div>
                            <div class="attor-details-things">
                                <h3>{{ __('Kişisel Bilgiler') }}</h3>
                                <p>
                                    {!! $team->description !!}
                                </p>
                            </div>
                            <div class="attor-details-things">
                                <h3>{{ __('Eğitim Bilgileri') }}</h3>
                                <ul>
                                    <li>{{ $team->education }}</li>
                                </ul>
                            </div>
                            <div class="attor-details-things">
                                <h3>{{ __('İş Tecrübesi') }}</h3>
                                <p>
                                    {{ $team->work_experience }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Attorney Details -->
@endsection
