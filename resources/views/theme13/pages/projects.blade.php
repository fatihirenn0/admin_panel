@extends('theme13.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Banner section -->
    <section class="about-banner position-relative space-header">
        <div class="line d-none d-xl-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ __('Projeler') }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Anasayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ __('Projeler') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- impactful projects -->
    <section class="impactful-project pt-0 bg-transparent project-page position-relative z-3">
        <div class="container bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <h2>{{ __('Adaletsizliğe Karşı Deneyimle Mücadele Ediyoruz') }}</h2>
                    <p class="mb-4 pb-lg-3">{{ __('Başarıyla Tamamlanan Çalışmalarımız') }}</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach($projects as $project)
                    <div class="{{ $loop->first ? 'col-lg-6 mt-lg-5 pt-lg-5' : 'col-lg-6' }}">
                        <div class="impactful-card {{ $loop->first ? 'mb-4' : '' }}">
                            <img class="img-fluid" src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                            <a href="{{ route(getResourceFullLink('projects','show'),$project) }}" class="content">
                                <h3 class="mb-3">{{ $project->name }}</h3>
                                <p class="mb-0">{!! $project->description !!}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
