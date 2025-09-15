<!-- Blog -->
<section class="blog-area pt-100">
    <div class="container">
        <div class="section-title">
            <span>{{ __('Adaletin Kaleminden') }}</span>
            <h2>{{ __('Hukuki süreçleri anlaşılır ve güvenilir, bir şekilde aktarıyoruz') }}</h2>
        </div>
        <div class="blog-slider owl-theme owl-carousel">
            @foreach($allBlogs as $indexBlog)
                <div class="blog-item">
                    <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">
                        <img src="/storage/{{ $indexBlog->image }}" alt="{{ $indexBlog->name }}" />
                    </a>
                    <div class="blog-inner">
                        @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                            <span> {{ $categoryRelation->name }}</span>
                        @endforeach @endif
                        <h3>
                            <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{{ $indexBlog->name }}</a>
                        </h3>
                        <ul>
                            <li>
                                <i class="icofont-calendar"></i>
                                {{ $indexBlog->created_at->translatedFormat('d F') }}
                            </li>
                        </ul>
                        <p>{!! $indexBlog->description !!}</p>
                        <a class="blog-link" href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">
                            {{ __('İncele') }}
                            <i class="icofont-simple-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Blog -->
