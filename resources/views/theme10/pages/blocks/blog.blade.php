<!-- News Section -->
<section class="news-section">
    <div class="container">
        <!-- Sec Title -->
        <div class="section-title">
            <div class="clearfix">
                <div class="pull-left">
                    <div class="title">{{ __('Bloglar') }}</div>
                    <h3>{{ __('Hukuki süreçleri anlaşılır ve güvenilir, bir şekilde aktarıyoruz') }}</h3>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            @foreach($allBlogs as $indexBlog)
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}" />
                            <div class="overlay-box">
                                <a href="/storage/{{ $indexBlog->image }}" data-fancybox="news" data-caption="" class="plus flaticon-plus"></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><span class="fa fa-calendar"></span>{{ $indexBlog->created_at->translatedFormat('d F Y') }}</li>
                                @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                                    <li><span class="fa fa-tag"></span>{{ $categoryRelation->name }}</li>
                                @endforeach @endif
                            </ul>
                            <h5><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h5>
                            <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}" class="theme-btn btn-style-two">{{ __('İncele') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End News Section -->
