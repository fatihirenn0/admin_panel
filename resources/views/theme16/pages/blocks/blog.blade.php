<section class="blog blog_home_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading_common heading_primary_color text-center">
                    <h5>{{ __('Adaletin Kaleminden') }}</h5>
                    <h3>{{ __('Hukuki süreçleri anlaşılır ve güvenilir, bir şekilde aktarıyoruz') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="swiper_post">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach($allBlogs as $indexBlog)
                                <div class="swiper-slide">
                                    <div class="slider">
                                        <article class="blog_post">
                                            <div class="post_img">
                                                <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}"><img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}"></a>
                                            </div>
                                            <div class="post_content_part">
                                                <div class="post_content">
                                                    <div class="post_header">
                                                        <h6> {{ $indexBlog->created_at->translatedFormat('d F Y') }}</h6>
                                                        <h3 class="post_title">
                                                            <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a>
                                                        </h3>
                                                        <p>{!! $indexBlog->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="navigation">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
