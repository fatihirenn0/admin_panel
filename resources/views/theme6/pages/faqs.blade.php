@extends('theme6.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <img src="/theme6/img/bg/practice-breadcrumb-bg.jpg" alt="" />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grerbin-breadcrumb">
                        <h3>{{ __('Sıkça Sorulan Sorular') }}</h3>
                        <ul class="bc-list">
                            <li><a href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                            <li>{{ __('Sıkça Sorulan Sorular') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb Area -->

    <!-- Faq Area -->
    <section class="faq-area">
        <div class="container">
            <div class="faq-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="faq-box">
                            <!--Accordion wrapper-->
                            <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                <div class="row">
                                    @if(!empty($faqCategories) && count($faqCategories) > 0) @foreach($faqCategories as $faqCategory)
                                        <div class="col-md-6">
                                            <h4>{{ $faqCategory->name }}</h4>
                                            @foreach($faqCategory->faqs as $faq)
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-{{ $faq->id }}">
                                                        <a
                                                            class="{{ $loop->first ? '' : 'collapsed' }}"
                                                            data-toggle="collapse"
                                                            data-parent="#accordionEx"
                                                            href="#faq-{{ $faq->id }}"
                                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                            aria-controls="faq-{{ $faq->id }}"
                                                        >
                                                            <h5>{{ $faq->question }}<i class="fa fa-minus" aria-hidden="true"></i></h5>
                                                        </a>
                                                    </div>
                                                    <div id="faq-{{ $faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" role="tabpanel" aria-labelledby="heading-{{ $faq->id }}" data-parent="#accordionEx">
                                                        <div class="card-body">
                                                            <p>{{ $faq->answer }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach @else
                                        @foreach($faqs as $faq)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="heading-{{ $faq->id }}">
                                                    <a
                                                        class="{{ $loop->first ? '' : 'collapsed' }}"
                                                        data-toggle="collapse"
                                                        data-parent="#accordionEx"
                                                        href="#faq-{{ $faq->id }}"
                                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                        aria-controls="faq-{{ $faq->id }}"
                                                    >
                                                        <h5>{{ $faq->question }}<i class="fa fa-minus" aria-hidden="true"></i></h5>
                                                    </a>
                                                </div>
                                                <div id="faq-{{ $faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" role="tabpanel" aria-labelledby="heading-{{ $faq->id }}" data-parent="#accordionEx">
                                                    <div class="card-body">
                                                        <p>{{ $faq->answer }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach @endif
                                </div>
                            </div>
                            <!-- Accordion wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Faq Area -->
@endsection
