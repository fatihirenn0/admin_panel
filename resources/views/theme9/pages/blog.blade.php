@extends('theme9.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- ========== breadcrumb start============= -->

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ $blog->name }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== breadcrumb start============= -->

    <!-- ========== faq-section start============ -->

    <div class="blog-details-section pt-120 pb-120">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    <div class="blog-details-single">
                        <div class="image">
                            <a href="/storage/{{ $blog->image }}"><img src="/storage/{{ $blog->image }}" class="img-fluid" alt="{{ $blog->name }}" /></a>
                        </div>
                        <div class="text">
                            <h2>{{ $blog->name }}</h2>
                            <ul class="post-meta-list">
                                @foreach($blog->categories as $categoryRelation)
                                    <li><i class="fas fa-tags"></i><span>{{ $categoryRelation->name }}</span></li>
                                @endforeach
                                <li><i class="fas fa-calendar"></i><span>{{ $blog->created_at->translatedFormat('d F Y') }}</span></li>
                            </ul>
                            <p class="para">{!! $blog->description !!}</p>
                        </div>
                        @foreach($blogImages as $blogImage)
                            <div class="image">
                                <a href="{{ $blogImage->image_url }}"><img src="/storage/{{ $blogImage->image_url }}" class="img-fluid" alt="{{ $blog->name }}" /></a>
                            </div>
                        @endforeach
                    </div>
                    @php $previousBlog = \App\Models\Blog::where('id','<',$blog->id)->first(); $nextBlog = \App\Models\Blog::where('id','>',$blog->id)->first(); @endphp
                    <div class="another-post-area">
                        <div class="row align-items-center">
                            @if($previousBlog)
                                <div class="col-lg-6 col-md-6 d-flex justify-content-md-start justify-content-center">
                                    <div class="prev-post text-md-start text-center">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$previousBlog) }}">
                                    <span>
                                        <svg width="15" height="6" viewBox="0 0 15 6" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 3L5 5.88675V0.113249L0 3ZM4.5 3.5H15V2.5H4.5V3.5Z" />
                                        </svg>
                                        {{ __('Önceki') }}
                                    </span>
                                        </a>
                                    </div>
                                </div>
                            @endif @if($nextBlog)
                                <div class="col-lg-6 col-md-6 d-flex justify-content-md-end justify-content-center">
                                    <div class="next-post text-md-end text-center">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$nextBlog) }}">
                                    <span>
                                        {{ __('Sonraki') }}
                                        <svg width="15" height="6" viewBox="0 0 15 6" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 3L10 0.113249V5.88675L15 3ZM0 3.5H10.5V2.5H0V3.5Z" />
                                        </svg>
                                    </span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="blog-widget-item">
                            <div class="search-area">
                                <div class="blog-widget-body">
                                    <form method="post" action="{{ route(getResourceFullLink('blogs','index')) }}">
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
                                                <!-- <a href="blog-details.html"> -->
                                                <div class="recent-post-item">
                                                    <div class="recent-post-img">
                                                        <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                                    </div>
                                                    <div class="recent-post-content">
                                                        <span>{{ $otherBlog->created_at->translatedFormat('d F Y') }}</span>
                                                        <h6><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a></h6>
                                                    </div>
                                                </div>
                                                <!-- </a> -->
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
