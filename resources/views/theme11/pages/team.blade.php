@extends('theme11.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Page Title -->
    <section class="page-title static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('Ekibimiz Detay Sayfası Görseli') }}">
        <div class="auto-container">
            <h1>{{ $team->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                <li>{{ $team->name }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Services Detail Section -->
    <section class="services-detail-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image">
                    <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" />
                </div>
                <div class="lower-content">
                    <h2>{{ $team->name }}</h2>
                    <p>{!! $team->description !!}</p>
                    <div class="row clearfix">
                        <div class="column col-lg-3 col-md-6 col-sm-6">
                            <ul class="list-style-one">
                                <li>{!! $team->education !!}</li>
                                <li>{!! $team->work_experience !!}</li>
                            </ul>
                        </div>
                        <div class="column col-lg-3 col-md-6 col-sm-6">
                            <ul class="list-style-one">
                                <li>{{ $team->address }}</li>
                                <li>{{ $team->telephone }}</li>
                                <li>{{ $team->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Detail Section -->
@endsection
