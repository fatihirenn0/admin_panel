<section class="service service_bg service_home_padding">
    <div class="service_another_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="heading_common heading_primary_color" data-aos="fade-up">
                        <h5>{{ __('Hizmetlerimiz') }}</h5>
                        <h3>{{ __('İhtiyacınıza Özel Profesyonel Hukuk Hizmetleri') }}</h3>
                        <a href="{{ route(getResourceFullLink('services')) }}" class="btn_one btn">{{ __('Tüm Hizmetler') }}</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($allServices as $indexService)
                            <div class="col-lg-6">
                            <div class="service_box" data-aos="fade-up">
                                <div class="hover_image">
                                    <img src="/storage/{{ $indexService->image }}" alt="{{ $indexService->name }}">
                                </div>
                                <div class="service_inner">
                                    <div class="image">
                                        <img class="static-image" src="/theme16/images/service/s1.png" alt="{{ __('Anasayfa Hizmetler İkon') }}">
                                    </div>
                                    <div class="content">
                                        <h4>{{ $indexService->name }}</h4>
                                        <p>{!! $indexService->short_description !!}</p>
                                        <a href="{{ route(getResourceFullLink('services','show'), $indexService) }}" class="btn_service">{{ __('İncele') }}</a>
                                    </div>
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
