@extends('theme10.pages.build')
@section('title',$team->name)
@section('meta_keywords',$team->meta_keywords)
@section('meta_description',$team->meta_description)
@section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(images/background/4.jpg);" alt="{{ __('Ekip Detay Sayfası')  }}">
        <div class="container">
            <div class="content">
                <h1>{{ $team->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ $team->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="container">
            <div class="row clearfix">
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar padding-right">
                        <!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <ul class="blog-cat">
                                @foreach($teamCategories as $teamCategory)
                                    <li class="active"><a href="{{ route(getResourceFullLink('team_categories','show'),$teamCategory) }}">{{ $teamCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Contact Widget-->
                        <div class="sidebar-widget contact-widget">
                            <div class="sidebar-title">
                                <h4>{{ __('İletişim Bilgileri') }}</h4>
                            </div>
                            <ul>
                                <li><span class="icon flaticon-map-1"></span> {{ $team->address }}</li>
                                <li><span class="icon flaticon-call-answer"></span> {{ $team->telephone }}</li>
                                <li><span class="icon flaticon-comment"></span> {{ $team->email }}</li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="services-single">
                        <h4>{{ $team->name }}</h4>
                        <div class="text">
                            <p>{!! $team->description !!}</p>
                        </div>
                        <!--Services Info Tabs-->
                        <div class="Services-info-tabs">
                            <!--Service Tabs-->
                            <div class="service-tabs tabs-box">
                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#prod-audit" class="tab-btn active-btn"><i>{{ __('Eğitim Bilgileri') }}</i></li>
                                    <li data-tab="#prod-strategy" class="tab-btn"><i>{{ __('İş Tecrübeleri') }}</i></li>
                                </ul>

                                <!--Tabs Container-->
                                <div class="tabs-content">
                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="prod-audit">
                                        <div class="content">
                                            <div class="text">
                                                <p>{{ $team->education }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="prod-strategy">
                                        <div class="content">
                                            <div class="text">
                                                <p>{{ $team->work_experience }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
