@extends('theme3.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Blog Sayfası 1. Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->
    <!-- Blog Section -->
    <section class="blog-section">
        <div class="icon-plane-4 bounce-y"></div>
        <div class="auto-container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="shop-sidebar">
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h5 class="widget-title">{{ __('Kategoriler') }}</h5>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach($blogCategories as $blogCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">
                                                {{ $blogCategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-9 col-md-8">
                    <div class="row g-4 wow fadeInUp" data-wow-delay="200ms">
                        @foreach($blogs as $blog)
                            <div class="col-12 col-md-6">
                                <div class="inner-box h-100 d-flex flex-column">
                                    <div class="image-box">
                                        <figure class="image mb-0">
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">
                                                <img class="img-fluid w-100" src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                                            </a>
                                        </figure>
                                        <span class="date">
                                    <strong>
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}
                                        <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('F') }}</span>
                                    </strong>
                                </span>
                                    </div>

                                    <div class="content-box flex-grow-1 d-flex flex-column">
                                        <ul class="post-meta">
                                            @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                                <li><i class="fal fa-tags"></i>{{ $categoryRelation->name }}</li>
                                            @endforeach @endif
                                        </ul>

                                        <h4 class="title">
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a>
                                        </h4>

                                        <div class="mt-auto">
                                            <a class="read-more" href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ __('İncele') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- (Varsa) sayfalama --}} @if(method_exists($blogs, 'links'))
                        <div class="mt-4">
                            {{ $blogs->withQueryString()->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Section -->
@endsection
