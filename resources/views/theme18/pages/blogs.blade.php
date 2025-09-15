@extends('theme18.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Our Blogs</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog -->
    <section class="blog-area blog-area-two  pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($blogs as $blog)
                    <div class="col-sm-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".3s">
                        <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">
                            <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}">
                        </a>
                        <div class="blog-inner">
                            @foreach($blogCategories as $blogCategory)
                                <span>{{ $blogCategory->name }}</span>
                            @endforeach
                            <h3>
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $blog->created_at->translatedFormat('d F Y') }}
                                </li>
                            </ul>
                            <p>{!! $blog->description !!}</p>
                            <a class="blog-link" href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">
                                {{ __('İncele') }}
                                <i class="icofont-simple-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Blog -->
@endsection
