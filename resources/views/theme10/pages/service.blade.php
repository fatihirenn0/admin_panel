@extends('theme10.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!--Page Title-->
    <section class="page-title static-image" style="background-image: url(/theme10/images/background/4.jpg);" alt="{{ __('Hizmet Detay Sayfası Görseli') }}">
        <div class="container">
            <div class="content">
                <h1>{{ $service->name }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ $service->name }}</li>
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
                                @foreach($serviceCategories as $serviceCategory)
                                    <li class="{{ $loop->first ? 'active' : '' }}"><a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">{{ $serviceCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="services-single">
                        <h4>{{ $service->name }}</h4>
                        <div class="text">
                            <p>{!! $service->long_description !!}</p>
                            <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                        </div>
                        <!-- Services Gallery -->
                        <div class="services-gallery">
                            <div class="services-carousel owl-carousel owl-theme">
                                @foreach($serviceImages as $serviceImage)
                                    <div class="slide">
                                        <div class="image">
                                            <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @php $previousService = \App\Models\Service::where('id','<',$service->id)->first(); $nextService = \App\Models\Service::where('id','>',$service->id)->first(); @endphp

                                <!-- More Services -->
                            <div class="more-services">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        @if($previousService)
                                            <a href="{{ route(getResourceFullLink('services','show'),$previousService) }}"><span class="fa fa-angle-double-left"></span>{{ __('Önceki Hizmet') }}</a>
                                        @endif
                                    </div>
                                    <div class="pull-right">
                                        @if($nextService)
                                            <a href="{{ route(getResourceFullLink('services','show'),$nextService) }}">{{ __('Sonraki Hizmet') }} <span class="fa fa-angle-double-right"></span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </div>
