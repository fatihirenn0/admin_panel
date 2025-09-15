@extends('theme16.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ __('Projeler') }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li class="active">{{ __('Projeler') }}</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="portfolio_inner">
        <div class="container-fluid">
            <div class="portfolio-filters-content">
                <div class="filters-button-group">
                    <button class="button is-checked" data-filter="*">{{ __('Tümü') }}</button>
                    @foreach($projectCategories as $projectCategory)
                        <button class="button" data-filter=".cat{{ $projectCategory->id }}">{{ $projectCategory->name }}</button>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-4 gutter-20 clearfix">
                @foreach($projects as $project)
                 <div class="grid-item @foreach($project->categories as $singleProjectCategory) cat{{ $singleProjectCategory->id }}  @endforeach ">
                    <div class="thumb">
                        <img class="item_image" src="/storage/{{ $project->image }}" alt="{{ $project->name }}">
                        <div class="works-info works_info_bg">
                            <div class="label-text">
                                <h6><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
