<!-- Blog -->
<div class="mcgill-blog">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta"> {{ __('Adaletin Kaleminden') }}</span>
                <h2 class="mcgill-heading">{{ __('Hukuki süreçleri anlaşılır ve güvenilir Bir şekilde aktarıyoruz.') }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($allBlogs as $indexBlog)
                <div class="col-md-4">
                    <div class="blog-entry">
                        <a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}" class="blog-img"><img src="/storage/{{ $indexBlog->image }}" class="img-fluid" alt="{{ $indexBlog->name }}" /></a>
                        @if($indexBlog->categories) @foreach($indexBlog->categories as $categoryRelation)
                            <div class="desc">
                                <span><a href="#">{{ $categoryRelation->name }}</a></span>
                                @endforeach @endif
                                <h4><a href="{{ route(getResourceFullLink('blogs','show'),$indexBlog) }}">{!! $indexBlog->name !!}</a></h4>
                                <span class="text-right">{{ $indexBlog->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
