@extends('theme8.pages.build')
@if(isset($projectCategory))
    @section('title',$projectCategory->name)
    @section('meta_keywords',$projectCategory->meta_keywords)
    @section('meta_description',$projectCategory->meta_description)
@else
    @section('title',__('Projeler'))
@endif
@section('content')
    <!-- Case Studies -->
    <div class="mcgill-cases">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft"> <span class="heading-meta">{{ __('Çalışmalarımız') }}</span>
                    <h2 class="mcgill-heading">{{ __('Projeler') }}</h2> </div>
            </div>
            <div class="row">
                @if(count($projectCategories) > 0) @foreach($projectCategories as $projectCategory)
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="/storage/{{ $projectCategory->image }}" alt="{{ $projectCategory->name }}"> </div>
                        @foreach($projectCategory->projects as $project)
                        <div class="con">
                            <a href="{{ route(getResourceFullLink('projects','show'),$project) }}">
                                <h5>{{ $project->name }}</h5> </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                @else
                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                        <div class="item">
                            <div class="position-re o-hidden"> <img src="/storage/{{ $project->image }}" alt="{{ $project->name }}"> </div>
                            <div class="con">
                                <a href="{{ route(getResourceFullLink('projects','show'),$project) }}">
                                    <h5>{{ $project->name }}</h5> </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
