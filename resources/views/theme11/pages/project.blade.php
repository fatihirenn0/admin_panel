@extends('theme11.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')

    <!-- Page Title -->
    <section class="page-title static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('Proje Detay Sayfası Görseli') }}">
        <div class="auto-container">
            <h1>{{ $project->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                <li>{{ $project->name }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Services Detail Section -->
    <section class="services-detail-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image">
                    <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                </div>
                <div class="lower-content">
                    <h2>{{ $project->name }}</h2>
                    <p>{!! $project->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Detail Section -->
@endsection
