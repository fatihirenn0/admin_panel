@extends('theme11.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('Blog Sayfası Görseli') }}">
        <div class="auto-container">
            <h1>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-classic">
                        @foreach($blogs as $blog)
                            <!-- News Block -->
                            <div class="news-block">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}"><img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" /></a>
                                        @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                            <div class="category">{{ $categoryRelation->name }}</div>
                                        @endforeach @endif
                                        <ul class="post-meta">
                                            <li>
                                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}"><span class="icon flaticon-timetable"></span>{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="lower-content">
                                        <h3><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a></h3>
                                        <div class="text">{!! $blog->description !!}</div>
                                        <div class="btn-box">
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="theme-btn btn-style-two"><span class="txt">{{ __('İncele') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">
                            <!-- Search -->
                            <div class="sidebar-widget search-box">
                                <form method="post" action="{{ route(getResourceFullLink('blogs','index')) }}">
                                    <div class="form-group">
                                        <input type="search" name="q" value="" placeholder="{{__('Bloglarda Ara')}}" required="" />
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>

                            <!--Blog Category Widget-->
                            <div class="sidebar-widget sidebar-blog-category">
                                <div class="widget-content">
                                    <div class="sidebar-title">
                                        <h5>{{ __('Kategoriler') }}</h5>
                                    </div>
                                    <ul class="cat-list-two">
                                        @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                            <li>
                                                <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Popular Post Widget -->
                            <div class="sidebar-widget popular-posts">
                                <div class="widget-content">
                                    <div class="sidebar-title">
                                        <h5>{{ __('Son Bloglar') }}</h5>
                                    </div>
                                    @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                        <article class="post">
                                            <figure class="post-thumb">
                                                <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" /><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}" class="overlay-box"></a>
                                            </figure>
                                            <div class="text"><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a></div>
                                            <div class="post-info">{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}</div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tags Widget -->
                            <div class="sidebar-widget popular-tags">
                                <div class="widget-content">
                                    <div class="sidebar-title">
                                        <h5>{{ __('Etiketler') }}</h5>
                                    </div>
                                    @foreach(explode(',',$blog->tags) as $tag)
                                        <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
