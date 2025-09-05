@extends('theme9.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')

    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ $team->name }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $team->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- ========== lawyer-details-section start============= -->

    <div class="lawyer-details-section pt-120 pb-120">
        <div class="container">
            <div class="lawyer-info">
                <div class="row justify-content-center gy-5">
                    <div class="col-xl-5 text-xl-start text-center">
                        <img src="/storage/{{ $team->image }}" class="img-fluid rounded-2" alt="{{ $team->name }}" />
                    </div>
                    <div class="col-xl-7">
                        <div class="lawyer-profile text-xl-start text-center">
                            <h2>{{ $team->name }}</h2>
                            <span>{{ $team->job }}</span>
                            <p class="para">{!! $team->description !!}</p>
                            <div class="lawyer-short-details">
                                <h4>{{ __('Kişisel Bilgiler') }}</h4>
                                <ul class="details-list">
                                    <li>
                                        <span>{{ __('E-Posta Adresi') }}: </span>
                                        <h5><a href="mailto:{{ $team->email }}" class="__cf_email__">{{ $team->email }}</a></h5>
                                    </li>
                                    <li>
                                        <span>{{ __('Telefon Numarası') }}: </span>
                                        <h5><a href="tel:{{ $team->telephone }}">{{ $team->telephone }}</a></h5>
                                    </li>
                                    <li>
                                        <span>{{ __('Sosyal Medya') }}:</span>
                                        <ul class="lawyer-social pt-2">
                                            @if($team->facebook)
                                                <a href="{{ $team->facebook }}">
                                                    <i class="bx bxl-facebook"></i>
                                                </a>
                                            @endif @if($team->twitter)
                                                <a href="{{ $team->twitter }}">
                                                    <i class="bx bxl-twitter"></i>
                                                </a>
                                            @endif @if($team->instagram)
                                                <a href="{{ $team->instagram }}">
                                                    <i class="bx bxl-instagram"></i>
                                                </a>
                                            @endif @if($team->youtube)
                                                <a href="{{ $team->youtube }}">
                                                    <i class="bx bxl-youtube"></i>
                                                </a>
                                            @endif @if($team->tiktok)
                                                <a href="{{ $team->tiktok }}">
                                                    <i class="bx bxl-tiktok"></i>
                                                </a>
                                            @endif @if($team->github)
                                                <a href="{{ $team->github }}">
                                                    <i class="bx bxl-github"></i>
                                                </a>
                                            @endif @if($team->linkedin)
                                                <a href="{{ $team->linkedin }}">
                                                    <i class="bx bxl-linkedin"></i>
                                                </a>
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3">
                    <div
                        class="nav flex-lg-column flex-md-row nav-pills gap-lg-4 gap-3 justify-content-lg-start justify-content-center align-items-center wow fadeInUp"
                        data-wow-duration="1.5s"
                        data-wow-delay=".2s"
                        id="v-pills-tab"
                        role="tablist"
                        aria-orientation="vertical"
                    >
                        <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                            {{ __('Eğitim') }}
                        </button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">{{ __('Tecrübe') }}</button>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active text-lg-start text-center" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                            <h3 class="lawyer-edu-title">{{ __('Eğitim Bilgileri') }}</h3>
                            <ul class="lawyer-edu-list">
                                <li>{!! $team->education !!}</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade text-lg-start text-center" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <h3 class="lawyer-edu-title">{{ __('Tecrübe') }}</h3>
                            <ul class="lawyer-edu-list">
                                <li>{!! $team->work_experience !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== lawyer-details-section end============= -->
@endsection
