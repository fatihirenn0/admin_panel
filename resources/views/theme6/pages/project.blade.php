@extends('theme6.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img class="static-image" src="/theme6/img/bg/practice-breadcrumb-bg.jpg" alt="{{ __('Proje Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ $project->name }}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li>{{ $project->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Attorneys Area -->
    <section class="practice-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="aboutPimg">
                        <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}">
                    </div>
                    <div class="aboutPtext">
                        <h1> {{ $project->name }}</h1>
                        <p>{!! $project->description !!}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-attorneys">
                        <h4>{{ __('Kategoriler') }}</h4>
                        @foreach(\App\Models\ProjectCategory::orderBy('rank')->get() as $projectCategory)
                            <div class="ss-attorneys">
                                <a href="{{ route(getResourceFullLink('project_categories','show'),$projectCategory) }}">{{ $projectCategory->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- /Attorneys Area -->
@endsection
