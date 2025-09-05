@extends('theme6.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img class="static-image" src="/theme6/img/bg/gallery-bg.jpg" alt="{{ __('Projeler Sayfası Görseli') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{__('Projeler')}}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li>{{__('Projeler')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Gallery Area -->
    <section class="gallery-area">
        <div class="container">
            <div class="gallery-box">
                <div class="row">
                    @foreach($projects as $project)
                    <div class="col-md-4">
                        <div class="single-galleryV1">
                            <a data-fancybox="gallery" href="{{ route(getResourceFullLink('projects','show'),$project) }}">
                                <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
