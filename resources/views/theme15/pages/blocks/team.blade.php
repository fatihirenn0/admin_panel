<!-- Section: Team -->
<section class="bg-white-f5">
    <div class="container pt-90">
        <div class="section-title">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="text-center mb-60">
                        <div class="tm-sc tm-sc-section-title section-title section-title-style1 text-center bg-img-center bg-no-repeat line-bottom-style3-bordered-line">
                            <div class="title-wrapper">
                                <h2 class="title">{{ __('Ekibimiz') }}</h2>
                                <div class="title-seperator-line"></div>
                                <div class="paragraph">
                                    <p>{{ __('Alanında Uzman Takım Arkadaşlarımız') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                @foreach($allTeams as $indexTeam)
                    <div class="col-md-6 col-lg-4">
                        <div class="tm-sc tm-sc-staff staff-style5-current-theme mb-md-30">
                            <div class="tm-staff">
                                <div class="staff-inner">
                                    <div class="box-hover-effect">
                                        <div class="effect-wrapper">
                                            <div class="thumb">
                                                <img src="/storage/{{ $indexTeam->image }}" class="img-fullwidth wp-post-image" alt="{{ $indexTeam->name }}" />
                                            </div>
                                            <div class="overlay-shade"></div>
                                            <div class="icons-holder icons-holder-middle staff-social-links">
                                                <div class="icons-holder-inner">
                                                    <ul class="styled-icons icon-dark icon-theme-colored2 icon-circled icon-sm">
                                                        @if($indexTeam->facebook)
                                                            <li>
                                                                <a class="styled-icons-item" href="{{ $indexTeam->facebook }}"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                        @endif @if($indexTeam->twitter)
                                                            <li>
                                                                <a class="styled-icons-item" href="{{ $indexTeam->twitter }}"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                        @endif @if($indexTeam->linkedin)
                                                            <li>
                                                                <a class="styled-icons-item" href="{{ $indexTeam->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                                            </li>
                                                        @endif @if($indexTeam->instagram)
                                                            <li>
                                                                <a class="styled-icons-item" href="{{ $indexTeam->instagram }}"><i class="fa fa-instagram"></i></a>
                                                            </li>
                                                        @endif @if($indexTeam->youtube)
                                                            <li>
                                                                <a class="styled-icons-item" href="{{ $indexTeam->youtube }}"><i class="fa fa-youtube"></i></a>
                                                            </li>
                                                        @endif @if($indexTeam->github)
                                                            <li>
                                                                <a class="styled-icons-item" href="{{ $indexTeam->github }}"><i class="fa fa-github"></i></a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="staff-content">
                                            <h4 class="name"><a href="{{ route(getResourceFullLink('teams','show'), $indexTeam) }}">{{ $indexTeam->name }}</a></h4>
                                            <div class="speciality">{{ $indexTeam->job }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Divider -->
