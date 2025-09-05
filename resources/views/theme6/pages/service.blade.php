@extends('theme6.pages.build')
@section('title',$service->name)
@section('meta_keywords',$service->meta_keywords)
@section('meta_description',$service->meta_description)
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img src="/theme6/img/bg/practice-breadcrumb-bg.jpg" alt="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ $service->name }}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                            <li>{{ $service->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Attorneys Area -->
    <section class="practice-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="aboutPimg">
                        <img src="/storage/{{ $service->image }}" alt="{{ $service->name }}">
                    </div>
                    <div class="aboutPtext">
                        <p>{!! $service->long_description !!}</p>
                     </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-attorneys">
                        <h4>{{ __('Kategoriler') }}</h4>
                        @foreach(\App\Models\ServiceCategory::orderBy('rank')->get() as $serviceCategory)
                        <div class="ss-attorneys">
                            <a href="{{ route(getResourceFullLink('service_categories','show'),$serviceCategory) }}">  {{ $serviceCategory->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- /Attorneys Area -->

@endsection
