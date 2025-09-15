@extends('theme14.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <!-- Start main-content -->
    <section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('Proje Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ $project->name }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ $project->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Project Details Start-->
    <section class="project-details pt-120 pb-120">
        <div class="container-lg">
            <div class="project-two__wrp">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-details__top">
                            <div class="project-details__img"><img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" /></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="project-details__content-right">
                            <div class="project-details__details-box pb-30">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <p class="project-details__client">{{ __('Tarih') }}</p>
                                        <h4 class="project-details__name">{{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('d F Y') }}</h4>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <p class="project-details__client">{{ __('Müşteri') }}</p>
                                        <h4 class="project-details__name">{{ $project->client }}</h4>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <p class="project-details__client">{{ __('Şehir') }}</p>
                                        <h4 class="project-details__name">{{ $project->city }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-details__content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="project-details__content-left">
                                <h3 class="mb-4 mt-5">{{ $project->name }}</h3>
                                <p class="">{!! $project->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @php $previousProject = \App\Models\Project::where('id','<',$project->id)->first(); $nextProject = \App\Models\Project::where('id','>',$project->id)->first(); @endphp
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-details__pagination-box">
                            <ul class="project-details__pagination list-unstyled clearfix">
                                <li class="next">
                                    @if($previousProject)
                                        <div class="icon">
                                            <a href="{{ route(getResourceFullLink('projects','show'),$previousProject) }}" aria-label="Previous"><i class="far fa-arrow-left"></i></a>
                                        </div>
                                        <div class="content">{{ __('Önceki') }}</div>
                                    @endif
                                </li>
                                @if($nextProject)
                                    <li class="previous">
                                        <div class="content">{{ __('Sonraki') }}</div>
                                        <div class="icon">
                                            <a href="{{ route(getResourceFullLink('projects','show'),$nextProject) }}" aria-label="Previous"><i class="far fa-arrow-right"></i></a>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Project Details End-->

@endsection
