@extends('theme15.pages.build') @if(isset($projectCategory)) @section('title',$projectCategory->name) @section('meta_keywords',$projectCategory->meta_keywords) @section('meta_description',$projectCategory->meta_description) @else
    @section('title',__('Projeler')) @endif @section('content')
    <!-- Section: home -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Proje Sayfası Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ __('Projeler') }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Ana Sayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2">{{ __('Projeler') }}</span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Case Studies -->
    <section class="bg-white-f5 static-bg-image" data-tm-bg-img="/theme15/images/bg/1c9.png" alt="{{ __('Proje Sayfası Arka Plan Görsel') }}">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tm-sc tm-sc-services tm-sc-services-carousel services-style7-fullwidth-gallery owl-dots-light-skin owl-dots-center">
                            <!-- Isotope Gallery Grid -->
                            <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-nav="true" data-autoplay="true" data-loop="true">
                                @foreach($projects as $project)
                                    <!-- the loop -->
                                    <div class="tm-carousel-item">
                                        <div class="project-style1 tm-service">
                                            <div class="image-thumb">
                                                <div class="thumb">
                                                    <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                                                </div>
                                                <div class="title-holder overlay text-center">
                                                    <h3><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of the loop -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Divider -->
@endsection
