@extends('theme17.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ $project->name }}</h1>
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
            <li>{{ $project->name }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Case Study Detail Start -->
    <section class="page-case-study-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="case-study-detail-content wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="case-study-detail-box img">
                            <img src="/storage/{{ $project->image }}" width="830" height="450" alt="{{ $project->name }}" />
                        </div>
                        <div class="case-study-detail-box">
                            <h2 class="h2-title">{{ $project->name }}</h2>
                            <p>
                                {!! $project->description !!}
                            </p>
                        </div>
                        <div class="case-study-challenge">
                            @foreach($projectImages as $projectImage)
                                <div class="case-study-challenge-box">
                                    <img src="/storage/{{ $projectImage->image_url }}" width="260" height="200" alt="{{ $project->name }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="case-information">
                            <h3 class="h4-title">{{ __('Kategoriler') }}</h3>
                            <ul>
                                @foreach(\App\Models\ProjectCategory::orderBy('rank')->get() as $projectCategory)
                                    <li><strong>{{ $projectCategory->name }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Case Study Detail End -->
@endsection
