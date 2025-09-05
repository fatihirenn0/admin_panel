@extends('theme4.pages.build') @if(isset($blogCategory))
@section('title',$blogCategory->name)
@section('meta_keywords',$blogCategory->meta_keywords)
@section('meta_description',$blogCategory->meta_description)
@else
@section('title',__('Bloglar'))
@endif
@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <!-- <div class="page-header__shape"></div> -->
        <!-- /.page-header__shape -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-right">{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</h2>
            <ul class="procounsel-breadcrumb list-unstyled">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li><span>{{ isset($blogCategory) ? $blogCategory->name : __('Bloglar') }}</span></li>
            </ul>
            <!-- /.thm-breadcrumb list-unstyled -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-header -->

    <section class="blog-three blog-grid-right">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-8">
                    <div class="row gutter-y-30">
                        @foreach($blogs as $blog)
                            <div class="col-md-6">
                                <div class="blog-card wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                    <div class="blog-card__content">
                                        <div class="blog-card__user">
                                            <i class="fa fa-tags"></i>
                                            <div class="blog-card__user__info">
                                                @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                                    <li>
                                                        <h3 class="blog-card__user__name">{{ $categoryRelation->name }}</h3>
                                                    </li>
                                                @endforeach @endif
                                            </div>
                                        </div>
                                        <h3 class="blog-card__title"><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{$blog->name}}</a></h3>
                                        <!-- /.blog-card__title -->
                                    </div>
                                    <!-- /.blog-card__content -->
                                    <div class="blog-card__image">
                                        <div class="blog-card__image__inner">
                                            <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }} " />
                                            <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }} " />
                                            <a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}" class="blog-card__image__link"><span class="sr-only">{{ $blog->name }} </span></a>
                                        </div>
                                        <div class="blog-card__date"><span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>{{ \Carbon\Carbon::parse($blog->created_at)->format('F') }}</div>
                                        <!-- /.blog-card__date -->
                                    </div>
                                    <!-- /.blog-card__image -->
                                    <ul class="list-unstyled blog-card__meta">
                                        <li><a href="{{ route(getResourceFullLink('blogs','show'),$blog) }}">{{ __('İncele') }}</a></li>
                                    </ul>
                                    <!-- /.list-unstyled blog-card__meta -->
                                </div>
                                <!-- /.blog-card -->
                            </div>
                            <!-- /.col-md-6 -->
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget-area">
                            <div class="sidebar__single">
                                <h4 class="sidebar__title">{{ __('Kategoriler') }}</h4>
                                <!-- /.sidebar__title -->
                                <ul class="sidebar__categories list-unstyled">
                                    @foreach($blogCategories as $blogCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}"><i class="icon-arrow-right"></i> {{ $blogCategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.sidebar__categories list-unstyled -->
                            </div>
                            <!-- /.sidebar__single -->
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
    <!-- /.blog-three -->
@endsection
