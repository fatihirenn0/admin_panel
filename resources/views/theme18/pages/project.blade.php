@extends('theme18.pages.build') @section('title',$project->name) @section('meta_keywords',$project->meta_keywords) @section('meta_description',$project->meta_description) @section('content')

    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ $project->name }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ $project->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Case Details Img -->
    <div class="case-details-img pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="case-details-item">
                        <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}" />
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="case-details-item">
                        <h3>{{ $project->name }}</h3>
                        <p>{!! $project->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Case Details Img -->
@endsection
