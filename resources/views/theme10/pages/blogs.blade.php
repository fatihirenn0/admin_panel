@extends('theme10.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);" alt="{{ __('Blog Sayfası Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Blog Page Section -->
    <section class="blog-page-section">
        <div class="container">
            <div class="row clearfix">
                @foreach($blogs as $blog)
                    <!-- News Block -->
                    <div class="news-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                                <div class="overlay-box">
                                    <a href="/storage/{{ $blog->image }}" data-fancybox="news" data-caption="" class="plus flaticon-plus"></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <ul class="post-meta">
                                    <li><span class="fa fa-calendar"></span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</li>
                                    @foreach($blogCategories as $blogCategory)
                                        <li><span class="fa fa-tags"></span> {{ $blogCategory->name }}</li>
                                    @endforeach
                                </ul>
                                <h5><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a></h5>
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="theme-btn btn-style-three">{{ __('İncele') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Blog Page Section -->
@endsection
