<!-- News Section Start -->
<section class="news-section section-padding pt-0">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                        <span class="wow fadeInUp">
                            <img class="static-image" src="/theme2/img/icon/sub-title-icon.svg" alt="{{__('Ana Sayfa Blog 1. İkon')}}">
                             {{ __('Hukuki Makaleler ve İçerikler') }}
                        </span>
                <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                    {{ __('Hukuk Dünyasından Haberler') }}
                </h2>
            </div>
            <a href="{{ route(getResourceFullLink('blogs')) }}" class="theme-btn border-btn wow fadeInUp" data-wow-delay=".5s">
                {{ __('Tümü') }} <img class="static-image" src="/theme2/img/icon/arrow-right-btn.svg" alt="{{__('Ana Sayfa Blog 2. İkon')}}">
            </a>
        </div>
        <div class="row">
            @foreach($allBlogs as $indexBlog)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ number_format(0.3 + $loop->index * 0.2, 1) }}s">
                <div class="news-box-items">
                    <div class="thumb">
                        <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->image }}">
                        <div class="overlay-bg"></div>
                        <span class="date-box">
                                    <span class="date">{{ $indexBlog->created_at->translatedFormat('d') }}/</span>
                                    <span class="month">{{ $indexBlog->created_at->translatedFormat('F') }}/</span>
                                </span>
                    </div>
                    <div class="content">
                        <ul class="post-cat">
                            @if($indexBlog->categories)
                                @foreach($indexBlog->categories as $categoryRelation)
                                    <li><strong>{{ $categoryRelation->name }}</strong></li>
                                @endforeach
                            @endif
                        </ul>
                        <h3><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
