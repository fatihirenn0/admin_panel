@extends('theme3.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Blog Detay Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ $blog->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}"> {{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $blog->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!--Blog Details Start-->
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <!-- Blog Content -->
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                            <div class="blog-details__date">
                                <span class="day">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                                <span class="month">{{ \Carbon\Carbon::parse($blog->created_at)->format('F') }}</span>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                    <li><i class="fas fa-user-circle"></i> {{ $categoryRelation->name }}</li>
                                @endforeach @endif
                            </ul>
                            <h3 class="blog-details__title">{{ $blog->name }}</h3>
                            <p class="blog-details__text-2">{!! $blog->description !!}</p>
                        </div>
                        <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>{{ __('Etiketler') }}</span>
                                @foreach(explode(',',$blog->tags) as $tag)
                                    <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <!-- Search -->
                        <div class="sidebar__single sidebar__search">
                            <form action="{{ route(getResourceFullLink('blogs','index')) }}" class="sidebar__search-form">
                                <input name="q" type="search" placeholder="{{__('Bloglarda Ara')}}" />
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>

                        <!-- Recent Posts -->
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">{{ __('Son Bloglar') }}</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                        </div>
                                        <div class="sidebar__post-content">
                                            @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                                <h3>
                                                    <span class="sidebar__post-content-meta">
                                                        <i class="fas fa-user-circle"></i>
                                                        {{ $categoryRelation->name }}
                                                    </span>
                                                    <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">
                                                        {{ $otherBlog->name }}
                                                    </a>
                                                </h3>
                                            @endforeach @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Categories -->
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">{{ __('Kategoriler') }}</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}"> {{ $blogCategory->name }}<span class="icon-right-arrow"></span> </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Tags -->
                        <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">{{ __('Etiketler') }}</h3>
                            <div class="sidebar__tags-list">
                                @foreach(explode(',',$blog->tags) as $tag)
                                    <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog Details End-->
@endsection
