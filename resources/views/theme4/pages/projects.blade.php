@extends('theme4.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <!-- <div class="page-header__shape"></div> -->
        <!-- /.page-header__shape -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-right">{{__('Projeler')}}</h2>
            <ul class="procounsel-breadcrumb list-unstyled">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li><span>{{__('Projeler')}}</span></li>
            </ul>
            <!-- /.thm-breadcrumb list-unstyled -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-header -->

    <section class="portfolio-two">
        <div class="container">
            <div class="row gutter-y-30">
                @if(count($projectCategories) > 0) @foreach($projectCategories as $projectCategory)
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-two__item">
                            <img src="/storage/{{ $projectCategory->image }}" alt="{{ $projectCategory->name }}" />
                            <div class="portfolio-two__item__content">
                                <div class="portfolio-two__item__cat">
                                    <i class="icon-pin"></i>
                                    <p class="portfolio-two__item__text">{{ $projectCategory->name }}</p>
                                </div>
                                @foreach($projectCategory->projects as $project)
                                    <h3 class="portfolio-two__item__title">
                                        <a href="{{ route(getResourceFullLink('projects','show'),$project) }}"> {{ $project->name }}</a>
                                    </h3>
                                    <div class="portfolio-two__item__rm">
                                        <a href="{{ route(getResourceFullLink('projects','show'),$project) }}"><i class="icon-right-arrow-1-4"></i></a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="portfolio-two__item__bg"></div>
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-two__item">
                            <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                            <div class="portfolio-two__item__content">
                                @foreach($projects as $project)
                                    <h3 class="portfolio-two__item__title">
                                        <a href="{{ route(getResourceFullLink('projects','show'),$project) }}"> {{ $project->name }}</a>
                                    </h3>
                                    <div class="portfolio-two__item__rm">
                                        <a href="{{ route(getResourceFullLink('projects','show'),$project) }}"><i class="icon-right-arrow-1-4"></i></a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="portfolio-two__item__bg"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
