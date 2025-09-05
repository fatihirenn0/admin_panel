@extends('theme6.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img class="static-image" src="/theme6/img/bg/attorneys-breadcrumb-bg.jpg" alt="{{ __('Ekip Sayfası Görseli') }}" />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                            <li>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Attorneys Area -->
    <section class="attorneys-page-area">
        <div class="container">
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-4">
                        <div class="single-attorney">
                            <div class="sa-img">
                                <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" />
                            </div>
                            <div class="sa-info">
                                <h4><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Attorneys Area -->

@endsection
