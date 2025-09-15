@extends('theme14.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Breadcrumb area start here -->
    <section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('Blog Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end here -->

    <!-- Blog area start here -->
    <section class="blog-area pt-130 pb-20">
        <div class="container-lg">
            <div class="row g-5">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 wow fadeInLeft" data-wow-delay="00ms">
                        <div class="blog__item">
                            <div class="blog__image">
                                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                                <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                            </div>
                            <div class="blog__content">
                                <ul>
                                    @foreach($blogCategories as $blogCategory)
                                        <li>{{ $blogCategory->name }}</li>
                                    @endforeach
                                    <li class="date"> {{ $blog->created_at->translatedFormat('d F Y') }}</li>
                                </ul>
                                <h4><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a></h4>
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog area end here -->
@endsection
