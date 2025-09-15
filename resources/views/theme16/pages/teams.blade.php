@extends('theme16.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')

    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li class="active">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="team team_inner service_bg">
        <div class="service_another_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="heading_common heading_primary_color" data-aos="fade-up">
                            <h5>{{ __('Ekibimiz') }}</h5>
                            <h3>{{ __('Her Alanda Uzman Avukat Kadromuz') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                        <div class="col-lg-4">
                            <div class="team_block">
                                <div class="team_image">
                                    <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" />
                                </div>
                                <div class="team_content">
                                    <h4><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h4>
                                    <h6>{{ $team->job }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
