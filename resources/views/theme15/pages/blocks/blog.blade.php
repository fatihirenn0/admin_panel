<!-- Section: News & Updates-->
<section data-tm-bg-img="images/bg/1c9.png">
    <div class="container pt-90">
        <div class="section-title">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="text-center mb-60">
                        <div class="tm-sc tm-sc-section-title section-title section-title-style1 text-center bg-img-center bg-no-repeat line-bottom-style3-bordered-line">
                            <div class="title-wrapper">
                                <h2 class="title">{{ __('Bloglar') }}</h2>
                                <div class="title-seperator-line"></div>
                                <div class="paragraph">
                                    <p>{{ __('Hukuki süreçleri anlaşılır ve güvenilir, bir şekilde aktarıyoruz') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                @foreach($allBlogs as $indexBlog)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="tm-sc tm-sc-blog tm-sc-blog-masonry blog-style1-current-theme mb-lg-30">
                            <article class="post type-post status-publish format-standard has-post-thumbnail news">
                                <div class="date">{{ $indexBlog->created_at->translatedFormat('d F') }}</div>
                                <div class="entry-header">
                                    <div class="post-thumb lightgallery-lightbox">
                                        <div class="post-thumb-inner">
                                            <div class="thumb"><img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}" /></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <h4 class="entry-title"><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}" rel="bookmark">{{ $indexBlog->name }}</a></h4>
                                    <div class="pst-excerpt">
                                        <div class="mascot-post-excerpt mb-20">{!! $indexBlog->description !!}</div>
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
