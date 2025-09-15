@extends('theme18.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')

    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ isset($serviceCategory) ? $serviceCategory->name : __('Hizmetler') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Practice -->
    <section class="practice-area practice-area-three pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($services as $service)
                    <div class="col-sm-6 col-lg-4">
                        <div class="practice-item">
                            <div class="practice-icon">
                                <i class="flaticon-law"></i>
                            </div>
                            <h3>{{ $service->name }}</h3>
                            <p>{!! $service->short_description !!}</p>
                            <a href="{{ route(getResourceFullLink('services','show'), $service) }}">{{ __('İncele') }}</a>
                            <img class="practice-shape-one" src="/storage/{{ $service->image }}" alt="{{ $service->name }}" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Practice -->
@endsection
