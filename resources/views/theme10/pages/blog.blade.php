@extends('theme10.pages.build') @section('title',$blog->name) @section('meta_keywords',$blog->meta_keywords) @section('meta_description',$blog->meta_description) @section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);">
        <div class="container">
            <div class="content">
                <h1>{{ $blog->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ $blog->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-single">
                        <div class="inner-box">
                            <div class="image">
                                <img src="/storage/{{ $blog->image }}" alt="" />
                            </div>
                            <div class="lower-content">
                                <ul class="post-meta">
                                    <li><span class="fa fa-calendar"></span>{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y') }}</li>
                                    @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                        <li><span class="fa fa-list"></span> {{ $categoryRelation->name }}</li>
                                    @endforeach @endif
                                </ul>
                                <h4>{{ $blog->name }}</h4>
                                <div class="text">
                                    <p>{!! $blog->description !!}</p>
                                    <div class="news-gallery">
                                        <div class="row clearfix">
                                            @foreach($blogImages as $blogImage)
                                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                                    <div class="image">
                                                        <img src="/storage/{{ $blogImage->image_url }}" alt="{{ $blog->name }}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--post-share-options-->
                        <div class="post-share-options">
                            <div class="post-share-inner clearfix">
                                <div class="pull-left post-tags">
                                    <span>{{ __('Etiketler') }}: </span>
                                    @foreach(explode(',',$blog->tags) as $tag)
                                        <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php $previousBlog = \App\Models\Blog::where('id','<',$blog->id)->first(); $nextBlog = \App\Models\Blog::where('id','>',$blog->id)->first(); @endphp
                            <!-- New Posts -->
                        <div class="new-posts">
                            <div class="clearfix">
                                @if($previousBlog)
                                    <a class="prev-post pull-left" href="{{ route(getResourceFullLink('blogs','show'),$previousBlog) }}"><span class="fa fa-angle-double-left"></span> {{ __('Önceki') }}</a>
                                @endif @if($nextBlog)
                                    <a class="next-post pull-right" href="{{ route(getResourceFullLink('blogs','show'),$nextBlog) }}">{{ __('Sonraki') }}<span class="fa fa-angle-double-right"></span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">
                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="{{ route(getResourceFullLink('blogs','index')) }}">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="{{__('Bloglarda Ara')}}..." required />
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title-two">
                                <h4>{{ __('Kategoriler') }}</h4>
                            </div>
                            <ul class="blog-cat-two">
                                @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blog_categories','index')) }}"> {{ $categoryRelation->name }} <span></span></a>
                                    </li>
                                @endforeach @endif
                            </ul>
                        </div>

                        <!-- Popular Post Widget-->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title-two">
                                <h4>{{ __('Son Bloglar') }}</h4>
                            </div>

                            @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                <article class="post">
                                    <figure class="post-thumb">
                                        <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" /><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}" class="overlay-box"><span class="icon fa fa-link"></span></a>
                                    </figure>
                                    <div class="text"><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a></div>
                                    <div class="post-info">{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}</div>
                                </article>
                            @endforeach
                        </div>

                        <!--Gallery Widget-->
                        <div class="sidebar-widget instagram-widget">
                            <div class="sidebar-title-two">
                                <h4>{{ __('Galeri') }}</h4>
                            </div>
                            <div class="/theme10/images-outer clearfix">
                                <!--Image Box-->
                                @foreach($blogImages as $blogImage)
                                    <figure class="image-box">
                                        <a href="/storage/{{ $blogImage }}" class="lightbox-image" data-caption="" data-fancybox="/theme10/images" title="Image Title Here" data-fancybox-group="footer-gallery">
                                            <span class="overlay-box flaticon-plus"></span>
                                        </a>
                                        <img src="/storage/{{ $blogImage }}" alt="{{ $blog->name }}" />
                                    </figure>

                                @endforeach
                            </div>
                        </div>

                        <!-- Tags Widget-->
                        <div class="sidebar-widget popular-tags">
                            <div class="sidebar-title-two">
                                <h4>{{ __('Etiketler') }}</h4>
                            </div>
                            @foreach(explode(',',$blog->tags) as $tag)
                                <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
@endsection
