@extends('theme17.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ __('Projeler') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-box">
        <ul>
            <li>
                <a href="{{ route('site.index') }}" title="{{ __('Ana Sayfa') }}">{{ __('Ana Sayfa') }}</a>
            </li>
            <li>{{ __('Projeler') }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Case Study Start -->
    <section class="page-case-study">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="case-study-tabbing">
                        <ul class="nav" id="caseStudyTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                                    {{ __('Tümü') }}
                                </button>
                            </li>

                            @foreach($projectCategories as $projectCategory) @php $tabId = 'cat-'.$projectCategory->id; @endphp
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="{{ $tabId }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $tabId }}" type="button" role="tab" aria-controls="{{ $tabId }}" aria-selected="false">
                                    {{ $projectCategory->name }}
                                </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="case-study-tab-content">
                        <div class="tab-content" id="caseStudyTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="row">
                                    @foreach($projects as $project)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="case-study-box">
                                                <img src="/storage/{{ $project->image }}" width="480" height="610" alt="{{ $project->name }}" />
                                                <div class="case-study-box-content">
                                                    <h4 class="h4-title">
                                                        <a href="{{ route(getResourceFullLink('projects','show'), $project) }}" title="{{ $project->name }}">
                                                            {{ $project->name }}
                                                        </a>
                                                    </h4>
                                                    <div class="case-study-box-text">
                                                        <p>{{ $project->short_description ?? '' }}</p>
                                                        <a href="{{ route(getResourceFullLink('projects','show'), $project) }}" class="arrow-btn" title="{{ $project->name }}">
                                                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @foreach($projectCategories as $projectCategory) @php $tabId = 'cat-'.$projectCategory->id; @endphp
                            <div class="tab-pane fade" id="{{ $tabId }}" role="tabpanel" aria-labelledby="{{ $tabId }}-tab">
                                <div class="row">
                                    @foreach($projects as $project) @if($project->categories && $project->categories->pluck('id')->contains($projectCategory->id))
                                        <div class="col-md-6 col-lg-4">
                                            <div class="case-study-box">
                                                <img src="/storage/{{ $project->image }}" width="480" height="610" alt="{{ $project->name }}" />
                                                <div class="case-study-box-content">
                                                    <h4 class="h4-title">
                                                        <a href="{{ route(getResourceFullLink('projects','show'), $project) }}" title="{{ $project->name }}">
                                                            {{ $project->name }}
                                                        </a>
                                                    </h4>
                                                    <div class="case-study-box-text">
                                                        <p>{{ $project->short_description ?? '' }}</p>
                                                        <a href="{{ route(getResourceFullLink('projects','show'), $project) }}" class="arrow-btn" title="{{ $project->name }}">
                                                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Case Study End -->
@endsection
