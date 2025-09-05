<!-- Blog Start -->
<section class="overflow-hidden" data-cursor="global-color">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="pbmit-heading text-left bg-color-dark animation-style2">
                    <h2 class="pbmit-title">{{ __('Adaletin Kaleminden') }}</h2>
                </div>
            </div>
            <div class="col-md-5">
                <div class="blog-text-start text-end">
                    <a href="{{ route(getResourceFullLink('blogs')) }}" class="pbmit-btn pbmit-btn-inline pbmit-btn-inline-hover-white">
                        <span>{{ __('Tüm BLoglar') }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pbmit-posts-wrapper pbmit-element-blog-style-2">
                    @foreach($allBlogs as $indexBlog)
                        <article class="pbmit-blog-style-2">
                            <div class="post-item">
                                <div class="pbminfotech-box-content">
                                    <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                        <div class="pbmit-meta-date">{{ $indexBlog->created_at->translatedFormat('d F Y') }}</div>
                                    </div>
                                    <div class="pbmit-content-wrapper">
                                        <h3 class="pbmit-post-title">
                                            <a href="{{ route(getResourceFullLink('blogs','show'), $indexBlog) }}">{{ $indexBlog->name }}</a>
                                        </h3>
                                        <div class="pbmit-meta-container">
                                            <div class="pbmit-meta-cat-wrapper pbmit-meta-line">
                                                @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                                                    <div class="pbmit-meta-category">
                                                        <a href="#" rel="category tag">{{ $categoryRelation->name }}</a>
                                                    </div>
                                                @endforeach @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-hover-img">
                                    <img src="/storage/{{ $indexBlog->image }}" class="img-fluid" alt="{{ $indexBlog->name }}" />
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog End -->
