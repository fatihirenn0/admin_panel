@extends('theme7.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords
) @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Anasayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            <span><span class="post-root post post-post current-item">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->
    <!-- Blog Classic  -->
    <section class="section-lgx">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 blog-right-col">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($services as $service)
                                <article class="post blog-classic">
                                    <div class="post-thumbnail">
                                        <div class="pbmit-featured-container">
                                            <div class="pbmit-featured-wrapper">
                                                <img src="/storage/{{ $service->image }}" class="img-fluid w-100" alt="{{ $service->name }}" />
                                            </div>
                                            <div class="pbmit-meta-date-wrapper">
                                        <span class="pbmit-meta pbmit-date">
                                            <a href="{{ route(getResourceFullLink('services','show'), $service) }}" rel="bookmark">{{ \Carbon\Carbon::parse($service->created_at)->translatedFormat('d F Y') }}</a>
                                        </span>
                                                @if($service->categories) @foreach($service->categories as $categoryRelation)
                                                    <span class="pbmit-meta pbmit-meta-line">
                                            <a href="{{ route(getResourceFullLink('services','show'), $service) }}" rel="category tag">{{ $categoryRelation->name }}</a>
                                        </span>
                                                @endforeach @endif
                                            </div>
                                            <h3 class="pbmit-post-title">
                                                <a href="{{ route(getResourceFullLink('services','show'), $service) }}"> {{ $service->name }}</a>
                                            </h3>
                                            <div class="pbmit-entry-content">
                                                {!! $service->short_description !!}
                                                <div class="pbmit-read-more-link">
                                                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="pbmit-btn pbmit-btn-inline">
                                                        <span>{{ __('İncele') }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 blog-left-col">
                    <aside class="sidebar">
                        <aside class="widget widget-search">
                            <h2 class="widget-title">{{__('Hizmetlerde Ara')}}</h2>
                            <form class="search-form" action="{{ route(getResourceFullLink('services','index')) }}">
                                <input name="q" type="search" class="search-field" placeholder="{{__('Hizmetlerde Ara')}}" value="" />
                                <button
                                    type="submit"
                                    style="
                                    position: absolute;
                                    right: 0px;
                                    padding: 0;
                                    border: none;
                                    outline: none;
                                    background-color: transparent;
                                    top: 34%;
                                    height: 50px;
                                    margin-top: -6px;
                                    font-size: 20px;
                                    z-index: 1;
                                    width: 45px;
                                    text-align: center;
                                    color: #232e35;
                                "
                                >
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </aside>
                        <aside class="widget widget-categories">
                            <h2 class="widget-title">{{ __('Kategoriler') }}</h2>
                            <ul>
                                @foreach(\App\Models\ServiceCategory::orderBy('rank')->get() as $serviceCategory)
                                    <li><a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">{{ $serviceCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="widget widget-recent-post">
                            <h2 class="widget-title">{{ __('Son Hizmetler') }}</h2>
                            <ul class="recent-post-list">
                                @foreach(\App\Models\Service::where('id','!=',$service->id)->inRandomOrder()->take(3)->get() as $otherService)
                                    <li class="recent-post-list-li">
                                        <a class="recent-post-thum" href="#">
                                            <img src="/storage/{{ $otherService->image }}" class="img-fluid" alt="{{ $otherService->name }}" />
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ route(getResourceFullLink('services','show'),$otherService) }}">{{ $otherService->name }}</a>
                                            <span class="post-date">{{ \Carbon\Carbon::parse($otherService->created_at)->translatedFormat('d F Y') }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="widget widget-tag-cloud">
                            <h3 class="widget-title">{{ __('Etiketler') }}</h3>
                            <div class="tagcloud">
                                @foreach(explode(',',$service->tags) as $tag)
                                    <a href="{{ route(getResourceFullLink('services','index')) }}?q={{ $tag }}" class="tag-cloud-link">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </aside>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Classic  End -->
@endsection
