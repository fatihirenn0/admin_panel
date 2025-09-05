@extends('theme1.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <section class="page-title static-bg-image" alt="{{ __('Sayfaların Arkaplan Görseli') }}" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ $blog->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $blog->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->
    <!--Blog Details Start-->
    <section class="blog-details pt-120 pb-120">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img">
                                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}">
                                <div class="blog-details__date">
                                    <span class="day">{{ $blog->created_at->format('d') }}</span>
                                    <span class="month">{{ $blog->created_at->translatedFormat('F') }}</span>
                                </div>
                            </div>
                            <div class="blog-details__content">
                                <h3 class="blog-details__title"{{ $blog->name }}></h3>
                                <p class="blog-details__text-2">{!! $blog->description !!}</p>
                            </div>
                            <div class="blog-details__bottom">
                                <div class="blog-details__social-list">
                                    <a href="{{ $settings->get('twitter') }}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="{{ $settings->get('facebook') }}">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="{{ $settings->get('linkedin') }}">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="{{ $settings->get('facebook') }}">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="nav-links">
                                @php
                                    $previousBlog =\App\Models\Blog::where('id','<',$blog->id)->first();
                                    $nextBlog = \App\Models\Blog::where('id','>',$blog->id)->first();
                                @endphp
                                @if($previousBlog)
                                    <div class="prev">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$previousBlog) }}" rel="prev">{{ $previousBlog->name }}</a>
                                    </div>
                                @endif
                                @if($nextBlog)
                                    <div class="next">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$nextBlog) }}" rel="next">{{ $nextBlog->name }}</a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                                <form action="{{ route(getResourceFullLink('blogs','index')) }}" class="sidebar__search-form">
                                    <input type="search" name="q" placeholder="{{__('Bloglarda Ara')}}">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">{{ __('Son Bloglar') }}</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                    @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                        <li>
                                            <div class="sidebar__post-image"> <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}"> </div>
                                            <div class="sidebar__post-content">
                                                <h3>  <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a>
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
                                        <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a> </li>
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
@endsection
