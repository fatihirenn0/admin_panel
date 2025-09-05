@extends('theme8.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
<!-- Faqs -->
<div class="mcgill-faqs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft"> <span class="heading-meta">{{ __('Cevaplarınız Biz De!') }}</span>
                <h2 class="mcgill-heading">{{ __('Sıkça Sorulan Sorular') }}</h2> </div>
        </div>
        <div class="row">
            <div class="col-md-7 faqs-accordion animate-box" data-animate-effect="fadeInLeft">
                <div class="accordion">
                    @if(!empty($faqCategories) && count($faqCategories) > 0) @foreach($faqCategories as $faqCategory)
                        @foreach($faqCategory->faqs as $faq)
                            <div class="item {{ $loop->first ? 'active' : '' }} ">
                            <div class="title">
                                <h6>{{ $faq->question }}</h6> </div>
                            <div class="accordion-info {{ $loop->first ? 'active' : '' }}" style="display: block;">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endforeach @else
                    @foreach($faqs as $faq)
                        <div class="item {{ $loop->first ? 'active' : '' }} ">
                        <div class="title">
                            <h6>{{ $faq->question }}</h6> </div>
                        <div class="accordion-info {{ $loop->first ? 'active' : '' }}" style="display: block;">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                    @endforeach @endif
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-5 animate-box" data-animate-effect="fadeInLeft"> <img class="static-image" src="/theme8/images/about.jpg" alt="{{ __('Sıkça Sorulan Sorular Görseli') }}"> </div>
        </div>
    </div>
</div>
@endsection
