
<!-- attornies seciton -->
<section class="services experts-3 overflow-x-hidden" id="experts">
    <div class="container">
        <div class="row align-items-end g-4 section-title">
            <div class="col-lg-6">
                <h2 class="mb-3">{{ __('Her Alanda Uzman Avukat Kadromuz') }}</h2>
                <p>{{ __('Her biri kendi alanında deneyimli avukatlarımız; dava stratejisi, danışmanlık ve müzakere süreçlerinde şeffaf, çözüm odaklı ve etik bir yaklaşım benimser. Müvekkillerimizin ihtiyaçlarına özel çözümler üreterek sürecin her adımında yanlarında oluruz.') }}</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <div class="btns">
                    <button class="expert-prev"><i class="ti ti-arrow-narrow-left"></i></button>
                    <button class="expert-next"><i class="ti ti-arrow-narrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="swiper expertSwiper3">
            <div class="swiper-wrapper">
                @foreach($allTeams as $indexTeam)
                    <div class="swiper-slide">
                    <div class="expert-card">
                        <div class="img-box">
                            <img src="/storage/{{ $indexTeam->image }}" class="w-100" alt="{{ $indexTeam->name }}">
                            <div class="social">
                                <ul class="links mb-0 list-unstyled">
                                    @if($indexTeam->facebook)
                                        <li><a href="{{ $indexTeam->facebook }}"><i class="ti ti-brand-facebook"></i></a></li>
                                    @endif
                                    @if($indexTeam->twitter)
                                        <li><a href="{{ $indexTeam->twitter }}"><i class="ti ti-brand-twitter"></i></a></li>
                                    @endif
                                    @if($indexTeam->linkedin)
                                        <li><a href="{{ $indexTeam->linkedin }}"><i class="ti ti-brand-linkedin"></i></a></li>
                                    @endif
                                    @if($indexTeam->instagram)
                                        <li><a href="{{ $indexTeam->instagram }}"><i class="ti ti-brand-instagram"></i></a></li>
                                    @endif
                                    @if($indexTeam->tiktok)
                                        <li><a href="{{ $indexTeam->tiktok }}"><i class="ti ti-brand-tiktok"></i></a></li>
                                    @endif
                                    @if($indexTeam->youtube)
                                        <li><a href="{{ $indexTeam->youtube }}"><i class="ti ti-brand-youtube"></i></a></li>
                                    @endif
                                    @if($indexTeam->github)
                                        <li><a href="{{ $indexTeam->github }}"><i class="ti ti-brand-github"></i></a></li>
                                    @endif
                                </ul>
                                <button class="social-btn z-2"><i class="ti ti-plus"></i></button>
                            </div>
                        </div>
                        <div class="text-center mt-4 position-relative z-3">
                            <h5 class="fw-semibold">{{ $indexTeam->name }}</h5>
                            <p>{{ $indexTeam->job }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
