@extends('theme11.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')

    <!-- Page Title -->
    <section class="page-title static-image" style="background-image:url(/theme11/images/background/1.jpg)" alt="{{ __('Hizmet Detay Sayfası Görseli') }}">
        <div class="auto-container">
            <h1>{{ $service->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                <li>{{ $service->name }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Services Detail Section -->
    <section class="services-detail-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image">
                    <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}">
                </div>
                <div class="lower-content">
                    <h2>{{ $service->name }}</h2>
                    <p>{!! $service->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Detail Section -->
@endsection
