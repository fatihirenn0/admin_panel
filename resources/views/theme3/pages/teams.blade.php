@extends('theme3.pages.build') @if(isset($teamCategory)) @section('title',$teamCategory->name) @section('meta_keywords',$teamCategory->meta_keywords) @section('meta_description',$teamCategory->meta_description) @else
    @section('title',__('Ekibimiz')) @endif @section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Ekip Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('Ekibimiz') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- Team Section Seven -->
    <section class="team-section pt-120 pb-80">
        <div class="auto-container">
            <div class="row">
                <!-- Team block -->
                @foreach($teams as $team)
                    <div class="team-block col-lg-4 col-sm-6">
                        <div class="inner-box">
                            <div class="image-box">
                                <img class="image-pattern" src="/storage/{{ $team->image }}" alt="{{ $team->name }}" />
                                <figure class="image">
                                    <a href="{{ route(getResourceFullLink('teams','show'),$team) }}"><img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" /></a>
                                </figure>
                            </div>
                            <div class="info-box">
                                <h4 class="name"><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h4>
                                <span class="designation">{{ $team->job }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team Section -->
@endsection
