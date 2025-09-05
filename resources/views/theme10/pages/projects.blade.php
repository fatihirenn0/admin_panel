@extends('theme10.pages.build') @if(isset($projectCategory)) @section('title',$projectCategory->name) @section('meta_keywords',$projectCategory->meta_keywords) @section('meta_description',$projectCategory->meta_description) @else
    @section('title',__('Projeler')) @endif @section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);" alt="{{ __('Projeler Sayfası Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ __('Projeler') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('Projeler') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Portfolio Section Two -->
    <section class="portfolio-section-two">
        <div class="container">
            <!-- Sec Title -->
            <div class="section-title centered">
                <div class="title">{{ __('Projeler') }}</div>
                <h3>
                    {{ __('Adaletsizliğe Karşı Deneyimle Mücadele Ediyoruz') }}
                </h3>
            </div>

            <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns text-center clearfix">
                        <li class="active filter" data-role="button" data-filter="all">{{ __('Tümü') }}</li>
                        @foreach($projectCategories as $projectCategory)
                            <li class="filter" data-role="button" data-filter=".cat{{ $projectCategory->id }}">{{ $projectCategory->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-list row clearfix">
                    @foreach($projects as $project)
                        <!-- Portfolio Block Two -->
                        <div class="portfolio-block-two mix @foreach($project->categories as $singleProjectCategory) cat{{ $singleProjectCategory->id }}  @endforeach col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="/storage/{{ $project->image }}" alt="" />
                                    <div class="overlay-box">
                                        <a href="/storage/{{ $project->image }}" data-fancybox="gallery-1" data-caption="" class="plus flaticon-plus"></a>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h5><a href="{{ route(getResourceFullLink('projects','show'),$project) }}">{{ $project->name }}</a></h5>
                                    <div class="designation">{{ $singleProjectCategory->name }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection @push('js')
    <script src="/theme10/js/mixitup.js"></script>
@endpush
