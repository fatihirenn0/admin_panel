<!-- Blog Section -->
<section class="blog-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ __('Adaletin Kaleminden') }}</span>
            <h2 class="words-slide-up text-split">{{ __('Hukuki süreçleri anlaşılır ve güvenilir bir şekilde aktarıyoruz.') }}</h2>
        </div>
        <div class="row">
            <!-- News Block -->
            @foreach($allBlogs as $indexBlog)
                <div class="blog-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}"> <img src="/storage/{{ $indexBlog->image }}" alt="Image" /> <img src="/storage/{{ $indexBlog->image }}" alt="Image" /> </a>
                            </figure>
                            <span class="date">
                            <strong>{{ $indexBlog->created_at->translatedFormat('d') }}<span>{{ $indexBlog->created_at->translatedFormat('F') }}</span> </strong>
                        </span>
                        </div>
                        <div class="content-box">
                            <ul class="post-meta">
                                @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                                    <li><i class="fal fa-tags"></i>{{ $categoryRelation->name }}</li>
                                @endforeach @endif
                            </ul>
                            <h4 class="title"><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h4>
                            <a class="read-more" href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ __('İncele') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--End Blog Section -->
