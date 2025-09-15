@extends('theme13.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Banner section -->
    <section class="about-banner position-relative space-header">
        <div class="line d-none d-xl-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ $blog->name }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ $blog->name }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- service details -->
    <section class="service-details">
        <div class="container">
            <div class="row g-4 position-relative">
                <div class="col-lg-8">
                    <div class="details-left mb-4">
                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" class="img-fluid w-100" />
                        <div class="details-content pt-4">
                            <ul class="list-unstyled p-0 mt-3 d-flex flex-wrap align-items-center gap-3 text-white">
                                @foreach($blog->categories as $categoryRelation)
                                    <li class="d-flex align-items-center gap-2 gap-md-3"><i class="ti ti-tags fs-4 text-primary"></i> {{ $categoryRelation->name }}</li>
                                @endforeach
                                <li class="text-primary">•</li>
                                <li class="d-flex align-items-center gap-2 gap-md-3"><i class="ti ti-calendar-event fs-4 text-primary"></i> {{ $blog->created_at->translatedFormat('d F Y') }}</li>
                                <li class="text-primary">•</li>
                            </ul>
                            <h2>{{ $blog->name }}</h2>
                            <p>{!! $blog->description !!}</p>
                            <div class="row g-3 align-items-center">
                                @foreach($blogImages as $blogImage)
                                    <div class="col-sm-6">
                                        <img src="/storage/{{ $blogImage->image_url }}" class="w-100 img-fluid" alt="{{ $blogImage->name }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 position-sticky">
                    <div class="details-search">
                        <h4>Search</h4>
                        <form method="post" action="{{ route(getResourceFullLink('blogs','index')) }}">
                            <input type="text" name="q" placeholder="{{__('Bloglarda Ara')}}" />
                            <i class="ti ti-search"></i>
                        </form>
                    </div>
                    <div class="details-search">
                        <h4>{{ __('Kategoriler') }}</h4>
                        <ul class="more-projects">
                            @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                <li class="pt-0">
                                    <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">
                                        <img width="100" height="100" src="/storage/{{ $blogCategory->image }}" alt="{{ $blogCategory->name }}" />
                                        <div>
                                            <span class="fw-medium text-white text-lg mb-1 d-block">{{ $blogCategory->name }} </span>
                                            <span class="text-primary">{{ \Carbon\Carbon::parse($blogCategory->created_at)->translatedFormat('d F Y') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
