<section class="team-five-area pt-120">
    <div class="team-five__shape">
        <img class="animation__arryUpDown static-image" src="/theme1/images/shape/team-one-shape.png" alt="{{__('Ana Sayfa Ekibimiz Arkaplan Görseli')}}">
    </div>
    <div class="container">
        <div class="team-five__wrp">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="team-five__content">
                        <div class="section-header">
                            <h4 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ __('Ekibimiz') }}</h4>
                            <h2 class="wow splt-txt text-black mb-30" data-splitting>{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        @foreach($allTeams as $indexTeam)
                            <div class="col-sm-6 mt-30">
                                <div class="team-five__item have-margin">
                                    <div class="team-five__image">
                                        <img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}">
                                        <div class="share">
                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_249)">
                                                    <path d="M3.04491 5.32409C1.45712 5.32409 0.169906 4.13224 0.169906 2.66204C0.169907 1.19184 1.45712 -1.95075e-07 3.04491 -1.25671e-07C4.63275 -5.62639e-08 5.91992 1.19184 5.91992 2.66204C5.91992 4.13224 4.63275 5.32409 3.04491 5.32409Z" fill="white" />
                                                    <path d="M9.125 10.6481C7.53718 10.6481 6.24998 9.45632 6.24998 7.98614C6.24998 6.51592 7.53718 5.3241 9.125 5.3241C10.7128 5.3241 12 6.51592 12 7.98614C12 9.45632 10.7128 10.6481 9.125 10.6481Z" fill="white" />
                                                    <path d="M2.87499 15.8162C1.28715 15.8162 -1.63931e-05 14.6244 -1.63288e-05 13.1542C-1.62646e-05 11.684 1.28715 10.4922 2.87499 10.4922C4.46278 10.4922 5.75 11.684 5.75 13.1542C5.75 14.6244 4.46278 15.8162 2.87499 15.8162Z" fill="white" />
                                                    <path d="M5.74973 7.82898C5.74973 6.01253 3.61493 5.40182 2.79754 5.32355L5.83431 2.51172C5.91888 3.26857 6.64608 5.26089 8.87842 5.32355C9.01372 9.64542 8.9348 10.6737 8.87842 10.6476C6.51077 10.5224 5.80613 12.7287 5.74973 13.616L2.79754 10.491C3.61493 10.3605 5.74973 9.64542 5.74973 7.82898Z" fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath>
                                                        <rect width="16" height="12" fill="white" transform="translate(12) rotate(90)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <div class="socials">
                                                @if($indexTeam->facebook)
                                                    <a href="{{ $indexTeam->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                                                @endif
                                                @if($indexTeam->twitter)
                                                    <a href="{{ $indexTeam->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                                @endif
                                                @if($indexTeam->linkedin)
                                                    <a href="{{ $indexTeam->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                                @endif
                                                @if($indexTeam->instagram)
                                                    <a href="{{ $indexTeam->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                                @endif
                                                @if($indexTeam->tiktok)
                                                    <a href="{{ $indexTeam->tiktok }}"><i class="fa-brands fa-tiktok"></i></a>
                                                @endif
                                                @if($indexTeam->youtube)
                                                    <a href="{{ $indexTeam->youtube }}"><i class="fa-brands fa-youtube"></i></a>
                                                @endif
                                                @if($indexTeam->github)
                                                    <a href="{{ $indexTeam->github }}"><i class="fa-brands fa-github"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="mb-2"><a class="primary-hover" href="{{ route(getResourceFullLink('teams','show'),$indexTeam) }}">{{ $indexTeam->name }}</a></h4>
                                        <span>{{ $indexTeam->job }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
