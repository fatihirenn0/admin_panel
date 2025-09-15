<!-- FAQ area start here -->
<section class="faq-one-area pt-130 pb-100">
    <div class="faq-one__bg">
        <img class="static-bg-image" src="/theme14/images/faq/faq-one-bg.png" alt="{{ __('Anasayfa Sıkça Sorulan Sorular Arka Plan Görseli') }}" />
    </div>
    <div class="faq-one__image">
        <img class="animation__arryLeftRight static-image" src="/theme14/images/faq/faq-one-image.png" alt="{{ __('Anasayfa Sıkça Sorulan Sorular Görseli') }}" />
    </div>
    <div class="container">
        <div class="faq-one__wrp">
            <div class="row g-5 g-lg-4 justify-content-between">
                <div class="col-lg-4">
                    <div class="faq-one-left">
                        <div class="section-header">
                            <h6>{{ __('Sıkça Sorulan Sorular') }}</h6>
                            <h2 class="wow splt-txt" data-splitting>{{ __('Hukuki Sorularınız mı Var? Cevapları Burada!') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                                {{ __('Ofisimiz, danışmanlık ve hukuk alanındaki tüm sorularınızı yanıtlamak için burada. Aklınıza takılan başka konular varsa bizimle iletişime geçmekten çekinmeyin!') }}
                            </p>
                        </div>
                        <a href="{{ route(getResourceFullLink('faqs')) }}" class="btn-show-all wow fadeInUp mt-50" data-wow-delay="200ms" data-wow-duration="1500ms" data-splitting data-text="{{ __('Daha Fazlası') }}">
                            {{ __('Daha Fazlası') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="faq-one__accordion">
                        <div class="section-header mb-30">
                            <h6>{{ __('Sıkça Sorulan Sorular') }}</h6>
                            <h2 class="wow splt-txt" data-splitting>{{ __('Bizi Daha Yakından Tanıyın') }}</h2>
                        </div>
                        <div class="accordion" id="accordionExample">
                            @foreach($allFaqs as $indexFaq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ $indexFaq->id ?? $loop->index }}">
                                        <button
                                            class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $indexFaq->id ?? $loop->index }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse-{{ $indexFaq->id ?? $loop->index }}"
                                        >
                                            {{ $indexFaq->question }}
                                        </button>
                                    </h2>

                                    <div
                                        id="collapse-{{ $indexFaq->id ?? $loop->index }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        aria-labelledby="heading-{{ $indexFaq->id ?? $loop->index }}"
                                        data-bs-parent="#accordionExample"
                                    >
                                        <div class="accordion-body">
                                            <p class="mb-0">{{ $indexFaq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ area end here -->
