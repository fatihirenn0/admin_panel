@extends('theme12.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <div class="breadcumb-wrapper static-image" data-bg-src="/theme12/img/bg/breadcrumb-bg.jpg" data-overlay="title" data-opacity="8" alt="{{ __('Ekip Sayfası Görseli') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="space" id="team-sec" data-bg-src="/theme12/img/bg/team-2-shape-bg.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-9">
                    <div class="title-area text-center">
                        <span class="sub-title justify-content-center">{{ __('Her Alanda Uzman Avukat Kadromuz') }}</span>
                     </div>
                </div>
                <div></div>
            </div>
            <div class="row gy-4">
                @foreach($teams as $team)
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="team-card style-2">
                        <div class="team-img"><img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" /></div>
                        <div class="team-content">
                            <h3 class="box-title"><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h3>
                            <span class="team-desig">{{ $team->job }}</span>
                            <div class="team-social">
                                <div class="th-social">
                                    @if($team->facebook)
                                       <li><a href="{{ $team->facebook }}">
                                            <i class="fab fa-facebook-f"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                       </li>
                                    @endif
                                    @if($team->twitter)
                                        <li><a href="{{ $team->twitter }}">
                                                <i class="fab fa-twitter"></i>
                                                <span class="sr-only">Twitter</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($team->instagram)
                                        <li><a href="{{ $team->instagram }}">
                                                <i class="fab fa-instagram"></i>
                                                <span class="sr-only">İnstagram</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($team->youtube)
                                        <li><a href="{{ $team->youtube }}">
                                                <i class="fab fa-youtube"></i>
                                                <span class="sr-only">Youtube</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($team->github)
                                        <li> <a href="{{ $team->github }}">
                                                <i class="fab fa-github"></i>
                                                <span class="sr-only">Github</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($team->linkedin)
                                        <li><a href="{{ $team->linkedin }}">
                                                <i class="fab fa-linkedin"></i>
                                                <span class="sr-only">Linkedin</span>
                                            </a>
                                        </li>
                                    @endif
                                        @if($team->tiktok)
                                            <a href="{{ $team->tiktok }}">
                                                <i class="fab fa-tiktok"></i>
                                                <span class="sr-only">Tiktok</span>
                                            </a>

                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
