@extends('theme11.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('Blog Detay Sayfası Görseli') }}">
        <div class="auto-container">
            <h1>{{ $blog->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li>{{ $blog->name }}</li>
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
                    <!-- Block Detail -->
                    <div class="blog-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                                @foreach($blog->categories as $categoryRelation)
                                    <div class="category">{{ $categoryRelation->name }}</div>
                                @endforeach
                                <ul class="post-meta">
                                    <li><span class="icon flaticon-timetable"></span>{{ $blog->created_at->translatedFormat('d F Y') }}</li>
                                </ul>
                            </div>
                            <div class="lower-content">
                                <h3>{{ $blog->name }}</h3>
                                <p>{!! $blog->description !!}</p>
                                <div class="two-column">
                                    <div class="row clearfix">
                                        <!-- Column -->
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            @foreach($blogImages as $blogImage)
                                                <div class="image">
                                                    <img src="/storage/{{ $blogImage->image_url }}" alt="{{ $blog->name }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
