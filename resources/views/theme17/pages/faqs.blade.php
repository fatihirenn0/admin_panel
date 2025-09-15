@extends('theme17.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <!-- Banner Start -->
    <section class="main-inner-banner">
        <span class="bg-icon"></span>
        <div class="inner-banner-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-banner-content">
                        <h1 class="h1-title">{{ __('Sıkça Sorulan Sorular') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-box">
        <ul>
            <li>
                <a href="{{ route('site.index') }}" title="{{ __('Anasayfa') }}">{{ __('Anasayfa') }}</a>
            </li>
            <li>{{ __('Sıkça Sorulan Sorular') }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- FAQ Start -->
    <section class="page-main-faq">
        <div class="container">
            <div class="faq-lists">
                <div class="row">
                    @if(!empty($faqCategories) && count($faqCategories) > 0) @foreach($faqCategories as $faqCategory)

                        <div class="col-lg-6">
                            <h4>{{ $faqCategory->name }}</h4>
                            <div class="faq-accordion wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                @foreach($faqCategory->faqs as $faq)
                                    <div class="faq-accordion-box">
                                        <div class="faq-accordion-title">
                                            <h4 class="h4-title">{{ $faq->question }}</h4>
                                            <span class="icon"><i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="faq-accordion-content">
                                            <p>
                                                {{ $faq->answer }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @endforeach @else @foreach($faqs as $faq)
                        <div class="col-lg-6">
                            <div class="faq-accordion wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                <div class="faq-accordion-box">
                                    <div class="faq-accordion-title">
                                        <h4 class="h4-title">{{ $faq->question }}</h4>
                                        <span class="icon"><i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="faq-accordion-content">
                                        <p>
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach @endif
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ End -->
@endsection
