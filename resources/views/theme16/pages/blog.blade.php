@extends('theme16.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ $blog->name }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li class="active">{{ $blog->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="blog_inner blog_inner_padding">
        <div class="container">
            <div class="blog_details">
                <div class="post_img">
                    <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog_details_inner">
                            <div class="post_content">
                                <div class="post_header">
                                    <h6>{{ $blog->created_at->translatedFormat('d F Y') }}</h6>
                                    <h3 class="post_title">{{ $blog->name }}</h3>
                                </div>
                                <div class="fulltext">
                                    <p>{!! $blog->description !!}</p>

                                    <div class="post_gallery">
                                        <div class="row">
                                            @foreach($blogImages as $blogImage)
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="anim_box" data-aos="overlay-right">
                                                        <img src="/storage/{{ $blogImage->image_url }}" alt="{{ $blogImage->name }}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar">
                            <div id="search" class="widget widget_search">
                                <div class="sidebar_search">
                                    <form class="search_form" action="{{ route(getResourceFullLink('blogs','index')) }}">
                                        <input type="text" name="q" class="keyword form-control" placeholder="{{__('Bloglarda Ara')}}" />
                                        <button type="submit" class="form-control-submit"><i class="ion-ios-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div id="recent-posts-1" class="widget widget_recent_posts">
                                <h4 class="widget_title">
                                    {{ __('Son Bloglar') }}
                                    <span class="title_line"></span>
                                </h4>
                                <div class="sidebar_recent_posts">
                                    <ul class="recent_post_list">
                                        @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                            <li class="recent_post_item">
                                                <div class="recent_post_image">
                                                    <img class="primary_img" src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                                </div>
                                                <div class="recent_post_content">
                                                    <h5><a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a></h5>
                                                    <h6>{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}</h6>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div id="categories-1" class="widget widget_categories">
                                <h4 class="widget_title">
                                    {{ __('Kategoriler') }}
                                    <span class="title_line"></span>
                                </h4>
                                <div class="sidebar_categories">
                                    <ul class="category_list">
                                        @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                            <li class="active"><a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div id="tags-1" class="widget widget_tag_cloud">
                                <h4 class="widget_title">
                                    {{ __('Etiketler') }}
                                    <span class="title_line"></span>
                                </h4>
                                <div class="sidebar_tags">
                                    <ul class="tag_list">
                                        @foreach(explode(',',$blog->tags) as $tag)
                                            <li><a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
