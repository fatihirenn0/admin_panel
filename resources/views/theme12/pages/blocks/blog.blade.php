<section class="space bg-smoke2" id="blog-sec">
    <div class="shape-mockup jump-reverse d-none d-xxl-block" data-left="0" data-bottom="0"><img class="static-bg-image" src="/theme12/img/shape/blog-1-shape-left.png" alt="{{ __('Anasayfa Blog 1.İkon') }}" /></div>
    <div class="shape-mockup jump d-none d-xxl-block" data-right="0" data-bottom="0"><img class="static-bg-image" src="/theme12/img/shape/blog-1-shape-right.png" alt="{{ __('Anasayfa Blog 2.İkon') }}" /></div>
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title">{{ __('Adaletin Kaleminden') }}</span>
                    <h2 class="sec-title">{{ __('Hukuki süreçleri anlaşılır ve güvenilir, bir şekilde aktarıyoruz') }}</h2>
                </div>
            </div>
            <div class="col-lg-auto d-none d-lg-block">
                <div class="sec-btn">
                    <div class="icon-box">
                        <button data-slider-prev="#blogSlider1" class="slider-arrow default show-all"><i class="far fa-arrow-left"></i></button>
                        <button data-slider-next="#blogSlider1" class="slider-arrow default show-all"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div
                class="swiper th-slider has-shadow"
                id="blogSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}, "autoHeight": "true"}'
            >
                <div class="swiper-wrapper">
                    @foreach($allBlogs as $indexBlog)
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}"><img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}" /></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">
                                                <i class="fa-regular fa-tags"></i>
                                                {{ $categoryRelation->name }}
                                            </a>
                                        @endforeach @endif
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $indexBlog->created_at->translatedFormat('d F Y') }}
                                        </a>
                                    </div>
                                    <h3 class="box-title"><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
