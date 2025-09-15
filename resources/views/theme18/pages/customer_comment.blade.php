@extends('theme18.pages.build') @section('title',__('Müşteri Yorumları')) @section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ __('Müşteri Yorumları') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('Müşteri Yorumları') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Testimonial -->
    <div class="testimonial-area pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($customerComments as $customerComment)
                    <div class="col-sm-6 col-lg-4">
                        <div class="testimonial-item">
                            <div class="testimonial-wrap">
                                <p>{{ $customerComment->comment }}</p>
                                <img src="/storage/{{ $customerComment->image }}" alt="{{ $customerComment->name }}" />
                                <div class="testimonial-right">
                                    <h3>{{ $customerComment->name }}</h3>
                                    <span>{{ $customerComment->job }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Testimonial -->
@endsection
