@extends('theme9.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')

    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <div class="team-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                    <div class="section-title2 text-center">
                        <span>{{ __('Ekibimiz') }}</span>
                        <h2>{{ __('Sizi En İyi Şekilde Temsil Edecek Hukuk Ekibimiz') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-4 mb-60">
                @foreach($teams as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="{{ number_format(($loop->index + 1) * 0.2, 1) }}s">
                        <div class="attorney-single sibling2">
                            <img src="/storage/{{ $team->image }}" class="casestudy1" alt="{{ $team->name }}" />
                            <div class="content">
                                <h4><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h4>
                                <p>{{ $team->job }}</p>
                            </div>
                            <ul class="social-list2 gap-3">
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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- =============== Footer-section start ============ -->
@endsection
