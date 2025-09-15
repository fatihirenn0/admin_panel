<!-- Blog Start -->
<section class="main-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-title text-center">
                    <span class="sub-title">{{ __('Bloglarımız') }}</span>
                    <h2 class="h2-title">{{ __('Bizden Makaleler') }}</h2>
                </div>
            </div>
        </div>
        <div class="blog-lists">
            <div class="row">
                @foreach($allBlogs as $indexBlog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <div class="blog-img-box">
                                <div class="blog-img-wp">
                                    <div class="blog-img back-img" style="background-image: url('/storage/{{ $indexBlog->image }}');" alt="{{ $indexBlog->name }}"></div>
                                </div>
                                <span class="blog-date">
                                <img class="static-image" src="/theme17/images/calendar-icon.svg" width="20" height="18" alt="{{ __('Anasayfa Bloglar İkon') }}" />{{ $indexBlog->created_at->translatedFormat('d F Y') }}
                            </span>
                            </div>
                            <div class="blog-box-text">
                                <h4 class="h4-title">
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}" title="{{ $indexBlog->name }}">{{ $indexBlog->name }}</a>
                                </h4>
                                <p>{!! $indexBlog->description !!}</p>
                                <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}" class="link-btn" title="{{ __('İncele') }}"><span>{{ __('İncele') }}</span><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Blog End -->
