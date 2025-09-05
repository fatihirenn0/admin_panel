@extends('theme7.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ $project->name }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                            <span><a href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a></span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ $project->name }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- Project Details -->
    <section class="section-lg portfolio-single">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pbmit-short-description">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="pbmit-portfolio-heading">
                                    <h3>{{ $project->name }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="pbmit-portfolio-desc">
                                    <p>{!! $project->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="/storage/{{ $project->image }}" class="img-fluid w-100 mb-4" alt="{{ $project->name }}">
                    <div class="pbmit-single-project-details-list">
                        <div class="pbmit-portfolio-lines-wrapper">
                            <ul class="pbmit-portfolio-lines-ul">
                                <li class="pbmit-portfolio-line-li">
                                    <span class="pbmit-portfolio-line-title">{{ __('Kategori') }}: </span>
                                    @foreach($projectCategories as $projectCategory)
                                    <span class="pbmit-portfolio-line-value">{{ $projectCategory->name }}</span>
                                    @endforeach
                                </li>
                                <li class="pbmit-portfolio-line-li">
                                    <span class="pbmit-portfolio-line-title">{{ __('Tarih') }}: </span>
                                    <span class="pbmit-portfolio-line-value">{{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('d F') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Details End-->
@endsection
