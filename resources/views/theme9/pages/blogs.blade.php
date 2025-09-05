@extends('theme9.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')

    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- ========== faq-section start============ -->

    <div class="blog-standard-section pt-120 pb-120">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    @foreach($blogs as $blog)
                        <div class="blog-standard-area">
                            <div class="blog-standard-single">
                                <div class="image">
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}"><img src="/storage/{{ $blog->image }}" class="img-fluid" alt="{{ $blog->name }}" /></a>
                                </div>
                                <div class="text">
                                    <h2><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a></h2>
                                    <ul class="post-meta-list">
                                        @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                            <li><i class="fas fa-tags"></i><span>{{ $categoryRelation->name }}</span></li>
                                        @endforeach @endif
                                        <li><i class="fas fa-calendar"></i><span>{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y') }}</span></li>
                                    </ul>
                                    <p class="para">{!! $blog->description !!}</p>
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="read-more-btn">{{ __('İncele') }}<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="blog-widget-item">
                            <div class="search-area">
                                <div class="blog-widget-body">
                                    <form action="{{ route(getResourceFullLink('blogs','index')) }}">
                                        <div class="search-with-btn">
                                            <input type="text" placeholder="{{__('Bloglarda Ara')}}" />
                                            <button><i class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="blog-widget-item">
                            <div class="blog-category">
                                <h5 class="blog-widget-title">{{ __('Kategoriler') }}</h5>
                                <div class="blog-widget-body">
                                    <ul class="category-list">
                                        @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                            <li>
                                                <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}"><span>{{ $blogCategory->name }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="blog-widget-item">
                            <div class="recent-blog">
                                <h5 class="blog-widget-title">{{ __('Son Bloglar') }}</h5>
                                <div class="blog-widget-body">
                                    <ul class="recent-post-list">
                                        @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                            <li>
                                                <div class="recent-post-item">
                                                    <div class="recent-post-img">
                                                        <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                                    </div>
                                                    <div class="recent-post-content">
                                                        <span>30th May, 2022</span>
                                                        <h6><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="blog-widget-item">
                            <div class="post-tag">
                                <h5 class="blog-widget-title">{{ __('Etiketler') }}</h5>
                                <div class="blog-widget-body">
                                    <ul class="tag-list d-flex justify-content-start flex-wrap gap-3">
                                        @foreach(explode(',',$blog->tags) as $tag)
                                            <li><a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== faq-section end============= -->
@endsection
