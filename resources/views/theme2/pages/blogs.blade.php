@extends('theme2.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover static-bg-image" style="background-image: url('/theme2/img/breadcrumb-shape.png');" alt="{{__('Blog Sayfası Arka Plan Görseli')}}">
        <div class="breadcrumb-shape">
            <img class="static-image" src="/theme2/img/breadcrumb-graph-shape.png" alt="{{__('Blog Sayfası Görseli')}}">
        </div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <div class="icon wow fadeInUp" data-wow-delay=".3s">
                        <img class="static-image" src="/theme2/img/icon/bread-icon.png" alt="{{__('Blog Sayfası 1.İkon')}}">
                    </div>
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".7s">
                        <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        @if(isset($blogCategory))
                            <li><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                        @endif
                        <li>
                            <img class="static-image" src="/theme2/img/icon/arrow-bread-icon.svg" alt="{{__('Blog Sayfası 2.İkon')}}">
                        </li>
                        <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                    </ul>
                </div>
                <div class="icon-box">
                    <div class="icon-circle">
                        <img class="static-image" src="/theme2/img/icon/icon-28.svg" alt="{{__('Blog Sayfası 3.İkon')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="breadcrumb-image wow img-custom-anim-left">
                <img class="static-image" src="/theme2/img/breadcrumb/news-breadcrumb.jpg" alt="{{__('Blog Sayfası 2. Görseli')}}">
            </div>
        </div>
    </div>
    <!-- News Section Start -->
    <section class="news-section section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-4">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ number_format(0.3 + $loop->index * 0.2, 1) }}s">
                            <div class="news-box-items mt-0">
                                <div class="thumb">
                                    <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}">
                                </div>
                                <div class="content">
                                    <ul class="post-cat">
                                        @if($blog->categories)
                                            @foreach($blog->categories as $categoryRelation)
                                                <li>
                                                    <img class="static-image" src="/theme2/img/icon/category.svg" alt="alt="{{__('Blog Sayfası 4. İkon')}}"">
                                                    <strong>{{ $categoryRelation->name }}</strong></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <h3><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{$blog->name}}</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-sidebar sticky-style">
                        @foreach($blogCategories as $blogCategory)
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>{{ __('Kategoriler') }}</h4>
                            </div>
                            <div class="news-widget-categories">
                                <ul>
                                    <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}" style="color: #ffffff">{{ $blogCategory->name }} </a></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
