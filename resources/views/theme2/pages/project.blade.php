@extends('theme2.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Proje Detay Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Proje Detay Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Proje Detay Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ $project->name }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Ana Sayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Proje Detay Sayfası 2.İkon')}}" >
                        </li>
                        <li>
                            {{ $project->name }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Proje Detay Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}">
            </div>
        </div>
    </div>

    <!-- Project Details Section Start -->
    <section class="project-details-section fix section-padding">
        <div class="container">
            <div class="project-details-wrapper">
                <div class="project-details-items">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="details-top-items">
                                <div class="details-left">
                                    <h2>{{ $project->name }}</h2>
                                    <ul class="post-cat">
                                        @foreach($projectCategories as $projectCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('project_categories','show'),$projectCategory) }}">{{ $projectCategory->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="details-right">
                                    <ul class="client-details">
                                        <li>
                                            {{ __('Müşteri') }}: <span>{{ $project->client }}</span>
                                        </li>
                                        <li>
                                            {{ __('Başlangıç Tarihi') }}: <span> {{ \Carbon\Carbon::parse($project->start_date)->translatedFormat('d F Y')  }}</span>
                                        </li>
                                        <li>
                                            {{ __('Bitiş Tarihi') }}: <span> {{ \Carbon\Carbon::parse($project->start_date)->translatedFormat('d F Y')  }}</span>
                                        </li>
                                        <li>
                                            {{ __('Şehir') }}: <span>{{ $project->city }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-details-content">
                    <h3>{{ __('Proje Açıklaması') }}</h3>
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <p>
                                {!! $project->description !!}
                             </p>
                        </div>
                    </div>
                    <div class="row g-4 mt-4">
                        @foreach($projectImages as $projectImage)
                            <div class="col-md-6">
                                <div class="details-image">
                                    <img src="/storage/{{ $projectImage->image_url }}" alt="{{ $projectImage->name }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @php
                    $previousProject = \App\Models\Project::where('id','<',$project->id)->first();
                    $nextProject = \App\Models\Project::where('id','>',$project->id)->first();
                @endphp
                <div class="slider-button d-flex align-items-center justify-content-between">
                    @if($previousProject)
                    <div class="d-flex align-items-center gap-xxl-4 gap-3 gap-2">
                        <a href="{{ route(getResourceFullLink('projects','show'),$previousProject) }}" aria-label="{{ __('Önceki') }}" style="color: #ffffff">
                        <button class="cmn-prev cmn-border d-center">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="fw-bold white-clr previus-text text-capitalize">
                            {{ __('Önceki') }}

                        </span>
                        </a>
                    </div>
                    @endif
                    @if($nextProject)
                        <div class="d-flex align-items-center gap-xxl-4 gap-3 gap-2">
                            <a style="color: #ffffff" href="{{ route(getResourceFullLink('projects','show'),$nextProject) }}" aria-label="{{ __('Sonraki') }}">
                                 <span class="fw-bold white-clr previus-text text-capitalize">
                                    {{ __('Sonraki') }}
                                </span>
                                <button class="cmn-next cmn-border d-center">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
