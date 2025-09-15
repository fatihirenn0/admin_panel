@extends('theme16.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li class="active">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="blog blog_inner blog_inner_padding_right">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-lg-6">
                                <article class="blog_post">
                                    <div class="post_img">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}"><img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" /></a>
                                    </div>
                                    <div class="post_content_part">
                                        <div class="post_content">
                                            <div class="post_header">
                                                <h6>{{ $blog->created_at->translatedFormat('d F Y') }}</h6>
                                                <h3 class="post_title">
                                                    <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a>
                                                </h3>
                                                <p>{!! $blog->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
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
    </section>
@endsection
