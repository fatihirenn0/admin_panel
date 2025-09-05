@extends('theme10.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);" alt="{{ __('Proje Detay Sayfa Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ $project->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ $project->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Portfolio Single Section -->
    <section class="portfolio-single-section">
        <div class="container">
            <!-- Sec Title -->
            <div class="section-title centered">
                <div class="title">{{ __('Projelerimiz') }}</div>
                <h3>{{ __('Adalet İçin Verdiğimiz Mücadeleye Dair Gerçek Projeler') }}</h3>
            </div>

            <div class="row clearfix">
                <!-- Image Column -->
                <div class="image-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image">
                            <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>{{ $project->name }}</h3>
                        <div class="text">
                            <p>{!! $project->description !!}</p>
                        </div>
                        <ul class="project-list">
                            @foreach(\App\Models\ProjectCategory::orderBy('rank')->get() as $projectCategory)
                                <li><span class="icon fa fa-tag"></span> <strong>{{ __('Kategori') }}: </strong>{{ $projectCategory->name }}</li>
                            @endforeach
                            <li><span class="icon fa fa-calendar"></span> <strong>{{ __('Tarih') }}: </strong>{{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('d F Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Single Section -->
@endsection
