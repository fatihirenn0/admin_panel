@extends('theme19.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')

    <!-- Blog list -->
    <section class="Blog-list-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-list-banner">
                        <div class="blog-list-title">
                            <h3>{{ __('Güncel Hukuki Gelişmeler, Makaleler ve Uzman Görüşleri') }}</h3>
                            <h4>{{ __('Hukukun nabzını tutan içeriklerimizle bilgiye bir adım önde ulaşın. Alanında uzman ekibimizin kaleminden çıkan analiz, haber ve yorumlarla hukuki dünyada güncel kalın.') }}</h4>
                        </div>
                    </div>
                    <div class="heading-and-search">
                        <div class="common-heading-v1">
                            <h5>{{ __('Bizden Makaleler') }}</h5>
                        </div>
                        <div class="search-filter">
                            <form action="{{ route(getResourceFullLink('blogs','index')) }}">
                                <input name="q" type="search" placeholder="{{__('Bloglarda Ara')}}..." />
                                <img class="search-img static-image" src="/theme19/icons/search.png" alt="{{ __('Blog Sayfası 1.İkon') }}" />
                            </form>
                        </div>
                    </div>
                    <div class="blog-details-wrap">
                        <div class="left-side-blog-card">
                            @foreach($blogs as $blog)
                                <div class="blog-list-card">
                                    <div class="blog-img">
                                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                                    </div>
                                    <div class="blog-content">
                                        <div class="date-and-author">
                                            <p>{{ $blog->created_at->translatedFormat('d F Y') }}</p>
                                            <p>{{ __('Kategori') }}: @foreach($blogCategories as $blogCategory) {{ $blogCategory->name }} @endforeach</p>
                                        </div>
                                        <div class="blog-text">
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name}}</a>
                                            <p class="font-style-italic">{!! $blog->description !!}</p>
                                        </div>
                                        <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ __('İncele') }} <img src="/theme19/icons/long-arrow-blue.svg" alt="long-arrow" /></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="right-side-blog-info">
                            <div class="categories">
                                <div class="categories-content">
                                    <h4>{{ __('Kategoriler') }}</h4>
                                    <div class="categories-list">
                                        @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                            <label>
                                                {{ $blogCategory->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="latest-post">
                                <div class="latest-post-content">
                                    <h4>{{ __('Son Bloglar') }}</h4>
                                    @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                        <div class="latest-post-card">
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">
                                                <div class="latest-img">
                                                    <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                                </div>
                                                <div class="latest-content">
                                                    <div class="date-and-author">
                                                        <p>{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y')}}</p>
                                                    </div>
                                                    <h6>{{ $otherBlog->name }}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tag-container">
                                <div class="tag-content">
                                    <h4>{{ __('Etiketler') }}</h4>
                                    @foreach(explode(',',$blog->tags) as $tag)
                                        <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">#{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
