@extends('theme19.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')

    <!-- Practice Area -->
    <section class="faq-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-banner">
                        <div class="faq-headding-title">
                            <h3>{{ __('Hukuki Sorularınız mı Var?') }}</h3>
                            <h4>{{ __('Cevaplarınız Biz De!') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($faqCategories) > 0)
                    <div class="col-lg-6">
                        <div class="accordion accordion-custom" id="accordionFaqCustom">
                            @foreach($faqCategories as $faqCategory)
                                @foreach($faqCategory->faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#{{ $faq->id }}"
                                                    aria-expanded="false"
                                                    aria-controls="{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFaqCustom">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-lg-6">
                        <div class="accordion accordion-custom" id="accordionFaqCustom">
                            @foreach($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#{{ $faq->id }}"
                                                aria-expanded="false"
                                                aria-controls="{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFaqCustom">
                                        <div class="accordion-body">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="still-have-qution">
                <div class="headding">
                    <h5>{{ __('Sorularınız Mı Var?') }}</h5>
                    <p>{{ __('Bizimle İletişime Geçin') }}</p>
                </div>
                <div class="contact">
                    <a href='{{ route(getOtherFullLink('contact')) }}'>{{ __('Bize Ulaşın') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
