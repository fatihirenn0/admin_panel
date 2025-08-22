@extends('theme1.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ $page->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li><a href="#">{{ __('Kurumsal') }}</a></li>
                    <li>{{ $page->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- About area start here -->
    <section class="about-area pt-120 pb-120">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="about__image">
                        <figure class="wow imageLeftToRight gsap__parallax">
                            <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 pl-70">

                    <div class="section-header">
                        <h4 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ __('Kurumsal') }}</h4>
                        <h2 class="wow splt-txt" data-splitting>{{ $page->name }}</h2>
                        <p class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">{!! $page->description !!}</p>
                    </div>
                    <div class="image mt-60">
                        <figure class="wow imageRightToLeft gsap__parallax">
                            <img class="static-image" src="/theme1/images/about/about-image2.jpg" alt="{{ __('Hakkımızda 2.Görseli') }}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
