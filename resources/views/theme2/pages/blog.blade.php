@extends('theme2.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Blog Detay Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Blog Detay Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Blog Detay Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ $blog->name }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li>
                            <a href="{{ route('site.index') }}">
                                {{ __('Ana Sayfa') }}
                            </a>
                        </li>
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Blog Detay Sayfası 2.İkon')}}">
                        </li>
                        <li>
                            {{ $blog->name }}
                        </li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Blog Detay Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}">
            </div>
        </div>
    </div>

    <!-- News Section Start -->
    <section class="news-section section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="news-details-wrapper">
                        <div class="news-details-content">
                            <ul class="post-cat">
                                @if($blog->categories)
                                    @foreach($blog->categories as $categoryRelation)
                                        <li>
                                            <img class="static-image" src="/theme2/img/icon/category.svg" alt="alt="{{__('Blog Sayfası 4. İkon')}}"">
                                            <strong>{{ $categoryRelation->name }}</strong></li>
                                    @endforeach
                                @endif
                            </ul>
                            <h2>{{ $blog->name }}</h2>
                            <p class="mb-4 mt-4">{!! $blog->description !!}</p>
                            <div class="row g-4 mt-4 mb-5">
                                @foreach($blogImages as $blogImage)
                                <div class="col-md-6">
                                    <div class="details-image">
                                        <img src="/storage/{{ $blogImage->image_url }}" alt="{{ $blogImage->image_url }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-sidebar sticky-style">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>{{__('Bloglarda Ara')}}</h4>
                            </div>
                            <div class="search-widget">
                                <form action="{{ route(getResourceFullLink('blogs','index')) }}" class="sidebar__search-form">
                                    <input type="search" name="q" placeholder="{{__('Bloglarda Ara')}}">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>{{ __('Kategoriler') }}</h4>
                            </div>
                            <div class="news-widget-categories">
                                <ul>
                                    @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                        <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a> </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>{{ __('Son Bloglar') }}</h4>
                            </div>
                            <div class="recent-post-area">
                                @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img style="width: 100px;" src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}">
                                        </div>
                                        <div class="recent-content">
                                            <ul class="post-cat">
                                                @if($blog->categories)
                                                    @foreach($blog->categories as $categoryRelation)
                                                        <li>
                                                            <img class="static-image" src="/theme2/img/icon/category.svg" alt="alt="{{__('Blog Sayfası 4. İkon')}}"">
                                                            <strong>{{ $categoryRelation->name }}</strong></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            <h6>
                                                <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>{{ __('Etiketler') }}</h4>
                            </div>
                            <div class="news-widget-categories">
                                <div class="tagcloud">
                                    @foreach(explode(',',$blog->tags) as $tag)
                                        <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
