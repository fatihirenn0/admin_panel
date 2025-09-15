@extends('theme15.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Section: inner-header -->
    <section class="page-title divider layer-overlay overlay-dark-8 section-typo-light bg-img-center static-image" data-tm-bg-img="/theme15/images/bg/as02.jpg" alt="{{ __('Blog Sayfası Görseli') }}">
        <div class="container pt-90 pb-90">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                            <span class="trail-item trail-begin">
                                <a href="{{ route('site.index') }}"><span>{{ __('Ana Sayfa') }}</span></a>
                            </span>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span class="trail-item trail-end text-theme-colored2"><span>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</span></span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: News & Updates-->
    <section class="static-bg-image" data-tm-bg-img="/theme15/images/bg/1c9.png" alt="{{ __('Blog Sayfası Arka Plan Görseli') }}">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="tm-sc tm-sc-blog tm-sc-blog-masonry blog-style1-current-theme mb-lg-30">
                                <article class="post type-post status-publish format-standard has-post-thumbnail news">
                                    <div class="date">{{ $blog->created_at->translatedFormat('d F Y') }}</div>
                                    <div class="entry-header">
                                        <div class="post-thumb lightgallery-lightbox">
                                            <div class="post-thumb-inner">
                                                <div class="thumb"><img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" /></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content">
                                        <h4 class="entry-title"><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" rel="bookmark">{{ $blog->name }}</a></h4>
                                        <div class="pst-excerpt">
                                            <div class="mascot-post-excerpt mb-20">{!! $blog->description !!}</div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Divider -->
@endsection
