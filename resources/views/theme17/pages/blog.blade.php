@extends('theme17.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ $blog->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-box">
        <ul>
            <li>
                <a href="{{ route('site.index') }}" title="{{ __('Ana Sayfa') }}">{{ __('Ana Sayfa') }}</a>
            </li>
            <li>{{ $blog->name }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Detail Start -->
    <section class="page-blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-detail-content">
                        <div class="page-blog-lists wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <div class="blog-img-box">
                                <div class="blog-img-wp">
                                    <div class="blog-img back-img" style="background-image: url('/storage/{{ $blog->image }}')"></div>
                                </div>
                                <span class="blog-date">
                                <img class="static-image" src="/theme17/images/calendar-icon.svg" width="20" height="18" alt="{{  __('Blog Detay Sayfası 1.İkon') }}" />{{ $blog->created_at->translatedFormat('d F Y') }}
                            </span>
                            </div>
                        </div>
                        <h2 class="h2-title">{{ $blog->name }}</h2>
                        <div class="blog-detail-text-box">
                            <p>
                                {!! $blog->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="blog-search">
                            <h4 class="h4-title">{{__('Bloglarda Ara')}}</h4>
                            <form action="{{ route(getResourceFullLink('blogs','index')) }}" method="post">
                                <div class="search-box">
                                    <input type="text" name="q" class="form-input" placeholder="{{ __('Bloglarda Ara') }}" required autocomplete="off" />
                                    <button type="submit" class="search-btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="blog-category">
                            <h4 class="h4-title">{{ __('Kategoriler') }}</h4>
                            <ul>
                                @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}" title="{{ $blogCategory->name }}">{{ $blogCategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4 class="h4-title">{{ __('Son Bloglar') }}</h4>
                            @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                <div class="recent-post-box">
                                    <div class="img back-img" style="background-image: url('/storage/{{ $otherBlog->image }}')"></div>
                                    <div class="text">
                                        <p>
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}" title="{{ $otherBlog->name }}">Domestic {{ $otherBlog->name }}</a>
                                        </p>
                                        <div class="date">
                                            <img class="static-image" src="/theme17/images/calendar-icon.svg" width="20" height="17" alt="{{ __('Blog Detay Sayfası 2.İkon') }}" />{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d
                                    F Y') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="blog-tags">
                            <h4 class="h4-title">{{ __('Etiketler') }}</h4>
                            <ul>
                                @foreach(explode(',',$blog->tags) as $tag)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}" title="{{ $tag }}">{{ $tag }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Detail End -->
@endsection
