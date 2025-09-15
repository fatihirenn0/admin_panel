@extends('theme10.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image:url(/theme10/images/background/4.jpg)" alt="{{ __('Kurumsal Sayfa Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ $page->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $page->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- About Section -->
    <section class="about-section">
        <!-- Image Layer -->
        <div class="image-layer" style="background-image:url(/storage/{{ $page->image }})"></div>
        <div class="container">
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <!-- Sec Title -->
                        <div class="section-title">
                            <div class="title">{{ $page->name }}</div>
                        </div>

                        <div class="text">
                        <p>{!! $page->description !!}</p>
                        </div>

                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-8 col-sm-12">
                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img class="static-image" src="/theme10/images/resource/about-2.jpg" alt="{{ __('Kurumsal Sayfa 2. Görseli') }}"/>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End About Section -->

@endsection
