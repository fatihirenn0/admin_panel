@extends('theme5.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')

    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{__('Blog Sayfası Görseli')}}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Blog Section -->
    <div class="blog-page-section bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-4">

                <!-- Blog Card -->
                @foreach($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-4">
                    <div class="blog-card bg-secondary style-three">
                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}">
                        <div class="p-4">
                            <div class="blog-meta mt-0 d-flex align-items-center gap-2">
                                @if($blog->categories)
                                    @foreach($blog->categories as $categoryRelation)
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $categoryRelation->name }}</a>
                                    @endforeach
                                @endif
                                <div class="dot"></div>
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</a>
                            </div>
                            <a class="post-title mb-3" href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{$blog->name}}</a>
                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="btn btn-link">{{ __('İncele') }}<i class="ti ti-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="divider"></div>
    </div>
@endsection
