@extends('theme5.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{__('Proje Detay Sayfası Görseli')}}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ $project->name }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $project->name }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Case Study Details -->
    <div class="case-study-details bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-5">
                <!-- Service Details Image -->
                <div class="col-12">
                    <div class="service-details-image">
                        <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}">
                    </div>
                </div>

                <!-- Service Details Content -->
                <div class="col-12 col-md-8">
                    <div class="service-details-content pe-lg-5">
                        <div class="h2">{{ $project->name }}</div>
                        <p>{!! $project->description !!}</p>

                        <div class="row g-4 align-items-center">
                            @foreach($projectImages as $projectImage)
                            <div class="col-6">
                                <img src="/storage/{{ $projectImage->image_url }}" alt="{{ $project->name }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>
    </div>
@endsection
