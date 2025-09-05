@extends('theme7.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner container">
                            <h1 class="pbmit-tbar-title">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('site.index') }}" class="home"><span>{{ __('Anasayfa') }}</span></a>
                        </span>
                            <span class="sep"><i class="pbmit-base-icon-angle-double-right"></i></span>
                            <span><span class="post-root post post-post current-item">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End-->

    <!-- Portfolio Style 1 -->
    <section class="section-lg pbmit-element-portfolio-style-2">
        <div class="container" data-cursor-text="View">
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-6">
                        <article class="pbmit-portfolio-style-2 business pbmit-odd">
                            <div class="pbminfotech-post-content">
                                <div class="pbmit-image-wrapper">
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="/storage/{{ $team->image }}" class="img-fuild" alt="{{ $team->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="pbminfotech-box-content">
                                    <div class="pbminfotech-titlebox">
                                        <h3 class="pbmit-portfolio-title">
                                            <a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a>
                                        </h3>
                                        @foreach($teamCategories as $teamCategory)
                                            <div class="pbmit-port-cat">
                                                <a href="{{ route(getResourceFullLink('team_categories','show'),$teamCategory) }}" rel="tag">{{ $teamCategory->name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Portfolio Style 1 End -->
@endsection
