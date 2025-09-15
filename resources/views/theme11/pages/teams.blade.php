@extends('theme11.pages.build')
@if(isset($teamCategory))
    @section('title',$teamCategory->name)
    @section('meta_keywords',$teamCategory->meta_keywords)
    @section('meta_description',$teamCategory->meta_description)
@else
    @section('title',__('Ekibimiz'))
@endif
@section('content')
    <!-- Page Title -->
    <section class="page-title static-image" style="background-image:url(/theme11/images/background/1.jpg)" alt="{{ __('Ekibimiz Sayfası 2.Görseli') }}">
        <div class="auto-container">
            <h1>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                <li>{{ isset($teamCategory) ? $teamCategory->name : __('Ekibimiz') }}</li>
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
                                <img class="static-image" src="/theme11/images/resource/case-1.jpg" alt="{{ __('Ekibimiz Sayfası 2.Görseli') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{ __('Her Alanda Uzman Avukat Kadromuz') }}</h2>
                                <div class="text">{{ __('Her biri kendi alanında deneyimli avukatlarımız; dava stratejisi, danışmanlık ve müzakere süreçlerinde şeffaf, çözüm odaklı ve etik bir yaklaşım benimser. Müvekkillerimizin ihtiyaçlarına özel çözümler üreterek sürecin her adımında yanlarında oluruz.') }}</div>
                            </div>
                            <div class="text-box">
                                {{ __('Güven, şeffaflık ve titizlik: Ekibimizin ortak çalışma prensibi. Dosyanızın her aşamasını öngörülebilir, planlı ve ölçülebilir şekilde yönetiyoruz.”') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Welcome Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ __('Ekibimiz') }}</h2>
            </div>
            <div class="row clearfix">

                @foreach($teams as $team)
                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}">
                        </div>
                        <div class="lower-box">
                            <h5><a href="{{ route(getResourceFullLink('teams','show'),$team) }}">{{ $team->name }}</a></h5>
                            <div class="designation">{{ $team->job }}</div>
                            <a class="arrow flaticon-right-arrow-3" href="{{ route(getResourceFullLink('teams','show'),$team) }}"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team Section -->
@endsection
