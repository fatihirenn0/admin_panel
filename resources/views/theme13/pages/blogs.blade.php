@extends('theme13.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Banner section -->
    <section class="about-banner position-relative space-header">
        <div class="line d-none d-xl-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xxl-7 col-3xl-6 z-2 banner-content">
                    <h2 class="display-4 text-white mb-3">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h2>
                    <ul class="list-unstyled d-flex align-items-center gap-2">
                        <li><a href="{{ route('site.index') }}" class="text-white">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="ti ti-chevron-right text-white"></i></li>
                        <li><a href="#">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xxl-5 col-3xl-6 d-none d-lg-block position-relative">
                    <div class="about-line-2"></div>
                    <div class="about-line-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blogs -->
    <section class="service-details">
        <div class="container">
            <div class="row g-4 position-relative">
                <div class="col-lg-8">
                    <div class="details-left p-0 bg-transparent">
                        @foreach($blogs as $blog)
                            <div class="blog-standard">
                                <img src="/storage/{{ $blog->image }}" class="w-100" alt="{{ $blog->name }}" />
                                <div class="blog-content">
                                    <ul class="list-unstyled p-0 mt-4 d-flex align-items-center gap-3 flex-wrap">
                                        @foreach($blogCategories as $blogCategory)
                                            <li class="d-flex align-items-center gap-2 gap-lg-3">
                                                <i class="ti ti-tags fs-4"></i>
                                                {{ $blogCategory->name }}
                                            </li>
                                        @endforeach
                                        <li class="text-primary">•</li>
                                        <li class="d-flex align-items-center gap-2 gap-lg-3"><i class="ti ti-calendar-event fs-4"></i>{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y') }}</li>
                                        <li class="text-primary">•</li>
                                    </ul>
                                    <h3 class="mt-2 mb-3">{{ $blog->name }}</h3>
                                    <p>{!! $blog->description !!}</p>
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="outline-btn d-inline-flex align-items-center gap-2">{{__('İncele')}} <i class="ti ti-arrow-up-right fs-5"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 position-sticky">
                    <div class="details-search">
                        <h4>{{__('Bloglarda Ara')}}</h4>
                        <form method="post" action="{{ route(getResourceFullLink('blogs','index')) }}">
                            <input type="text" placeholder="{{__('Bloglarda Ara')}}" />
                            <i class="ti ti-search"></i>
                        </form>
                    </div>
                    <div class="details-search">
                        <h4>{{ __('Kategoriler') }}</h4>
                        <ul class="category-list">
                            @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                <li>
                                    <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">
                                        <div class="img-wrapper">
                                            <img width="20" src="/storage/{{ $blogCategory->image }}" alt="{{ $blogCategory->name }}" />
                                        </div>
                                        <span>{{ $blogCategory->name }}</span>
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
