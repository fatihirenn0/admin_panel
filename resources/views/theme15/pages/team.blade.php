@extends('theme15.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Section: home -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Ekip Detay Sayfası Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ $team->name }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
									<span class="trail-item trail-begin">
										<a href="{{ route('site.index') }}"><span>{{ __('Anasayfa') }}</span></a>
									</span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2"><span>{{ $team->name }}</span></span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Team Details -->
    <section class="static-bg-image"  data-tm-bg-img="/theme15/images/pattern/p6.png" alt="{{ __('Ekip Detay Sayfası Arka Plan Görseli')  }}">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-md-30">
                            <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <h2 class="name mb-0">{{ $team->name }}</h2>
                        <h5 class="text-theme-colored2 mb-30">{{ $team->job }}</h5>
                        <p>{!! $team->description !!}</p>
                        <div class="tm-sc tm-sc-progress-bar progress-bar-fixed-right-percent mt-30 mb-40" data-percent="95" data-unit-left="" data-unit-right="%" data-bar-height="" data-barcolor="bg-theme-colored1">
                            <div class="progress-title-holder">
                                <h6 class="pb-title">{{ __('İş Tecrübesi') }}</h6>
                                <p>{!! $team->work_experience !!}</p>
                            </div>
                        </div>
                        <div class="tm-sc tm-sc-progress-bar progress-bar-fixed-right-percent mb-40" data-percent="80" data-unit-left="" data-unit-right="%" data-bar-height="" data-barcolor="bg-theme-colored1">
                            <div class="progress-title-holder">
                                <h6 class="pb-title">{{ __('Eğitim Bilgileri') }}</h6>
                                <p>{!! $team->education !!}</p>
                            </div>
                        </div>
                       <ul class="styled-icons icon-md icon-dark icon-rounded icon-theme-colored2 mt-30">
                            @if($team->facebook)
                                <li>
                                    <a class="social-link" href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a>
                                </li>
                            @endif @if($team->twitter)
                                <li>
                                    <a class="social-link" href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a>
                                </li>
                            @endif @if($team->linkedin)
                                <li>
                                    <a class="social-link" href="{{ $team->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                </li>
                            @endif @if($team->instagram)
                                <li>
                                    <a class="social-link" href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a>
                                </li>
                            @endif @if($team->youtube)
                                <li>
                                    <a class="social-link" href="{{ $team->youtube }}"><i class="fa fa-youtube"></i></a>
                                </li>
                            @endif @if($team->github)
                                <li>
                                    <a class="social-link" href="{{ $team->github }}"><i class="fa fa-github"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
