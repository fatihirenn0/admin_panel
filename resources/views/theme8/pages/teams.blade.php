@extends('theme8.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Our Team -->
    <div class="mcgill-team back-gray team">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInLeft"> <span class="heading-meta">{{ __('Tecrübeli') }}</span>
                    <h2 class="mcgill-heading">{{ __('Ekibimiz') }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-4">
                    <div class="item">
                        <div class="img"><img src="/storage/{{ $team->image }}" alt=""></div>
                        <div class="info">
                            <h5>{{ $team->name }}</h5>
                            <h6>{{ $team->job }}</h6>
                            <div class="social valign">
                                <div class="full-width">
                                    @if($team->facebook)
                                        <a href="{{ $team->facebook }}">
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
                                    <p><b>{{ __('E-Posta') }}:</b> {{ $team->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
