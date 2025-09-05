@extends('theme6.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img class="static-image" src="/theme6/img/bg/news-bg.jpg" alt="{{ __('Blog Detay Sayfası Görseli') }}" />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ $blog->name }}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li>{{ $blog->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Attorneys Area -->
    <section class="news-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-wrapper">
                        <div class="single-blog-news sbn-largev sbn-details">
                            <div class="sb-img">
                                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                            </div>
                            <div class="sb-meta">
                                <ul class="meta-list">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ $blog->created_at->translatedFormat('d F Y') }}</li>
                                    @foreach($blog->categories as $categoryRelation)
                                        <li><i class="fa fa-tags" aria-hidden="true"></i><a href="#">{{ $categoryRelation->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sb-text">
                                <h4>{{ $blog->name }}</h4>
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-search">
                            <form class="ssf">
                                <div class="ss-group">
                                    <form action="{{ route(getResourceFullLink('blogs','index')) }}">
                                        <input type="text" class="ss-input" placeholder="{{__('Bloglarda Ara')}}" />
                                        <button type="submit" class="ss-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-attorneys">
                            <h4>{{ __('Kategoriler') }}</h4>
                            @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                <div class="ss-attorneys">
                                    <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="sidebar-attorneys recent-post-widget">
                            <h4>{{ __('Son Bloglar') }}</h4>
                            @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                <div class="ss-attorneys ss-rp">
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="sidebar-attorneys tagWidget">
                            <h4>{{ __('Etiketler') }}</h4>
                            <ul class="tag-list">
                                @foreach(explode(',',$blog->tags) as $tag)
                                    <li><a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Attorneys Area -->
@endsection
