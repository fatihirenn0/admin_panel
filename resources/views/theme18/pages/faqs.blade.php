@extends('theme18.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ __('Sıkça Sorulan Sorular') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('Sıkça Sorulan Sorular') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Faq -->
    <section class="faq-area pt-100">
        <div class="container">
            @if($faqCategories->count() > 0 ) @foreach($faqCategories as $faqCategory)
                <div class="row faq-wrap">
                    <div class="col-lg-12">
                        <div class="faq-head">
                            <h2>{{ $faqCategory->name }}</h2>
                        </div>
                        <div class="faq-item">
                            <ul class="accordion">
                                @foreach($faqCategory->faqs as $faq)
                                    <li class="wow fadeInUp" data-wow-delay=".3s">
                                        <a>{{ $faq->question }}</a>
                                        <p>{{ $faq->answer }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach @else
                <div class="row faq-wrap">
                    <div class="col-lg-12">
                        @foreach($faqs as $faq)
                            <div class="faq-item">
                                <ul class="accordion">
                                    <li class="wow fadeInUp" data-wow-delay=".3s">
                                        <a>{{ $faq->question }}</a>
                                        <p>{{ $faq->answer }}</p>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- End Faq -->
@endsection
