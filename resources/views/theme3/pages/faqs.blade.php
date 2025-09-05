@extends('theme3.pages.build')
@section('title',__('Sıkça Sorulan Sorular'))

@section('content')
    <!-- Start main-content -->
    <section class="page-title static-image" style="background-image: url(/theme3/images/background/page-title-bg.jpg);" alt="{{__('Sıkça Sorulan Sorular Sayfası Arka Plan Görseli')}}">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">{{ __('Sıkça Sorulan Sorular') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ __('Sıkça Sorulan Sorular') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end main-content -->

    <!-- FAQ Section -->
    <section class="faqs-section-home1 innerpage pt-120 pb-100">
        <div class="auto-container">
            <div class="row">
                <!-- FAQ Column -->
                @if(count($faqCategories) > 0)
                    @foreach($faqCategories as $faqCategory)
                        <div class="faq-column col-lg-6 px-3">
                            <div class="sec-title mb-30">
                                <h3>{{ $faqCategory->name }}</h3>
                            </div>
                            <div class="inner-column">
                                <ul class="accordion-box style-two wow fadeInLeft mb-5 mb-lg-0">
                                    @foreach($faqCategory->faqs as $faq)
                                        <li class="accordion block {{ $loop->first ? 'active-block' : '' }}">
                                            <div class="acc-btn border-bottom-0 {{ $loop->first ? 'active' : '' }}">{{ $faq->question }}
                                                <div class="icon fa fa-plus"></div>
                                            </div>
                                            <div class="acc-content {{ $loop->first ? 'current' : '' }}">
                                                <div class="content">
                                                    <div class="text">{!! $faq->answer !!}</div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="faq-column col-lg-12 px-3">
                        <div class="sec-title mb-30">
                            <h3>{{ __('Sıkça Sorulan Sorular') }}</h3>
                        </div>
                        <div class="inner-column">
                            <ul class="accordion-box style-two wow fadeInLeft mb-5 mb-lg-0">
                                @foreach($faqs as $faq)
                                    <li class="accordion block {{ $loop->first ? 'active-block' : '' }}">
                                        <div class="acc-btn border-bottom-0 {{ $loop->first ? 'active' : '' }}">{{ $faq->question }}
                                            <div class="icon fa fa-plus"></div>
                                        </div>
                                        <div class="acc-content {{ $loop->first ? 'current' : '' }}">
                                            <div class="content">
                                                <div class="text">{!! $faq->answer !!}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--End FAQ Section -->

@endsection

