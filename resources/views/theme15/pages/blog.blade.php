@extends('theme15.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Section: inner-header -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center" data-tm-bg-img="/theme15/images/bg/as02.jpg">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ $blog->name }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Ana Sayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2"><span>{{ $blog->name }}</span></span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section>
        <div class="container pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-9">
                        <article class="post-single">
                            <div class="entry-header mb-30">
                                <div class="post-thumb thumb"><img class="img-fullwidth" src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" /></div>
                            </div>
                            <div class="entry-content">
                                <h5>{{ $blog->name }}</h5>
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-3 sidebar-area sidebar-right">
                        <div class="split-nav-menu clearfix widget widget_search">
                            <form role="search" class="search-form" action="{{ route(getResourceFullLink('blogs','index')) }}">
                                <input type="search" class="form-control search-field" placeholder="{{__('Bloglarda Ara')}}" value="" name="q" />
                                <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="split-nav-menu clearfix widget widget-blog-list clearfix">
                            <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">{{ __('Son Bloglar') }}</h4>
                            <div class="tm-widget tm-widget-blog-list">
                                @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                    <article class="post media-post clearfix">
                                        <a class="post-thumb" href="#">
                                            <img width="100" height="70" src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                        </a>
                                        <div class="post-right">
                                            <h6 class="post-title"><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a></h6>
                                            <span class="post-date">
                                        <span class="entry-date">{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}</span>
                                    </span>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="widget widget_categories">
                            <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">{{ __('Kategoriler') }}</h4>
                            <ul>
                                @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}<span class="icon-right-arrow"></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
