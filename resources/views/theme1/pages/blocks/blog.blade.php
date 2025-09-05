<section class="blog-area pt-120 pb-100">
    <div class="blog__shape">
        <img class="animation__arryUpDown static-image" src="/theme1/images/blog/blog-shape1.png" alt="{{__('Ana Sayfa Blog 1. Arka Plan Görseli')}}">
    </div>
    <div class="blog__shape2">
        <img class="animation__arryUpDown static-image" src="/theme1/images/blog/blog-shape2.png" alt="{{__('Ana Sayfa Blog 2. Arka Plan Görseli')}}">
    </div>
    <div class="container">
        <div class="section-header__icon text-center mb-50">
            <div class="icon mb-10 wow bounceIn">
                <img class="static-image" src="/theme1/images/icon/top-icon-img.png" alt="{{ __('Ana Sayfa Blog İkon') }}">
            </div>
            <h2 class="wow splt-txt" data-splitting>{{ __('Güncel Hukukta Doğru Bilgi') }}</h2>
        </div>
        <div class="blog__wrp">
            <div class="row g-4">
                @foreach($allBlogs as $indexBlog)
                    <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="{{ (200 * $loop->index) % 400 }}ms" data-wow-duration="1500ms">
                        <div class="blog__item">
                            <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}" class="blog__image">
                                <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->image }}">
                            </a>
                            <div class="blog__content">
                                <ul>
                                    @if($indexBlog->categories)
                                        @foreach($indexBlog->categories as $categoryRelation)
                                            <li><strong>{{ $categoryRelation->name }}</strong></li>
                                        @endforeach
                                    @endif

                                    <li><span>{{ $indexBlog->created_at->translatedFormat('d F Y') }}</span></li>
                                </ul>
                                <h4 class="mt-10"><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
