@extends('theme12.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Blog Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    @foreach($blogs as $blog)
                        <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-img">
                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}"><img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" /></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                @foreach($blogCategories as $blogCategory)
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">
                                    <i class="fa-regular fa-tags"></i>
                                    {{ $blogCategory->name }}
                                </a>
                                @endforeach
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}
                                </a>
                            </div>
                            <h2 class="blog-title"><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a></h2>
                            <p class="blog-text">
                                {!! $blog->description !!}
                            </p>
                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="link-btn">{{ __('İncele') }} <i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <form class="search-form" method="post" action="{{ route(getResourceFullLink('blogs','index')) }}">
                                <input type="text" name="q" placeholder="{{__('Bloglarda Ara')}}" /> <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">{{ __('Kategoriler') }}</h3>
                            <ul>
                                @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                 <li>
                                    <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a> <span><i class="fa-sharp fa-light fa-arrow-right"></i></span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">{{ __('Son Bloglar') }}</h3>
                            <div class="recent-post-wrap">
                                @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                     <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}"><img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" /></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a></h4>
                                        <div class="recent-post-meta"><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}</a></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">{{ __('Etiketler') }}</h3>
                            <div class="tagcloud">
                                @foreach(explode(',',$blog->tags) as $tag)
                                <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
