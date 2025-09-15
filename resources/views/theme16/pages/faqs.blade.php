@extends('theme16.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <!-- Page Header -->
    <div class="page_header">
        <div class="page_header_content">
            <div class="container">
                <h2 class="heading">{{ __('Sıkça Sorulan Sorular') }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li class="active">{{ __('Sıkça Sorulan Sorular') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="faq">
        <div class="faq_bg">
            <div class="container">
                <div class="row">
                    @if($faqCategories->count() > 0 ) @foreach($faqCategories as $faqCategory)
                        <div class="offset-lg-6 col-lg-5 col-md-12">
                            <div class="section_header" data-aos="fade-up">
                                <h4 class="section_title">{{ $faqCategory->name }}</h4>
                            </div>
                            <div class="accordion" data-aos="fade-up">
                                @foreach($faqCategory->faqs as $faq)
                                    <div class="item {{ $loop->first ? 'active' : '' }}">
                                        <div class="accordion_tab">
                                            <h4 class="accordion_title">{{ $faq->question }}</h4>
                                            <span class="accordion_tab_icon">
                                    <i class="open_icon ion-ios-plus-empty"></i>
                                    <i class="close_icon ion-ios-minus-empty"></i>
                                </span>
                                        </div>
                                        <div class="accordion_info">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach @else
                        <div class="offset-lg-6 col-lg-5 col-md-12">
                            <div class="section_header" data-aos="fade-up">
                                <h4 class="section_title">{{ __('Sıkça Sorulan Sorular') }}</h4>
                            </div>
                            <div class="accordion" data-aos="fade-up">
                                @foreach($faqs as $faq)
                                    <div class="item {{ $loop->first ? 'active' : '' }}">
                                        <div class="accordion_tab">
                                            <h4 class="accordion_title">{{ $faq->question }}</h4>
                                            <span class="accordion_tab_icon">
                                    <i class="open_icon ion-ios-plus-empty"></i>
                                    <i class="close_icon ion-ios-minus-empty"></i>
                                </span>
                                        </div>
                                        <div class="accordion_info">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
