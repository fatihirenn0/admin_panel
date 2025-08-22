@extends('theme1.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ $project->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li><a href="{{ route(getResourceFullLink('projects')) }}">{{ __('Projeler') }}</a></li>
                    <li>{{ $project->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Project Details Start-->
    <section class="project-details pt-120 pb-120">
        <div class="container">
            <div class="project-two__wrp">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-details__top">
                            <div class="project-details__img"> <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}"> </div>
                        </div>
                    </div>
                </div>

                <div class="project-details__content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="project-details__content-left">
                                <h3 class="mb-4 mt-5">{{ $project->name }}</h3>
                                <p >{!! $project->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-details__pagination-box">
                            <ul class="project-details__pagination list-unstyled clearfix">
                                @php
                                    $previousProject = \App\Models\Project::where('id','<',$project->id)->first();
                                    $nextProject = \App\Models\Project::where('id','>',$project->id)->first();
                                @endphp
                                @if($previousProject)
                                    <li class="next">
                                        <div class="icon">
                                            <a href="{{ route(getResourceFullLink('projects','show'),$previousProject) }}" aria-label="{{ __('Önceki') }}">
                                                <i class="far fa-arrow-left"></i></a>
                                        </div>
                                        <div class="content">{{ __('Önceki') }}</div>
                                    </li>
                                @endif

                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                @if($nextProject)
                                    <li class="previous">
                                        <div class="content">{{ __('Sonraki') }}</div>
                                        <div class="icon"> <a href="{{ route(getResourceFullLink('projects','show'),$nextProject) }}" aria-label="{{ __('Sonraki') }}"><i class="far fa-arrow-right"></i></a> </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
