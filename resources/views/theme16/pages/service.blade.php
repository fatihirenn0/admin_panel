@extends('theme16.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')

    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ $service->name }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li class="active">{{ $service->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="blog_inner practice_area_inner">
        <div class="container">
            <div class="blog_details">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog_details_inner">
                            <div class="post_content">
                                <div class="col-lg-12 col-sm-6">
                                    <div class="anim_box" data-aos="overlay-right">
                                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                    </div>
                                </div>

                                <div class="post_header">
                                    <h3 class="post_title">{{ $service->name }}</h3>
                                </div>
                                <div class="fulltext">
                                    <p>{!! $service->long_description !!}</p>
                                    <div class="post_gallery">
                                        <div class="row">
                                            @foreach($serviceImages as $serviceImage)
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="anim_box" data-aos="overlay-right">
                                                        <img src="/storage/{{ $serviceImage->image_url }}" alt="{{ $service->name }}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @php $previousService = \App\Models\Service::where('id','<',$service->id)->first(); $nextService = \App\Models\Service::where('id','>',$service->id)->first(); @endphp
                                <div class="inner_posts">
                                    @if($previousService)
                                        <div class="inner-post prev_post">
                                            <i class="ion-ios-arrow-left"></i>
                                            <div class="post_block">
                                                <a class="link_to" href="{{ route(getResourceFullLink('services','show'),$previousService) }}">{{ __('Önceki Hizmet') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="inner-post">
                                        ......
                                    </div>
                                    @if($nextService)
                                        <div class="inner-post prev_post">
                                            <i class="ion-ios-arrow-right"></i>
                                            <div class="post_block">
                                                <a class="link_to" href="{{ route(getResourceFullLink('services','show'),$nextService) }}">{{ __('Sonraki Hizmet') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar">
                            <div class="project_info">
                                <div class="project_info_bg">
                                    <div class="project_info_header">
                                        <h4 class="widget_title">{{ __('Kategoriler') }}</h4>
                                    </div>
                                    <div class="sidenav">
                                        <ul class="side_menu">
                                            @foreach($serviceCategories as $serviceCategory)
                                                <li class="menu-item {{ $loop->first ? 'active' : '' }}">
                                                    <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}"> <i class="ion-ios-arrow-right"></i>{{ $serviceCategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                -
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
