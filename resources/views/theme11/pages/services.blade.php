@extends('theme11.pages.build')
@if(isset($serviceCategory))
    @section('title',$serviceCategory->name)
    @section('meta_keywords',$serviceCategory->meta_keywords)
    @section('meta_description',$serviceCategory->meta_description)
@else
    @section('title',__('Hizmetler'))
@endif
@section('content')
    <!-- Page Title -->
    <section class="page-title static-image" style="background-image: url(/theme11/images/background/1.jpg);" alt="{{ __('Hizmetler Sayfası 1. Görsel') }}">
        <div class="auto-container">
            <h1>{{ __('Hizmetler') }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                <li>{{ __('Hizmetler') }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Welcome Section -->
    <section class="welcome-section style-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="clearfix">
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img class="static-image" src="/theme11/images/resource/service-1.jpg" alt="{{ __('Hizmet Sayfası 2. Görsel') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{ __('Hukuki Süreçlerde Sunduğumuz Profesyonel Deste') }}</h2>
                                <div class="text">{{ __('Hukuki süreçler karmaşık olabilir. Biz, her müvekkilimize özel çözümler sunarak adalete giden yolu kolaylaştırıyoruz. Aşağıda sunduğumuz hizmet başlıklarını inceleyebilirsiniz.') }}</div>
                            </div>
                            <div class="row clearfix">
                                <div class="column col-lg-6 col-md-6 col-sm-6">
                                    <ul class="list-style-one">
                                        <li>{{ __('Bireysel ve kurumsal danışmanlık') }}</li>
                                        <li>{{ __('Sözleşme hazırlama ve inceleme') }}</li>
                                        <li>{{ __('Ceza ve hukuk davalarında temsil') }}</li>
                                        <li>{{ __('Aile hukuku, boşanma ve miras işlemleri') }}</li>
                                    </ul>
                                </div>
                                <div class="column col-lg-6 col-md-6 col-sm-6">
                                    <ul class="list-style-one">
                                        <li>{{ __('Arabuluculuk ve uzlaşma süreçleri') }}</li>
                                        <li>{{ __('Dava öncesi risk analizi ve strateji belirleme') }}</li>
                                        <li>{{ __('Gayrimenkul ve tapu işlemleri hukuki takibi') }}</li>
                                        <li>{{ __('İcra ve iflas takibi, alacak tahsili hizmetleri') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btns-box">
                                <a href="{{ route(getOtherFullLink('contact')) }}" class="theme-btn btn-style-two">
                                    <span class="txt">{{ __('Bize Ulaşın') }}<i class="arrow flaticon-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Welcome Section -->

    <!-- Services Page Section -->
    <section class="services-page-section">
        <div class="auto-container">
            @foreach($services as $service) @php $isEven = $loop->iteration % 2 === 0; @endphp

                <!-- Services Block Three -->
            <div class="services-block-three {{ $isEven ? 'style-two' : '' }}">
                <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="row clearfix">
                        @if($isEven)
                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2><a href="{{ route(getResourceFullLink('services','show'), $service) }}">{{ $service->name }}</a></h2>
                                    <div class="text">{!! $service->short_description !!}</div>
                                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="theme-btn btn-style-three">
                                        <span class="txt">{{ __('İncele') }} <i class="arrow flaticon-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        @else
                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2><a href="{{ route(getResourceFullLink('services','show'), $service) }}">{{ $service->name }}</a></h2>
                                    <div class="text">{!! $service->short_description !!}</div>
                                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="theme-btn btn-style-three">
                                        <span class="txt">{{ __('İncele') }} <i class="arrow flaticon-right"></i></span>
                                    </a>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End Services Page Section -->
@endsection
