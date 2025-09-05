@extends('theme7.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{__('Projeler')}}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-angle-double-right"></i></span>
                            <span><span class="post-root post post-post current-item">{{__('Projeler')}}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->
    <!-- Portfolio Style 2 -->
    <section class="section-lg slider-tooltip">
        <div class="container">
            <div class="row g-3">
                @foreach($projects as $project)
                    <div class="col-sm-12 col-md-4">
                        <div class="pbmit-portfolio-style-3">
                            <div class="pbminfotech-post-content" data-cursor-tooltip="">
                                <div class="pbmit-featured-wrapper">
                                    <a href="{{ route(getResourceFullLink('projects','show'),$project) }}">
                                        <img src="/storage/{{ $project->image }}" class="img-fluid" alt="{{ $project->name }}" />
                                    </a>
                                </div>
                                <div class="pbminfotech-box-content">
                                    @foreach($projectCategories as $projectCategory)
                                        <div class="pbmit-port-cat">
                                            <a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $projectCategory->name }}</a>
                                        </div>
                                    @endforeach
                                    <h3 class="pbmit-title">{{ $project->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Portfolio Style 2 End -->
@endsection
