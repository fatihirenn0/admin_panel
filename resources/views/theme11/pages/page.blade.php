@extends('theme11.pages.build')
@section('title',$page->name)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <!-- Page Title -->
    <section class="page-title static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('Kurumsal Sayfa Görseli') }}">
        <div class="auto-container">
            <h1>{{ $page->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li>{{ $page->name }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Case Section -->
    <section class="case-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="clearfix">
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <img src="/storage/{{ $page->image }}" alt="{{ $page->name }}" />
                            </div>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{ $page->name }}</h2>
                                <div class="text">{!! $page->description !!}</div>
                            </div>
                            <div class="text-box">
                                {{ __('Avukatlık, kişilerin ya da kurumların hak ve menfaatlerini korumak, hukuki sorunlarına çözüm üretmek ve yargı mercileri ile resmi kurumlarda onları temsil etmek amacıyla yapılan meslektir. Avukat, hukuki
                                bilgi ve deneyimiyle müvekkiline yol gösterir, dava açar veya açılan davada savunma yapar, gerekli dilekçe ve belgeleri hazırlar. Bunun yanında sözleşme düzenleme, hukuki danışmanlık sağlama, icra ve noter
                                işlemlerinde müvekkil adına hareket etme gibi görevleri vardır.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Welcome Section -->

    <!-- Services Section Two -->
    <section class="services-section-two style-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ __('Güven, Tecrübe ve Çözüm Odaklı Hukuk Hizmetleri') }}</h2>
            </div>
            <div class="row clearfix">
                <!-- Services Block Two -->
                <div class="services-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon flaticon-auction"></div>
                        <h5><a href="{{ route(getResourceFullLink('services')) }}">{{ __('Sigorta Hukuku') }}</a></h5>
                        <div class="text">{{ __('Dava açmak veya açılan davalarda savunma yapmak') }}</div>
                        <a class="arrow flaticon-right-arrow-3" href="{{ route(getResourceFullLink('services')) }}"></a>
                    </div>
                </div>

                <!-- Services Block Two -->
                <div class="services-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon flaticon-law"></div>
                        <h5><a href="{{ route(getResourceFullLink('services')) }}">{{ __('Ceza Hukuku') }}</a></h5>
                        <div class="text">{{ __('Hukuki görüş ve danışmanlık vermek') }}</div>
                        <a class="arrow flaticon-right-arrow-3" href="{{ route(getResourceFullLink('services')) }}"></a>
                    </div>
                </div>

                <!-- Services Block Two -->
                <div class="services-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon flaticon-marketing"></div>
                        <h5><a href="{{ route(getResourceFullLink('services')) }}">{{ __('Ticaret Hukuku') }}</a></h5>
                        <div class="text">{{ __('Sözleşme, ihtarname, itiraz gibi belgeleri hazırlamak') }}</div>
                        <a class="arrow flaticon-right-arrow-3" href="{{ route(getResourceFullLink('services')) }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section Two -->

    <!-- Fluid Section Two -->
    <section class="fluid-section-two mb-5">
        <div class="side-icon static-image"><img src="/theme11/images/icons/fluid-icon-1.png" alt="{{ __('Kurumsal Neden Biz Arka Plan Görseli') }}" /></div>
        <div class="outer-container clearfix">
            <!-- Content Column -->
            <div class="content-column">
                <div class="inner-column">
                    <!-- Sec Title -->
                    <div class="sec-title light">
                        <h2>{{ __('Neden Biz?') }}</h2>
                        <div class="text">{{ __('Güveninizi Hak Eden Hukuki Çözümler') }}</div>
                    </div>
                    <!-- Counter Boxed -->
                    <div class="counter-boxed">
                        <div class="fact-counter style-two">
                            <div class="row clearfix">
                                <!-- Column -->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon flaticon-briefcase"></div>
                                            <div class="count-outer count-box"><span class="count-text" data-speed="2500" data-stop="250">0</span><sup>+</sup></div>
                                            <h6 class="counter-title">{{ __('Evrak ve Süreç Yönetimi') }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <!-- Column -->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon flaticon-balance"></div>
                                            <div class="count-outer count-box"><span class="count-text" data-speed="3000" data-stop="180">0</span><sup>+</sup></div>
                                            <h6 class="counter-title">{{ __('Güvenilir Hukuki Ağ') }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <!-- Column -->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon flaticon-marketing"></div>
                                            <div class="count-outer count-box"><span class="count-text" data-speed="3000" data-stop="350">0</span><sup>+</sup></div>
                                            <h6 class="counter-title">{{ __('Memnun Müvekkil') }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <!-- Column -->
                                <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon flaticon-trophy-2"></div>
                                            <div class="count-outer count-box"><span class="count-text" data-speed="3000" data-stop="150">0</span><sup>+</sup></div>
                                            <h6 class="counter-title">{{ __('Kişiye Özel Stratejiler')}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column static-image" style="background-image: url(/theme11/images/resource/image-2.jpg);" alt="{{ __('Kurumsal Neden Biz Görseli') }}">
                <figure class="image-box static-image"><img src="/theme11/images/resource/image-2.jpg" alt="{{ __('Kurumsal Neden Biz Görseli') }}" /></figure>
            </div>
        </div>
    </section>
    <!-- End Fluid Section Two -->
@endsection
