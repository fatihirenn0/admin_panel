@extends('theme14.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Breadcrumb area start here -->
    <section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('Blog Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ $blog->name }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ $blog->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end here -->

    <!--Blog Details Start-->
    <section class="blog-details pt-120 pb-120">
        <div class="container-lg">
            <div class="funfact__wrp">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img">
                                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                                <div class="blog-details__date">
                                    <span class="day">{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d') }}</span>
                                    <span class="month">{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('F') }}</span>
                                </div>
                            </div>
                            <div class="blog-details__content">
                                <ul class="list-unstyled blog-details__meta">
                                    @foreach($blog->categories as $categoryRelation)
                                        <li><i class="fas fa-tags"></i>{{ $categoryRelation->name }}</li>
                                    @endforeach
                                </ul>
                                <h3 class="blog-details__title">{{ $blog->name }}</h3>
                                <p class="blog-details__text-2">{!! $blog->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                                <form action="{{ route(getResourceFullLink('blogs','index')) }}" class="sidebar__search-form">
                                    <input type="search" name="q" placeholder="{{__('Bloglarda Ara')}}" />
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">{{ __('Son Bloglar') }}</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                    @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                        <li>
                                            <div class="sidebar__post-image"><img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" /></div>
                                            <div class="sidebar__post-content">
                                                <h3>
                                                    <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a>
                                                </h3>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar__single sidebar__category">
                                <h3 class="sidebar__title">{{ __('Kategoriler') }}</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                    @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                        <li class="{{ $loop->first ? 'active' : '' }}">
                                            <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}<span class="icon-right-arrow"></span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
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
        </div>
    </section>
    <!--Blog Details End-->
@endsection
