@extends('theme10.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url(/theme10/images/background/4.jpg)">
        <div class="container">
            <div class="content">
                <h1>About Us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>About us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">

            <!-- Sec Title -->
            <div class="section-title light">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="title">Our Team</div>
                        <h3>We feel very proud for our <br> great <span>achievement</span></h3>
                    </div>
                    <div class="pull-right">
                        <div class="text">Aenean tincidunt id mauris idology auctor. Donec at ligula lacus. Nulla dig nissimmi quis neque interdum. An Ohio man allegedly punched his lawyer in the face in court Tuesday upon finding out he was sentenced.</div>
                    </div>
                </div>
            </div>

            <div class="clearfix">
                @foreach($teams as $team)
                <!-- Team Block -->
                        <div class="team-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="{{ route(getResourceFullLink('teams','show'),$team) }}"><img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" /></a>
                        </div>
                        <div class="lower-content">
                            <h3><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h3>
                            <div class="designation">{{ $team->job }}</div>
                            <div class="overlay-box">
                                <div class="overlay-content">
                                    <div class="title">{{ __('Sosyal Medya') }}</div>
                                    <ul class="social-icons">
                                        @if($team->facebook)
                                            <a class="text-white" href="{{ $team->facebook }}">
                                                <i class="fa fa-facebook-f"></i>
                                                <span class="sr-only">Facebook</span>
                                            </a>
                                        @endif
                                        @if($team->twitter)
                                            <li><a href="{{ $team->twitter }}">
                                                <i class="fa fa-twitter"></i>
                                                <span class="sr-only">Twitter</span>
                                            </a></li>
                                        @endif
                                        @if($team->instagram)
                                           <li><a href="{{ $team->instagram }}">
                                                <i class="fa fa-instagram"></i>
                                                <span class="sr-only">İnstagram</span>
                                            </a></li>
                                        @endif
                                        @if($team->youtube)
                                        <li><a href="{{ $team->youtube }}">
                                                <i class="fa fa-youtube"></i>
                                                <span class="sr-only">Youtube</span>
                                            </a></li>
                                        @endif
                                        @if($team->github)
                                        <li> <a href="{{ $team->github }}">
                                                <i class="fa fa-github"></i>
                                                <span class="sr-only">Github</span>
                                            </a></li>
                                        @endif
                                        @if($team->linkedin)
                                        <li><a href="{{ $team->linkedin }}">
                                                <i class="fa fa-linkedin"></i>
                                                <span class="sr-only">Linkedin</span>
                                            </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Team Section -->
@endsection
