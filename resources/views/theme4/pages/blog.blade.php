@extends('theme4.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <!-- <div class="page-header__shape"></div> -->
        <!-- /.page-header__shape -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-right">{{ $blog->name }}</h2>
            <ul class="procounsel-breadcrumb list-unstyled">
                <li><a href="{{ route('site.index') }}"> {{ __('Ana Sayfa') }}</a></li>
                <li><span>{{ $blog->name }}</span></li>
            </ul>
            <!-- /.thm-breadcrumb list-unstyled -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-header -->

    <section class="blog-details">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-8">
                    <div class="blog-details__wrapper">
                        <div class="blog-details__image">
                            <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />
                            <div class="blog-details__date">
                                <h4>{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</h4>
                                <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('F') }}</span>
                            </div>
                            <!-- /.blog-details__date -->
                        </div>
                        <!-- blog-details__image -->
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                    <li>
                                        <i class="fa fa-tags"></i>
                                        {{ $categoryRelation->name }}
                                    </li>
                                @endforeach @endif
                            </ul>
                            <!-- /.list-unstyled blog-details__meta -->
                            <h3 class="blog-details__title">{{ $blog->name }}</h3>
                            <!-- /.blog-details__title -->
                            <p class="blog-details__text">
                                {!! $blog->description !!}
                            </p>
                            <!-- /.blog-details__text -->

                            <div class="blog-details__post-meta">
                                <!-- /.blog-details__tags -->
                                <div class="blog-details__tags">
                                    <h4 class="blog-details__tags__title">{{ __('Etiketler') }}:</h4>
                                    <!-- /.blog-details__tags__title -->
                                    <div class="sidebar__tags">
                                        @foreach(explode(',',$blog->tags) as $tag)
                                            <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                        @endforeach
                                    </div>
                                    <!-- /.sidebar__projects -->
                                </div>
                                <!-- /.blog-details__tags -->
                            </div>
                            <!-- /.blog-details__post-meta -->
                        </div>
                    </div>
                    <!-- /.blog-details -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget-area">
                            <div class="sidebar__single sidebar__single__search">
                                <form action="{{ route(getResourceFullLink('blogs','index')) }}" class="sidebar__search">
                                    <input name="q" type="search" placeholder="{{__('Bloglarda Ara')}}" />
                                    <button type="submit"><i class="icon-search"></i></button>
                                </form>
                                <!-- /.sidebar__search -->
                            </div>
                            <!-- /.sidebar__single -->
                            <div class="sidebar__single">
                                <h4 class="sidebar__title">
                                    {{ __('Son Bloglar') }}
                                </h4>
                                <!-- /.sidebar__title -->
                                <ul class="sidebar__posts list-unstyled">
                                    @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                        <li class="sidebar__posts__item">
                                            <div class="sidebar__posts__image">
                                                <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                            </div>
                                            <!-- /.sidebar__posts__image -->
                                            @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                                <div class="sidebar__posts__content">
                                                    <p class="sidebar__posts__meta">
                                                        <i class="fa fa-tags"></i>
                                                        {{ $categoryRelation->name }}
                                                    </p>
                                                    <!-- /.sidebar__posts__date -->
                                                    <h4 class="sidebar__posts__title">
                                                        <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">
                                                            {{ $otherBlog->name }}
                                                        </a>
                                                    </h4>
                                                    <!-- /.sidebar__posts__title -->
                                                </div>
                                                <!-- /.sidebar__posts__content -->
                                            @endforeach @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.sidebar__posts list-unstyled -->
                            </div>
                            <!-- /.sidebar__single -->
                            <div class="sidebar__single">
                                <h4 class="sidebar__title">{{ __('Kategoriler') }}</h4>
                                <!-- /.sidebar__title -->
                                <ul class="sidebar__categories list-unstyled">
                                    @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}"> <i class="icon-arrow-right"></i>{{ $blogCategory->name }}<span class="icon-right-arrow"></span> </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.sidebar__categories list-unstyled -->
                            </div>
                            <!-- /.sidebar__single -->
                            @foreach(explode(',',$blog->tags) as $tag)
                                <div class="sidebar__single">
                                    <h4 class="sidebar__title">{{ __('Etiketler') }}</h4>
                                    <!-- /.sidebar__title -->
                                    <div class="sidebar__tags">
                                        <a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a>
                                    </div>
                                    <!-- /.sidebar__tags -->
                                </div>
                                <!-- /.sidebar__single -->
                            @endforeach
                        </aside>
                        <!-- /.widget-area -->
                    </div>
                    <!-- /.sidebar -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.blog-details -->

@endsection
