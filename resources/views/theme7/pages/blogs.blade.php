@extends('theme7.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                            <span><a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Ana Sayfa') }}</span></a></span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- Blog Grid -->
    <section class="section-lg blog-section-home4">
        <div class="container">

            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-sm-12 col-md-4">
                    <article class="pbmit-blog-style-1">
                        <div class="post-item">
                            <div class="pbmit-featured-container">
                                <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                        <img src="/storage/{{ $blog->image }}" class="img-fluid"  alt="{{ $blog->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="pbminfotech-box-content">
                                <div class="pbmit-meta-container">
                                    <span class="pbmit-date-wrapper pbmit-meta-line">
                                    <span class="pbmit-post-date">{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y') }}</span>
                                    </span>
                                    @if($blog->categories)
                                        @foreach($blog->categories as $categoryRelation)
                                    <span class="pbmit-meta-category pbmit-meta-line">
                                       <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" rel="category tag">{{ $categoryRelation->name }}</a>
                                    </span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pbmit-box-content-wrapper">
                                    <h3 class="pbmit-post-title">
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{$blog->name}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Grid End -->
@endsection
