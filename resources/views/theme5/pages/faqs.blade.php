@extends('theme5.pages.build')
@section('title', __('Sıkça Sorulan Sorular'))
@section('content')

    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax statici-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" {{ __('Sıkça Sorulan Sorular Görseli') }}>
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ __('Sıkça Sorulan Sorular') }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Anasayfa') }}</a></li>
                    <li>{{ __('Sıkça Sorulan Sorular') }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-page-section bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="faq-accordion service-details-faq">
                        <div class="accordion" id="faqAccordion">
                            @if(!empty($faqCategories) && count($faqCategories) > 0) @foreach($faqCategories as $faqCategory)
                                <h4>{{ $faqCategory->name }}</h4>
                            <div class="accordion-item">
                                @foreach($faqCategory->faqs as $faq)
                                    <div class="accordion-header">
                                    <button class="accordion-button  {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $faq->id }}" aria-expanded=" {{ $loop->first ? 'true' : 'false' }}" aria-controls="{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </div>
                                @endforeach
                                <div id="{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                            @endforeach @else
                            <!-- Accordion -->
                            @foreach($faqs as $faq)
                                 <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button  {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $faq->id }}" aria-expanded=" {{ $loop->first ? 'true' : 'false' }}" aria-controls="{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </div>
                                <div id="{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                             @endforeach @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
    </div>

@endsection
