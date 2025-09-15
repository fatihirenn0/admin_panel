<!-- Blog area start here -->
<section class="blog-area pt-130 pb-130">
    <div class="container">
        <div class="section-header text-center mb-50">
            <h2 class="wow splt-txt" data-splitting>
                {{ __('Hukuki süreçleri anlaşılır ve güvenilir, bir şekilde aktarıyoruz') }}
            </h2>
        </div>
        <div class="row g-5">
            @foreach($allBlogs as $indexBlog)
                <div class="col-lg-4 wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="blog__item">
                        <div class="blog__image">
                            <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}" />
                            <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}" />
                        </div>
                        <div class="blog__content">
                            <ul>
                                @foreach($allBlogCategories as $indexBlogCategory)
                                    <li>{{ $indexBlogCategory->name }}</li>
                                @endforeach
                                <li class="date">{{ $indexBlog->created_at->translatedFormat('d F Y') }}</li>
                            </ul>
                            <h4><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a></h4>
                            <p>{!! $indexBlog->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog area end here -->
