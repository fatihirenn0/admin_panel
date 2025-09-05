@extends('theme4.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords)
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <!-- <div class="page-header__shape"></div> -->
        <!-- /.page-header__shape -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-right">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h2>
            <ul class="procounsel-breadcrumb list-unstyled">
                <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                @if(isset($serviceCategory))
                    <li><a href="{{ route(getResourceFullLink('services','index')) }}">{{ __('Hizmetler') }}</a></li>
                    <li>{{ $serviceCategory->name }}</li>
                @else
                    <li>{{ __('Hizmetler') }}</li>
                @endif
            </ul>
            <!-- /.thm-breadcrumb list-unstyled -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-header -->

    <!-- Service Start -->
    <section class="service-one service-two--page">
        <div class="container">
            <div class="row gutter-y-30">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ ($loop->index * 100) }}ms">
                        <div class="service-one__item">
                            <div class="service-one__item__top">
                                <h3 class="service-one__item__title">
                                    <a href="{{ route(getResourceFullLink('services','show'), $service) }}">
                                        {{ $service->name }}
                                    </a>
                                </h3>
                                <span class="service-one__item__count"></span>
                            </div>
                            <div class="service-one__item__content">
                                <p class="service-one__item__text">
                                    {!! $service->short_description !!}
                                </p>
                                <div class="service-one__item__image">
                                    <img src="/storage/{{$service->image}}" alt="{{ $service->name }}" />
                                    <div class="service-one__item__icon">
                                        <i class="icon-criminal-law"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.service-card-one -->
                    </div>
                    <!-- item -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- Service End -->

@endsection
