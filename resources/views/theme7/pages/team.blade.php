@extends('theme7.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')

    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ $team->name }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Anasayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item"> {{ $team->name }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- Team Member-->
    <section class="team-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="pbmit-team-details">
                        <img src="/storage/{{ $team->image }}" class="w-100" alt="{{ $team->name }}" />
                        <div class="pbmit-team-detail-inner">
                            <div class="pbmit-team-summary">
                                <h4 class="pbmit-team-designation">{{ $team->job }}</h4>
                                <h2 class="pbmit-team-title">{{ $team->name }}</h2>
                            </div>
                            <ul class="pbmit-single-team-info">
                                <li><label>{{ __('Telefon Numarası') }}</label>{{ $team->telephone }}</li>
                                <li>
                                    <label>{{ __('E-Posta Adresi') }}</label>
                                    <a href="mailto:{{ $team->email }}"><span class="__cf_email__">{{ $team->email }}</span></a>
                                </li>
                            </ul>
                            <ul class="pbmit-social-links pbmit-team-social-links">
                                @if($team->facebook)
                                    <li class="pbmit-social-li pbmit-social-facebook">
                                        <a href="{{ $team->facebook }}" title="Facebook" target="_blank">
                                            <span><i class="pbmit-base-icon-facebook-squared"></i></span>
                                        </a>
                                        @endif @if($team->twitter)
                                    </li>

                                    <li class="pbmit-social-li pbmit-social-twitter">
                                        <a href="{{ $team->twitter }}" title="Twitter" target="_blank">
                                            <span><i class="pbmit-base-icon-twitter"></i></span>
                                        </a>
                                    </li>
                                @endif
                                    @if($team->instagram)
                                    <li class="pbmit-social-li pbmit-social-instagram">
                                        <a href="{{ $team->instagram }}" title="Instagram" target="_blank">
                                            <span><i class="pbmit-base-icon-instagram"></i></span>
                                        </a>
                                    </li>
                                @endif
                                    @if($team->youtube)
                                    <li class="pbmit-social-li pbmit-social-youtube">
                                        <a href="{{ $team->youtube }}" title="Youtube" target="_blank">
                                            <span><i class="pbmit-base-icon-youtube-play"></i></span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-details-wrap">
                        <h4 class="pbmit-title">{{ __('Kişisel Bilgiler') }}</h4>
                        <p>{!! $team->description !!}</p>
                    </div>
                    <div class="team-progress">
                        <div class="row">
                            <div class="col-md-12 col-xl-6">
                                <div class="">
                                    <h4 class="pbmit-title">{{ __('Eğitim Bilgileri') }}</h4>
                                    <p>{!! $team->education !!}</p>
                                    <div class="progressbar">
                                        <span class="progress-label">{{ __('Kazanılan Dosya') }}</span>
                                        <div class="progress progress-lg progress-percent-bg">
                                            <div
                                                class="progress-bar aos aos-init aos-animate"
                                                data-aos="slide-right"
                                                data-aos-delay="200"
                                                data-aos-duration="1000"
                                                data-aos-easing="ease-in-out"
                                                role="progressbar"
                                                aria-valuenow="80"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width: 80%;"
                                            ></div>
                                            <span class="progress-percent">80%</span>
                                        </div>
                                    </div>
                                    <div class="progressbar">
                                        <span class="progress-label">{{ __('Başarılı Dilekçe') }}</span>
                                        <div class="progress progress-lg progress-percent-bg">
                                            <div
                                                class="progress-bar aos aos-init aos-animate"
                                                data-aos="slide-right"
                                                data-aos-delay="200"
                                                data-aos-duration="1000"
                                                data-aos-easing="ease-in-out"
                                                role="progressbar"
                                                aria-valuenow="92"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width: 92%;"
                                            ></div>
                                            <span class="progress-percent">92%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-6 team-info">
                                <h4 class="pbmit-title">{{ __('İş Tecrübesi') }}</h4>
                                <p>{!! $team->work_experience !!}</p>
                                <div class="">
                                    <div class="d-flex justify-content-start">
                                        <h2>2002-2005 :</h2>
                                        <p>{{ __('Örnek 1 Hukuk Bürosu') }}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <h2>2010-2012 :</h2>
                                        <p>{{ __('Örnek 2 Hukuk Bürosu') }}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <h2>2012-2019 :</h2>
                                        <p>{{ __('Örnek 3 Hukuk Bürosu') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Member end -->
@endsection
