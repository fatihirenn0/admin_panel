@extends('theme5.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{ __('Ekip Detay Sayfası Görseli') }}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ $team->name }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ $team->name }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Team Member Details -->
    <div class="team-member-details bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-md-6">
                    <div class="team-details-img pe-xl-5">
                        <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="team-details-content">
                        <h2 class="team-member-title mb-2">{{ $team->name }}</h2>
                        <p class="h4 mb-4 text-primary">{{ $team->job }}</p>
                        <p class="mb-4">{!! $team->description !!}</p>

                        <div class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 20 20" fill="none">
                                <path d="M16.625 17.5C14.8889 17.5 13.1701 17.125 11.4688 16.375C9.76736 15.625 8.22222 14.5556 6.83333 13.1667C5.44444 11.7778 4.375 10.2361 3.625 8.54167C2.875 6.84722 2.5 5.125 2.5 3.375V2.5H7.41667L8.1875 6.6875L5.8125 9.08333C6.11806 9.625 6.45833 10.1389 6.83333 10.625C7.20833 11.1111 7.61111 11.5625 8.04167 11.9792C8.44444 12.3819 8.88542 12.7674 9.36458 13.1354C9.84375 13.5035 10.3611 13.8472 10.9167 14.1667L13.3333 11.75L17.5 12.6042V17.5H16.625Z" fill="#1C1D20"></path>
                            </svg>
                            {{ $team->telephone }}
                        </div>
                        <div class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 20 20" fill="none">
                                <path d="M1.66797 16.6693V3.33594H18.3346V16.6693H1.66797ZM10.0013 10.8359L16.668 6.66927V5.0026L10.0013 9.16927L3.33464 5.0026V6.66927L10.0013 10.8359Z" fill="#1C1D20"></path>
                            </svg> {{ $team->email }}
                        </div>

                        <!-- Social Nav -->
                        <div class="social-nav mb-4">
                            @if($team->facebook)
                                <a class="text-white" href="{{ $team->facebook }}">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            @endif
                            @if($team->twitter)
                                <a href="{{ $team->twitter }}">
                                    <i class="ti ti-brand-x"></i>
                                </a>
                            @endif
                            @if($team->instagram)
                                <a href="{{ $team->instagram }}">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            @endif
                            @if($team->youtube)
                                <a href="{{ $team->youtube }}">
                                    <i class="ti ti-brand-youtube"></i>
                                </a>
                            @endif
                            @if($team->tiktok)
                                <a href="{{ $team->tiktok }}">
                                    <i class="ti ti-brand-tiktok"></i>
                                </a>
                            @endif
                            @if($team->github)
                                <a href="{{ $team->github }}">
                                    <i class="ti ti-brand-github"></i>
                                </a>
                            @endif
                            @if($team->linkedin)
                                <a href="{{ $team->linkedin }}">
                                    <i class="ti ti-brand-linkedin"></i>
                                </a>
                            @endif
                        </div>

                        <div class="h4 mb-3">{{ __('Eğitim Bilgileri') }}</div>
                        <p>{{ $team->education }}</p>


                        <div class="mb-5"></div>

                        <div class="h4 mb-3">{{ __('İş Tecrübesi') }}</div>
                        <p>{{ $team->work_experience }}</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>
    </div>
@endsection
