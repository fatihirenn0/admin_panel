@extends('theme14.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Start main-content -->
    <section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('Projeler Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcrumb__wrp">
                <div class="breadcrumb__item">
                    <h1 class="title">{{ __('Projeler') }}</h1>
                    <ul>
                        <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                        <li><i class="fa-light fa-angle-right"></i></li>
                        <li>{{ __('Projeler') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Projects Start-->
    <section class="project-area pt-130 pb-130">
        <div class="project__wrp">
            <div class="swiper project__slider">
                <div class="swiper project__slider">
                    <div class="swiper-wrapper">
                        @foreach($projects as $i => $project)
                            @php $tabId = 'tab-'.($i+1); @endphp
                            <div class="swiper-slide" data-tab="{{ $tabId }}">
                                <a href="{{ route(getResourceFullLink('projects','show'),$project) }}" class="project__item">
                                    <div class="content">
                                        <span>{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</span>
                                        <h4>{{ $project->name }}</h4>
                                        <p>{!! $project->description !!}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="project__slider-arrys">
                <button class="project__arry-prev"><i class="fa-regular fa-arrow-left"></i></button>
                <button class="project__arry-next"><i class="fa-regular fa-arrow-right"></i></button>
            </div>
            <div class="project__image">
                @foreach($projects as $i => $project)
                    @php $tabId = 'tab-'.($i+1); @endphp
                    <img id="{{ $tabId }}" class="tab-img {{ $i===0 ? 'active' : '' }}" src="/storage/{{ $project->image }}"  alt="{{ $project->name }}">
                @endforeach
            </div>
        </div>
    </section>
    <!-- Projects End-->

@endsection
