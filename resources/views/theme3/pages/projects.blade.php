@extends('theme3.pages.build') @if(isset($projectCategory)) @section('title',$projectCategory->name) @section('meta_keywords',$projectCategory->meta_keywords) @section('meta_description',$projectCategory->meta_description) @else
    @section('title',__('Projeler')) @endif @section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Proje Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ __('Projeler') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('Projeler') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End main-content -->
    <!-- Packages Section -->
    <section class="packages-section-two pb-120 pt-120">
        <div class="outer-box">
            <!-- Package Block -->
            @foreach($projects as $project)
                <div class="package-block-two">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route(getResourceFullLink('projects','show'),$project) }}"><img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" /></a>
                            </figure>
                        </div>
                        <div class="content-box">
                            <span class="count">{{ $project->id }}</span>
                            <h4 class="title"><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h4>
                            <div class="text location">{!! $project->description !!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Packages Section -->
@endsection
