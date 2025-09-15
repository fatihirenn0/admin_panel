@extends('theme18.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ $blog->name }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ $blog->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog Details -->
    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="blog-details-item">
                        <div class="blog-details-img">
                            <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                            <h2>{{ $blog->name }}</h2>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $blog->created_at->translatedFormat('d F Y') }}
                                </li>
                                <li>
                                    <i class="icofont-tags"></i>
                                    @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                        <a href="#">{{ $categoryRelation->name }}</a>
                                    @endforeach @endif
                                </li>
                            </ul>
                            <p>{!! $blog->description !!}</p>
                        </div>
                        @php $previousBlog = \App\Models\Blog::where('id','<',$blog->id)->first(); $nextBlog = \App\Models\Blog::where('id','>',$blog->id)->first(); @endphp
                        <div class="blog-details-nav">
                            @if($previousBlog)
                                <div class="nav-prev">
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$previousBlog) }}">{{ __('Önceki') }}</a>
                                </div>
                            @endif @if($nextBlog)
                                <div class="nav-next">
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$nextBlog) }}">{{ __('Sonraki') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="blog-details-item">
                        <div class="blog-details-category">
                            <h3>{{ __('Kategoriler') }}</h3>
                            <ul>
                                @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blog_categories','index')) }}">
                                            {{ $categoryRelation->name }}
                                            <i class="icofont-arrow-right"></i>
                                        </a>
                                    </li>
                                @endforeach @endif
                            </ul>
                        </div>
                        <div class="blog-details-search">
                            <div class="search-area">
                                <input type="text" name="q" action="{{ route(getResourceFullLink('blogs','index')) }}" method="post" class="form-control" placeholder="{{__('Bloglarda Ara')}}" />
                                <button type="submit" class="btn blog-details-btn">
                                    <i class="icofont-search-2"></i>
                                </button>
                            </div>
                            <h3>{{ __('Son Bloglar') }}</h3>
                            <ul>
                                @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                    <li>
                                        <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                        <div class="blog-details-recent">
                                            <h4>
                                                <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <i class="icofont-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog-details-tags">
                            <h3>{{ __('Etiketler') }}</h3>
                            <ul>
                                @foreach(explode(',',$blog->tags) as $tag)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details -->
@endsection
