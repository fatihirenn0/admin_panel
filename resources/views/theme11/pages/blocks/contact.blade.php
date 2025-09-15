<!-- Fluid Section One -->
<section class="fluid-section-one">
    <div class="side-icon static-image"><img src="/theme11/images/icons/fluid-icon.png" alt="{{ __('Anasayfa İletişim Formu Arka Plan İkonu') }}" /></div>
    <div class="outer-container clearfix">
        <!-- Image Column -->
        <div class="image-column clearfix static-image" style="background-image: url(/theme11/images/resource/image-1.jpg);" alt="{{ __('Anasayfa Sıkça Sorulan Sorular Görseli') }}">
            <div class="inner-column">
                <div class="sec-title light">
                    <h2>{{ __('Sıkça Sorulan Sorular') }}</h2>
                    <div class="text">{{ __('Merak Ettiklerinizin Yanıtı Burada') }}</div>
                </div>

                <!-- Accordian Box -->
                <ul class="accordion-box">
                    @foreach($allFaqs->take(5) as $indexFaq)
                        <!-- Block -->
                        <li class="accordion block {{ $loop->first ? 'active-block' : '' }}">
                            <div class="acc-btn {{ $loop->first ? 'active' : '' }}">
                                <div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>
                                {{ $indexFaq->question }}
                            </div>
                            <div class="acc-content {{ $loop->first ? 'current' : '' }}">
                                <div class="content">
                                    <div class="accordian-text">{{ $indexFaq->answer }}</div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Content Column -->
        <div class="content-column">
            <div class="inner-column">
                <div class="sec-title">
                    <h2>{{ __('İletişim Formu') }}</h2>
                </div>

                <!-- Default Form -->
                <div class="default-form">
                    <form method="post" action="{{ route('site.contact.message') }}">
                        @csrf @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input name="telephone" class="@error('telephone') is-invalid @enderror" type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input name="subject" class="g-input @error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message" class="@error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                                    <span class="txt">{{ __('Gönder') }}<i class="arrow flaticon-right"></i></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Default Form -->
            </div>
        </div>
    </div>
</section>
<!-- Fluid Section One -->
