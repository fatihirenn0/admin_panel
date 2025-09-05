<!-- News Area -->
<section class="news-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-titleV1 wow fadeIn" data-wow-delay=".25s">
                    <h3>{{ __('Adaletin Kaleminden') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($allBlogs as $indexBlog)
                <div class="col-md-4">
                    <div class="single-blog-news wow fadeIn" data-wow-delay=".25s">
                        <div class="sb-img">
                            <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}" />
                        </div>
                        <div class="sb-meta">
                            <ul class="meta-list">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ $indexBlog->created_at->translatedFormat('d F Y') }}</li>
                                @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                                    <li><i class="fa fa-tags" aria-hidden="true"></i><a href="#">{{ $categoryRelation->name }}</a></li>
                                @endforeach @endif
                            </ul>
                        </div>
                        <div class="sb-text">
                            <h4><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h4>
                            <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ __('İncele') }}<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /News Area -->
