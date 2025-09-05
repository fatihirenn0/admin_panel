@extends('theme5.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')

    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{__('Proje Sayfası Görseli')}}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{__('Projeler')}}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{__('Projeler')}}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Case Study Three -->
    <div class="case-study-section-three bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-4">
                @foreach($projects as $project)
                <!-- Case Study -->
                <div class="col-12 col-md-6 col-lg-4">
                    <a class="magnet-link" href="{{ route(getResourceFullLink('projects','show'),$project) }}">
                        <div class="case-study-card style-two">
                            <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}">
                            <div class="case-study-content">
                                <div>{{ $project->name }}</div>
                                @foreach($projectCategories as $projectCategory)
                                <p class="mb-0">{{ $projectCategory->name }}</p>
                                @endforeach
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>

        <div class="divider"></div>
    </div>
@endsection
