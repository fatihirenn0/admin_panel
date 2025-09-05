@extends('theme4.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')

    <section class="page-header">
    <div class="page-header__bg"></div>
    <!-- /.page-header__bg -->
    <!-- <div class="page-header__shape"></div> -->
    <!-- /.page-header__shape -->
    <div class="container">
        <h2 class="page-header__title bw-split-in-right">{{ $team->name }}</h2>
        <ul class="procounsel-breadcrumb list-unstyled">
            <li><a href="{{ route('site.index') }}">{{__('Ana Sayfa')}}</a></li>
            <li><span></span>{{ $team->name }}</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="team-details">
    <div class="container">
        <div class="row gutter-y-60">
            <div class="col-lg-6">
                <div class="team-details__image wow fadeInLeft" data-wow-delay="100ms">
                    <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                </div><!-- /.team-details__image -->
            </div><!-- /.col-lg-5 -->
            <div class="col-lg-6">
                <div class="team-details__content wow fadeInUp" data-wow-delay="200ms">
                    <div class="team-details__designation">{{ $team->job }}</div>
                    <!-- /.team-details__designation -->
                    <h3 class="team-details__title">{{ $team->name }}</h3><!-- /.team-details__title -->
                    <p class="team-details__text">
                        {!! $team->description !!}
                    </p><!-- /.team-details__text -->
                    <ul class="list-unstyled team-details__list">
                        <li>
                            <div class="team-details__list__icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <h4 class="team-details__list__title">{{__('E-Posta Adresi')}}:</h4>
                            <a href="mailto:{{ $team->email }}">{{ $team->email }}</a>
                        </li>
                        <li>
                            <div class="team-details__list__icon">
                                <i class="icon-telephone-call-11"></i>
                            </div>
                            <h4 class="team-details__list__title">{{__('Telefon')}}: </h4>

                            <a href="tel:{{ $team->email }}">{{ $team->telephone }}</a>
                        </li>
                    </ul><!-- /.list-unstyled team-details__list -->
                    <div class="team-details__social">
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
                    </div><!-- /.team-details__social -->
                </div><!-- /.team-details__content -->
            </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.team-details -->
<section class="team-certificates">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="team-certificates__title">{{ __('Eğitim') }}</h2>
                <p class="team-certificates__text">
                    {{ $team->education }}
                </p>
            </div>
            <div class="col-lg-6">
                <div class="team-certificates__img">
                    <img class="static-image" src="/theme4/images/resources/certificates-1.jpg" alt="{{__('Ekip Detay Sayfası Eğitim Sertifika Görseli')}}">
                    <img class="static-image" src="/theme4/images/resources/certificates-2.jpg" alt="{{__('Ekip Detay Sayfası Eğitim Sertifika Görseli')}}">
                    <img class="static-image" src="/theme4/images/resources/certificates-3.jpg" alt="{{__('Ekip Detay Sayfası Eğitim Sertifika Görseli')}}">
                </div>
            </div>
            <div class="col-lg-12">
                <h2 class="team-certificates__title">{{ __('İş Tecrübesi') }}</h2>
                <p class="team-certificates__text">
                    {{ $team->work_experience }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
