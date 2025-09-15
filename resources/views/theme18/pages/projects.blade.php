@extends('theme18.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ __('Projeler') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('Projeler') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- portfolio -->
    <section class="portfolio-area portfolio-area-two pt-100">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('Başarıyla Tamamlanan Çalışmalarımız') }}</h2>
            </div>
            <div class="row justify-content-center">
                @foreach($projects as $project)
                    <div class="col-sm-6 col-lg-4">
                        <div class="portfolio-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                            <div class="portfolio-inner">
                                @foreach($projectCategories as $projectCategory)
                                    <span>{{ $projectCategory->name }}</span>
                                @endforeach
                                <h3>
                                    <a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a>
                                </h3>
                                <p>{{ $project->created_at->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End portfolio -->
@endsection
