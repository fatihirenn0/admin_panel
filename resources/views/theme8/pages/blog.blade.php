@extends('theme8.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <div class="mcgill-post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInLeft"> <span class="heading-meta">Family Law</span>
                    <h2 class="mcgill-heading">{{ $blog->name }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 animate-box" data-animate-effect="fadeInLeft">
                    <p>{!! $blog->description !!}</p>
                </div>
                <div class="col-md-5 animate-box" data-animate-effect="fadeInLeft">
                    <img src="/storage/{{ $blog->image }}" class="img-fluid mb-30" alt="{{ $blog->name }}">
                    @foreach($blogImages as $blogImage)
                        <img src="/storage/{{ $blogImage->image_url }}" class="img-fluid mb-30" alt="{{ $blog->name }}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
