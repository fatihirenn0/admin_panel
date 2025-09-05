@extends('theme4.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <!-- <div class="page-header__shape"></div> -->
        <!-- /.page-header__shape -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-right">{{ $service->name }}</h2>
            <ul class="procounsel-breadcrumb list-unstyled">
                <li><a href="{{ route('site.index') }}"> {{ __('Ana Sayfa') }}</a></li>
                <li><span>{{ $service->name }}</span></li>
            </ul>
            <!-- /.thm-breadcrumb list-unstyled -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-header -->

    <section class="service-details">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-8">
                    <div class="service-details__wrapper">
                        <div class="service-details__image">
                            <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                            <!-- /.service-details__date -->
                        </div>
                        <!-- service-details__image -->
                        <div class="service-details__content">
                            <ul class="list-unstyled service-details__meta">
                                @if($service->categories) @foreach($service->categories as $categoryRelation)
                                    <li>
                                        <i class="fa fa-tags"></i>
                                        {{ $categoryRelation->name }}
                                    </li>
                                @endforeach @endif
                            </ul>
                            <!-- /.list-unstyled service-details__meta -->
                            <h3 class="service-details__title">{{ $service->name }}</h3>
                            <!-- /.service-details__title -->
                            <p class="service-details__text">
                                {!! $service->long_description !!}
                            </p>
                            <!-- /.service-details__text -->
                        </div>
                    </div>
                    <!-- /.service-details -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget-area">
                            <div class="sidebar__single sidebar__single__search">
                                <form action="{{ route(getResourceFullLink('services','index')) }}" class="sidebar__search">
                                    <input name="q" type="search" placeholder="{{__('Hizmetlerde Ara')}}" />
                                    <button type="submit"><i class="icon-search"></i></button>
                                </form>
                                <!-- /.sidebar__search -->
                            </div>
                            <!-- /.sidebar__single -->
                            <div class="sidebar__single">
                                <h4 class="sidebar__title">
                                    {{ __('Son Hizmetler') }}
                                </h4>
                                <!-- /.sidebar__title -->
                                <ul class="sidebar__posts list-unstyled">
                                    @foreach(\App\Models\Service::where('id','!=',$service->id)->inRandomOrder()->take(3)->get() as $otherService)
                                        <li class="sidebar__posts__item">
                                            <!-- /.sidebar__posts__image -->
                                            @if($service->categories) @foreach($service->categories as $categoryRelation)
                                                <div class="sidebar__posts__content">
                                                    <p class="sidebar__posts__meta">
                                                        <i class="fa fa-tags"></i>
                                                        {{ $categoryRelation->name }}
                                                    </p>
                                                    <!-- /.sidebar__posts__date -->
                                                    <h4 class="sidebar__posts__title">
                                                        <a href="{{ route(getResourceFullLink('services','show'),$otherService) }}">
                                                            {{ $otherService->name }}
                                                        </a>
                                                    </h4>
                                                    <!-- /.sidebar__posts__title -->
                                                </div>
                                                <!-- /.sidebar__posts__content -->
                                            @endforeach @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.sidebar__posts list-unstyled -->
                            </div>
                            <!-- /.sidebar__single -->
                            <div class="sidebar__single">
                                <h4 class="sidebar__title">{{ __('Kategoriler') }}</h4>
                                <!-- /.sidebar__title -->
                                <ul class="sidebar__categories list-unstyled">
                                    @foreach(\App\Models\ServiceCategory::orderBy('rank')->get() as $serviceCategory)
                                        <li>
                                            <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}"> <i class="icon-arrow-right"></i>{{ $serviceCategory->name }}<span class="icon-right-arrow"></span> </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.sidebar__categories list-unstyled -->
                            </div>
                        </aside>
                        <!-- /.widget-area -->
                    </div>
                    <!-- /.sidebar -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.service-details -->

@endsection
