@extends('theme7.pages.build') @section('title',$blog->name) @section('meta_keywords',$blog->meta_keywords) @section('meta_description',$blog->meta_description) @section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ $blog->name }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ $blog->name }}</span></span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- Blog Details -->
    <section class="section-lgx">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 blog-right-col">
                    <div class="row">
                        <div class="col-md-12">
                            <article class="post blog-details">
                                <div class="post-thumbnail">
                                    <div class="pbmit-featured-container">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="/storage/{{ $blog->image }}" class="img-fluid w-100" alt="{{ $blog->name }}" />
                                        </div>
                                        <div class="pbmit-meta-date-wrapper">
                                        <span class="pbmit-meta pbmit-date">
                                            <a href="#" rel="bookmark">{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y') }}</a>
                                        </span>
                                            @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                                <span class="pbmit-meta pbmit-meta-line">
                                            <a href="#" rel="category tag"> {{ $categoryRelation->name }}</a>
                                        </span>
                                            @endforeach @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <p>{!! $blog->description !!}</p>
                                    <div class="post-img">
                                        <div class="row">
                                            @foreach($blogImages as $blogImage)
                                                <div class="col-md-12 col-xl-6">
                                                    <img src="/storage/{{ $blogImage->image_url }}" class="img-fluid w-100" alt="{{ $blogImage->image_url }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @php $previousBlog = \App\Models\Blog::where('id','<',$blog->id)->first(); $nextBlog = \App\Models\Blog::where('id','>',$blog->id)->first(); @endphp
                            <div class="comments-area">
                                <nav class="navigation post-navigation" aria-label="Posts">
                                    <div class="nav-links">
                                        @if($previousBlog)
                                            <div class="nav-previous">
                                                <a href="{{ route(getResourceFullLink('blogs','show'),$previousBlog) }}" rel="prev">
                                            <span class="pbmit-post-nav-icon">
                                                <i class="pbmit-base-icon-arrow-left"></i>
                                                <span class="pbmit-post-nav-head">{{ __('Önceki') }}</span>
                                            </span>
                                                </a>
                                            </div>
                                        @endif @if($nextBlog)
                                            <div class="nav-next">
                                                <a href="{{ route(getResourceFullLink('blogs','show'),$nextBlog) }}">
                                            <span class="pbmit-post-nav-icon">
                                                <span class="pbmit-post-nav-head"> {{ __('Sonraki') }}</span>
                                                <i class="pbmit-base-icon-arrow-right"></i>
                                            </span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 blog-left-col">
                    <aside class="sidebar">
                        <aside class="widget widget-search">
                            <h2 class="widget-title">{{__('Bloglarda Ara')}}</h2>
                            <form class="search-form" action="{{ route(getResourceFullLink('blogs','index')) }}">
                                <input name="q" type="search" class="search-field" placeholder="{{__('Bloglarda Ara')}}" />
                                <button
                                    type="submit"
                                    style="
                                    position: absolute;
                                    right: 0px;
                                    padding: 0;
                                    border: none;
                                    outline: none;
                                    background-color: transparent;
                                    top: 34%;
                                    height: 50px;
                                    margin-top: -6px;
                                    font-size: 20px;
                                    z-index: 1;
                                    width: 45px;
                                    text-align: center;
                                    color: #232e35;
                                "
                                >
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </aside>
                        <aside class="widget widget-categories">
                            <h2 class="widget-title">{{ __('Kategoriler') }}</h2>
                            <ul>
                                @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                    <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="widget widget-recent-post">
                            <h2 class="widget-title">{{ __('Son Bloglar') }}</h2>
                            <ul class="recent-post-list">
                                @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                    <li class="recent-post-list-li">
                                        <a class="recent-post-thum" href="#">
                                            <img src="/storage/{{ $otherBlog->image }}" class="img-fluid" alt="{{ $otherBlog->name }}" />
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="widget widget-tag-cloud">
                            <h3 class="widget-title">{{ __('Etiketler') }}</h3>
                            <div class="tagcloud">
                                @foreach(explode(',',$blog->tags) as $tag)
                                    <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}" class="tag-cloud-link">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </aside>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details End -->

@endsection
