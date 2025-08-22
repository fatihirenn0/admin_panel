@extends('theme1.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <section class="page-title" style="background-image: url(/theme1/images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center position-relative">
                <h1 class="title">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    @if(isset($blogCategory))
                        <li><a href="{{ route(getResourceFullLink('blogs')) }}">{{ __('Bloglar') }}</a></li>
                    @endif
                    <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Blog Section -->
    <section class="blog-section pt-120 pb-120">
        <div class="auto-container">
            <div class="blog__wrp">
                <div class="row g-4">
                    @foreach($blogs as $blog)
                        <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="{{ (200 * $loop->index) % 400 }}ms" data-wow-duration="1500ms">
                            <div class="blog__item">
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="blog__image">
                                    <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}">
                                </a>
                                <div class="blog__content">
                                    <ul>
                                        @if($blog->categories)
                                            @foreach($blog->categories as $categoryRelation)
                                                <li><strong>{{ $categoryRelation->name }}</strong></li>
                                            @endforeach
                                        @endif

                                        <li><span>{{ $blog->created_at->translatedFormat('d F Y') }}</span></li>
                                    </ul>
                                    <h4 class="mt-10"><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
