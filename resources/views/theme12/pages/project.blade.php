@extends('theme12.pages.build')
@section('title',$project->name)
@section('meta_keywords',$project->meta_keywords)
@section('meta_description',$project->meta_description)
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Proje Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $project->name }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ $project->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="space-top space-extra2-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single mb-30">
                        <div class="page-img"><img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" /></div>
                        <div class="page-content">
                            <h2 class="sec-title page-title">{{ $project->name }}</h2>
                            <p class="mb-40">
                                {!! $project->description !!}
                            </p>
                            <div class="row mt-30 mb-50">
                                @foreach($projectImages as $projectImage)
                                    <div class="col-md-6">
                                        <div class="page-img mb-4"><img class="w-100" src="/storage/{{ $projectImage->image_url }}" alt="{{ $projectImage->name }}" /></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_overview">
                            <div class="widget-call">
                                <h4 class="widget_title">{{ __('Proje Bilgileri') }}</h4>
                                <div class="widget_overview">
                                    <ul>
                                        <li>
                                            <h6>{{ __('Müşteri') }}:</h6>
                                            <p>{{ $project->client }}</p>
                                        </li>
                                        <li>
                                            <h6>{{ __('Yıl') }}:</h6>
                                            <p>{{ $project->start_date }}</p>
                                        </li>
                                        <li>
                                            <h6>{{ __('Şehir') }}:</h6>
                                            <p>{{ $project->city }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">{{ __('Kategoriler') }}</h3>
                            <ul>
                                @foreach(\App\Models\ProjectCategory::orderBy('rank')->get() as $projectCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('project_categories','show'),$projectCategory) }}">{{ $projectCategory->name }}</a> <span><i class="fa-sharp fa-light fa-arrow-right"></i></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
