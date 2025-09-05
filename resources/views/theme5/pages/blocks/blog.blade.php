<!-- Blog Section -->
<section class="blog-section bg-white">
    <div class="divider"></div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <div class="sub-title justify-content-center">
                        <img class="static-image" src="/theme5/img/core-img/hammer.png" alt="{{ __('Anasayfa Blog İkon') }}">
                        {{ __('Adaletin Kaleminden') }}
                    </div>
                    <h2 class="mb-0">{{ __('Hukuki süreçleri anlaşılır ve güvenilir') }} <br> {{ __('Bir şekilde aktarıyoruz') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="divider-sm"></div>

    <div class="container">
        <div class="row g-5">
            @foreach($allBlogs as $indexBlog)
            <!-- Blog Card -->
            <div class="col-12 col-md-6">
                <div class="blog-card wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}">
                    <div class="blog-meta d-flex align-items-center gap-2">
                        <a href="#">{{ $indexBlog->created_at->translatedFormat('d F Y') }}</a>
                        <div class="dot"></div>
                        @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                        <a href="#">{{ $categoryRelation->name }}</a>
                        @endforeach @endif
                    </div>
                    <a class="post-title" href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="divider"></div>
</section>
