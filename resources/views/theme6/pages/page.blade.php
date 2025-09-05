@extends('theme6.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img class="static-image" src="/theme6/img/bg/about-p-bg.jpg" alt="{{ __('Hakkımızda Sayfası Görseli') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ $page->name }}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li>{{ $page->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Attorneys Area -->
    <section class="about-page-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img">
                        <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="aboutPtext">
                        <h3>{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h3>
                        <p>{!! $page->description !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /Attorneys Area -->
@endsection
