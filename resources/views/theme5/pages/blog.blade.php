@extends('theme5.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')

    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{ __('Blog Detay Sayfası Görseli') }}">
        <div class="divider"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="breadcrumb-content">
                        <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ $blog->name }}</h2>
                        <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                            <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li>{{ $blog->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Blog Wrapper -->
    <div class="blog-page-section bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-4 g-xl-5">
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- Blog Title -->
                    <div class="single-blog">
                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}" />

                        <div class="blog-meta gap-4 d-flex flex-wrap align-items-center py-4 border-bottom mb-4">
                            @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                <a href="#">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M8.5 3H11.5118C12.2455 3 12.6124 3 12.9577 3.08289C13.2638 3.15638 13.5564 3.27759 13.8249 3.44208C14.1276 3.6276 14.387 3.88703 14.9059 4.40589L20.5 10M7.5498 10.0498H7.5598M9.51178 6H8.3C6.61984 6 5.77976 6 5.13803 6.32698C4.57354 6.6146 4.1146 7.07354 3.82698 7.63803C3.5 8.27976 3.5 9.11984 3.5 10.8V12.0118C3.5 12.7455 3.5 13.1124 3.58289 13.4577C3.65638 13.7638 3.77759 14.0564 3.94208 14.3249C4.1276 14.6276 4.38703 14.887 4.90589 15.4059L8.10589 18.6059C9.29394 19.7939 9.88796 20.388 10.5729 20.6105C11.1755 20.8063 11.8245 20.8063 12.4271 20.6105C13.112 20.388 13.7061 19.7939 14.8941 18.6059L16.1059 17.3941C17.2939 16.2061 17.888 15.612 18.1105 14.9271C18.3063 14.3245 18.3063 13.6755 18.1105 13.0729C17.888 12.388 17.2939 11.7939 16.1059 10.6059L12.9059 7.40589C12.387 6.88703 12.1276 6.6276 11.8249 6.44208C11.5564 6.27759 11.2638 6.15638 10.9577 6.08289C10.6124 6 10.2455 6 9.51178 6ZM8.0498 10.0498C8.0498 10.3259 7.82595 10.5498 7.5498 10.5498C7.27366 10.5498 7.0498 10.3259 7.0498 10.0498C7.0498 9.77366 7.27366 9.5498 7.5498 9.5498C7.82595 9.5498 8.0498 9.77366 8.0498 10.0498Z"
                                                stroke="#e8bf96"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></path>
                                        </g>
                                    </svg>
                                    {{ $categoryRelation->name }}
                                </a>
                            @endforeach @endif
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 20 20" fill="none">
                                    <g clip-path="url(#clip0_1_7058)">
                                        <mask id="mask0_1_7058" style="mask-type: luminance;" maskunits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                            <path d="M0 1.90735e-06H20V20H0V1.90735e-06Z" fill="white"></path>
                                        </mask>
                                        <g mask="url(#mask0_1_7058)">
                                            <path
                                                d="M15.4297 1.75781H2.14844C1.28551 1.75781 0.585938 2.45738 0.585938 3.32031V5.66406H16.9922V3.32031C16.9922 2.45738 16.2927 1.75781 15.4297 1.75781Z"
                                                stroke="#E8BF96"
                                                stroke-width="1.20443"
                                                stroke-miterlimit="10"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></path>
                                            <path d="M3.86719 2.92969V0.585938" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M13.7109 2.92969V0.585938" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M10.4297 2.92969V0.585938" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.14844 2.92969V0.585938" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M10.0391 8.30078H11.0156" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.5625 8.30078H7.53906" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M13.5156 8.30078H14.4922" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M3.08594 10.9375H4.0625" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.5625 10.9375H7.53906" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M10.0391 10.9375H11.0156" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M3.08594 13.5742H4.0625" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.5625 13.5742H7.53906" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.4141 15.1172C19.4141 17.4903 17.4903 19.4141 15.1172 19.4141C12.7441 19.4141 10.8203 17.4903 10.8203 15.1172C10.8203 12.7441 12.7441 10.8203 15.1172 10.8203C17.4903 10.8203 19.4141 12.7441 19.4141 15.1172Z" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.1172 13.1641V15.1172H17.0703" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16.9922 11.25V5.66406H0.585938V15.0391C0.585938 15.6863 1.11062 16.2109 1.75781 16.2109H10.961" stroke="#E8BF96" stroke-width="1.20443" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                                    <defs>
                                        <clippath id="clip0_1_7058">
                                            <rect width="20" height="20" fill="white"></rect>
                                        </clippath>
                                    </defs>
                                </svg>
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}
                            </a>
                        </div>
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-details-content">
                        <p>{!! $blog->description !!}</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-6">
                                @foreach($blogImages as $blogImage)
                                <img src="/storage/{{ $blogImage->image_url }}" alt="{{ $blog->name }}">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Tags Section -->
                    <ul class="tag-list style-two list-unstyled mt-5">
                        @foreach(explode(',',$blog->tags) as $tag)
                            <li><a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="d-flex flex-column gap-5">
                        <!-- Widget -->
                        <div class="blog-widget">
                            <div class="h4 mb-4">{{__('Bloglarda Ara')}}</div>
                            <!-- Form -->
                            <form action="{{ route(getResourceFullLink('blogs','index')) }}">
                                <input name="q" type="search" placeholder="{{__('Bloglarda Ara')}}" class="form-control" />
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 21L15 15M3 10C3 10.9193 3.18106 11.8295 3.53284 12.6788C3.88463 13.5281 4.40024 14.2997 5.05025 14.9497C5.70026 15.5998 6.47194 16.1154 7.32122 16.4672C8.1705 16.8189 9.08075 17 10 17C10.9193 17 11.8295 16.8189 12.6788 16.4672C13.5281 16.1154 14.2997 15.5998 14.9497 14.9497C15.5998 14.2997 16.1154 13.5281 16.4672 12.6788C16.8189 11.8295 17 10.9193 17 10C17 9.08075 16.8189 8.1705 16.4672 7.32122C16.1154 6.47194 15.5998 5.70026 14.9497 5.05025C14.2997 4.40024 13.5281 3.88463 12.6788 3.53284C11.8295 3.18106 10.9193 3 10 3C9.08075 3 8.1705 3.18106 7.32122 3.53284C6.47194 3.88463 5.70026 4.40024 5.05025 5.05025C4.40024 5.70026 3.88463 6.47194 3.53284 7.32122C3.18106 8.1705 3 9.08075 3 10Z"
                                            stroke="#1C1D20"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Widget -->
                        <div class="blog-widget">
                            <div class="h4 mb-4">{{ __('Kategoriler') }}</div>

                            <ul class="blog-list style-two">
                                @foreach(\App\Models\BlogCategory::orderBy('rank')->get() as $blogCategory)
                                    <li>
                                        <a href="{{ route(getResourceFullLink('blog_categories','show'),$blogCategory) }}">
                                            {{ $blogCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Widget -->
                        <div class="blog-widget">
                            <div class="h4 mb-4">{{ __('Son Bloglar') }}</div>

                            <div class="d-flex flex-column gap-4">
                                @foreach(\App\Models\Blog::where('id','!=',$blog->id)->inRandomOrder()->take(3)->get() as $otherBlog)
                                    <!-- Widget Blog Post -->
                                    <div class="widget-blog-post">
                                        <div class="blog-thumbnail">
                                            <img src="/storage/{{ $otherBlog->image }}" alt="{{ $otherBlog->name }}" />
                                        </div>
                                        @if($blog->categories) @foreach($blog->categories as $categoryRelation)
                                            <div class="blog-content">
                                                <a href="{{ route(getResourceFullLink('blogs','show'),$otherBlog) }}">{{ $otherBlog->name }}</a>
                                                <p class="mb-0">{{ \Carbon\Carbon::parse($otherBlog->created_at)->translatedFormat('d F Y') }}</p>
                                            </div>
                                        @endforeach @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Widget -->
                        <div class="blog-widget">
                            <div class="h4 mb-4">{{ __('Etiketler') }}</div>

                            <ul class="tag-list list-unstyled">
                                @foreach(explode(',',$blog->tags) as $tag)
                                    <li><a href="{{ route(getResourceFullLink('blogs','index')) }}?q={{ $tag }}">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
    </div>
@endsection
