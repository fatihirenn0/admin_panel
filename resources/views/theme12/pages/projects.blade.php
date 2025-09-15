@extends('theme12.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Projeler Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ __('Projeler') }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('Projeler') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="gallery-sec-3 space overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                    <div class="title-area text-center">
                        <span class="sub-title">{{ __('Projeler') }}</span>
                        <h2 class="sec-title">{{ __('Adaletsizliğe Karşı Deneyimle Mücadele Ediyoruz') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                @foreach($projects as $project)
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-card2 inner" data-bg-src="/storage/{{ $project->image }}">
                            <div class="gallery-img">
                                <div class="gallery-content">
                                    <a href="/storage/{{ $project->image }}" class="icon-btn popup-image"><i class="fa-solid fa-eye"></i></a>
                                    <h2 class="box-title"><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h2>
                                    @foreach($projectCategories as $projectCategory)
                                        <p class="box-text">{{ $projectCategory->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
