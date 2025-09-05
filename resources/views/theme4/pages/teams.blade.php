@extends('theme4.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
@section('title',__('Ekibimiz'))
@endif
@section('content')
<section class="page-header">
    <div class="page-header__bg"></div>
    <!-- /.page-header__bg -->
    <!-- <div class="page-header__shape"></div> -->
    <!-- /.page-header__shape -->
    <div class="container">
        <h2 class="page-header__title bw-split-in-right">{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h2>
        <ul class="procounsel-breadcrumb list-unstyled">
            <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
            <li><span>{{ __('Ekibimiz') }}</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->
<section class="team-one">
    <div class="container">
        <div class="row gutter-y-30">
            @foreach($teams as $team)
                <div class="col-lg-4 col-md-6">
                <div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>

                    <div class="team-card__image bw-img-anim-left">
                        <div class="team-card__content">
                            <h3 class="team-card__title">
                                <a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a>
                            </h3><!-- /.team-card__title -->
                            <p class="team-card__designation">{{ $team->job }}</p><!-- /.team-card__designation -->

                        </div><!-- /.team-card__content -->
                        <div class="team-card__hover">
                            <span class="team-card__hover__btn"><i class="icon-plus"></i></span>
                            <div class="team-card__hover__social">
                                @if($team->facebook)
                                    <a class="text-white" href="{{ $team->facebook }}">
                                        <i class="fab fa-facebook-f"></i>
                                        <span class="sr-only">Facebook</span>
                                    </a>
                                @endif
                                @if($team->twitter)
                                    <a href="{{ $team->twitter }}">
                                        <i class="fab fa-twitter"></i>
                                        <span class="sr-only">Twitter</span>
                                    </a>
                                @endif
                                @if($team->instagram)
                                    <a href="{{ $team->instagram }}">
                                        <i class="fab fa-instagram"></i>
                                        <span class="sr-only">İnstagram</span>
                                    </a>
                                @endif
                                @if($team->youtube)
                                    <a href="{{ $team->youtube }}">
                                        <i class="fab fa-youtube"></i>
                                        <span class="sr-only">Youtube</span>
                                    </a>
                                @endif
                                    @if($team->tiktok)
                                        <a href="{{ $team->tiktok }}">
                                            <i class="fab fa-tiktok"></i>
                                            <span class="sr-only">Tiktok</span>
                                        </a>
                                    @endif
                                    @if($team->github)
                                        <a href="{{ $team->github }}">
                                            <i class="fab fa-github"></i>
                                            <span class="sr-only">Github</span>
                                        </a>
                                    @endif
                                    @if($team->linkedin)
                                        <a href="{{ $team->linkedin }}">
                                            <i class="fab fa-linkedin"></i>
                                            <span class="sr-only">Linkedin</span>
                                        </a>
                                    @endif
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__hover -->
                        <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                    </div><!-- /.team-card__image -->
                </div><!-- /.team-card -->
            </div><!-- /.col-lg-4 col-md-6 -->
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.team-two -->
@endsection
