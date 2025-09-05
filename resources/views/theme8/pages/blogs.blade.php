@extends('theme8.pages.build')
@if(isset($blogCategory))
    @section('title',$blogCategory->name)
    @section('meta_keywords',$blogCategory->meta_keywords)
    @section('meta_description',$blogCategory->meta_description)
@else
    @section('title',__('Bloglar'))
@endif
@section('content')
    <!-- Blog -->
    <div class="mcgill-blog">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">{{ __('Adaletin Kaleminden') }}</span>
                    <h2 class="mcgill-heading">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    @foreach($blogs as $blog)
                        <div class="blog-entry">
                        <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="blog-img"><img src="/storage/{{ $blog->image }}" class="img-fluid" alt=""></a>
                        <div class="desc">
                            <span>
                                 @if($blog->categories)
                                    @foreach($blog->categories as $categoryRelation)
                                <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $categoryRelation->name }}</a>
                                    @endforeach
                                @endif
                                — {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F Y') }}
                            </span>
                            <h3><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ $blog->name }}</a></h3>
                            <p>{!! $blog->description !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Sidebar -->
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <div class="mcgill-sidebar-part">
                        <div class="mcgill-sidebar-block mcgill-sidebar-block-search">
                            <form action="{{ route(getResourceFullLink('blogs','index')) }}" class="mcgill-sidebar-search-form" method="get">
                                <input type="text" name="name" class="form-control search-field" id="search" placeholder="{{__('Bloglarda Ara...')}}">
                                <button type="submit" class="fa fa-search mcgill-sidebar-search-submit"></button>
                            </form>
                        </div>
                        <div class="mcgill-sidebar-block mcgill-sidebar-block-categories">
                            <div class="mcgill-sidebar-block-title"> {{ __('Kategoriler') }} </div>
                            <div class="mcgill-sidebar-block-content">
                                <ul class="ul1">
                                    @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                    <li><a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">{{ $blogCategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="mcgill-sidebar-block mcgill-sidebar-block-latest-posts">
                            <div class="mcgill-sidebar-block-title"> {{ __('Son Bloglar') }} </div>
                            <div class="mcgill-sidebar-block-content">
                                <div class="latest">
                                    @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                    <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">
                                        <div class="txt1">{{ $otherBlog->name }}</div>
                                        <div class="txt2">{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}</div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mcgill-sidebar-block mcgill-sidebar-block-tags">
                            <div class="mcgill-sidebar-block-title"> {{ __('Etiketler') }} </div>
                            <div class="mcgill-sidebar-block-content">
                                <ul class="tags clearfix">
                                    @foreach(explode(',',$blog->tags) as $tag)
                                    <li><a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
