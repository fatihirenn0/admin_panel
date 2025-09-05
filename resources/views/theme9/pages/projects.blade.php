@extends('theme9.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')

    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ __('Projeler') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Projeler') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- ========== case-study-section start============= -->

    <div class="casestudy-gallery pt-120 pb-120" id="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-title2 text-center">
                    <h2>Completed Cases</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="button-group filter-button-group d-flex flex-wrap flex-row justify-content-md-between justify-content-center gap-3 mb-60">

                        <button data-filter="*">{{ __('Tümü') }}</button>
                        @foreach($projectCategories as $projectCategory)
                        <button data-filter=".cat{{ $projectCategory->id }}">{{ $projectCategory->name }}</button>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <div class="grid row d-flex justify-content-center g-4">
                        @foreach($projects as $project)
                            <div class="col-lg-4 col-md-6 col-sm-6 @foreach($project->categories as $singleProjectCategory) cat{{ $singleProjectCategory->id }}  @endforeach">
                            <div class="casestudy-single wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                <img src="/storage/{{ $project->image }}" class="casestudy1" alt="{{ $project->name }}">
                                <a href="{{ route(getResourceFullLink('projects','show'),$project) }}" class="read-more"><span class="btn-text">{{ __('İncele') }}</span><span class="btn-arrow"><i class="bi bi-arrow-right"></i></span></a>
                                <div class="text">
                                    <span>{{ $singleProjectCategory->name }}</span>
                                    <h3><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== case-study-section end============= -->

@endsection
