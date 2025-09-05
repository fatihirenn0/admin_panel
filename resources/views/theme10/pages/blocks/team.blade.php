<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <!-- Sec Title -->
        <div class="section-title light">
            <div class="clearfix">
                <div class="pull-left">
                    <div class="title">{{ __('Ekibimiz') }}</div>
                    <h3>
                        {{ __('Alanında Uzman Takım Arkadaşlarımız') }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="clearfix">
            @foreach($allTeams as $indexTeam)
                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="#"><img src="/storage/{{ $indexTeam->image }}" alt="{{ $indexTeam->name }}" /></a>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{ $indexTeam->name }}</a></h3>
                            <div class="designation">{{ $indexTeam->job }}</div>
                            <div class="overlay-box">
                                <div class="overlay-content">
                                    <div class="title">{{ __('Sosyal Medya') }}</div>
                                    <ul class="social-icons">
                                        @if($indexTeam->facebook)
                                            <a class="text-white" href="{{ $indexTeam->facebook }}">
                                                <i class="fa fa-facebook-f"></i>
                                                <span class="sr-only">Facebook</span>
                                            </a>
                                        @endif @if($indexTeam->twitter)
                                            <li>
                                                <a href="{{ $indexTeam->twitter }}">
                                                    <i class="fa fa-twitter"></i>
                                                    <span class="sr-only">Twitter</span>
                                                </a>
                                            </li>
                                        @endif @if($indexTeam->instagram)
                                            <li>
                                                <a href="{{ $indexTeam->instagram }}">
                                                    <i class="fa fa-instagram"></i>
                                                    <span class="sr-only">İnstagram</span>
                                                </a>
                                            </li>
                                        @endif @if($indexTeam->youtube)
                                            <li>
                                                <a href="{{ $indexTeam->youtube }}">
                                                    <i class="fa fa-youtube"></i>
                                                    <span class="sr-only">Youtube</span>
                                                </a>
                                            </li>
                                        @endif @if($indexTeam->github)
                                            <li>
                                                <a href="{{ $indexTeam->github }}">
                                                    <i class="fa fa-github"></i>
                                                    <span class="sr-only">Github</span>
                                                </a>
                                            </li>
                                        @endif @if($indexTeam->linkedin)
                                            <li>
                                                <a href="{{ $indexTeam->linkedin }}">
                                                    <i class="fa fa-linkedin"></i>
                                                    <span class="sr-only">Linkedin</span>
                                                </a>
                                            </li>
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
