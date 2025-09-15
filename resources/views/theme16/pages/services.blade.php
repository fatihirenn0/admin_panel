@extends('theme16.pages.build')
@if(isset($serviceCategory))
    @section('title', $serviceCategory->name)
    @section('meta_keywords', $serviceCategory->meta_keywords )
    @section('meta_description', $serviceCategory->meta_description)
@else
    @section('title', __('Hizmetler'))
@endif
@section('content')

    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li class="active">{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="service service_bg servie_inner_padding">
        <div class="service_another_bg">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-4">
                            <div class="service_box" data-aos="fade-up">
                                <div class="hover_image">
                                    <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                                </div>
                                <div class="service_inner">
                                    <div class="image">
                                        <img class="static-image" src="/theme16/images/service/s1.png" alt="{{ __('Hizmetler Sayfası İkon') }}" />
                                    </div>
                                    <div class="content">
                                        <h4>{{ $service->name }}</h4>
                                        <p>{!! $service->short_description !!}</p>
                                        <a href="{{ route(getResourceFullLink('services','show'), $service) }}" class="btn_service">{{ __('İncele') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
