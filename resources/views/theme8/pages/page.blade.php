@extends('theme8.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- About Us -->
    <div class="mcgill-about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">{{ $page->name }}</span>
                    <h2 class="mcgill-heading">{{ $page->name }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 animate-box" data-animate-effect="fadeInLeft">
                    <img src="/storage/{{ $page->image }}" class="img-fluid mb-30" alt="{{ $page->name }}" />
                </div>
                <div class="col-md-7 animate-box" data-animate-effect="fadeInLeft">
                    <h4>{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h4>
                    <p>{!! $page->description !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
