<!-- =============== latest-news-section end  =============== -->

<div class="l-news-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title1 text-center">
                    <h2>{{ __('Adaletin Kaleminden') }}</h2>
                    <p>{{ __('Hukuki süreçleri anlaşılır ve güvenilir, bir şekilde aktarıyoruz') }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="swiper blog-slider1 pb-65">
                <div class="swiper-wrapper mb-50">
                    @foreach($allBlogs as $indexBlog)
                        <div class="swiper-slide wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <div class="l-news-single">
                                <img src="/storage/{{ $indexBlog->image }}" class="casestudy1" alt="{{ $indexBlog->name }}" />
                                @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}" class="news-badge">{{ $categoryRelation->name }}</a>
                                @endforeach @endif
                                <div class="text">
                                    <div class="date">{{ $indexBlog->created_at->translatedFormat('d F Y') }}</div>
                                    <h4><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination d-flex align-items-center justify-content-center"></div>
            </div>
        </div>
    </div>
</div>

<!-- =============== latest-news-section start  =============== -->
