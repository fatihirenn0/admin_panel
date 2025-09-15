@extends('theme9.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ $page->name }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- =============== About-section start  =============== -->

    <div class="about-section pt-120 pb-120" id="about">
        <img src="/theme9/images/bg/section-bg1.svg" alt="{{ __('Kurumsal Sayfa Arka Plan Görseli') }}" class="section-bg1 img-fluid static-image" />
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-lg-start text-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="200ms">
                    <div class="section-title1">
                        <h2>{{ $page->name }}</h2>
                        <p>{!! $page->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
                    <div class="about1-img wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <img src="/storage/{{ $page->image }}" alt="image" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =============== About-section end  =============== -->
@endsection
