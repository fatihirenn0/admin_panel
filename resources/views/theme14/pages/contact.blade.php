@extends('theme14.pages.build')
@section('title',__('İletişim'))
@section('content')
<!-- Breadcrumb area start here -->
<section class="breadcrumb-area static-image" data-background="/theme14/images/banner/banner-inner.jpg" alt="{{ __('İletişim Sayfası Görseli') }}">
    <div class="container">
        <div class="breadcrumb__wrp">
            <div class="breadcrumb__item">
                <h1 class="title">{{ __('İletişim') }}</h1>
                <ul>
                    <li><a href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li><i class="fa-light fa-angle-right"></i></li>
                    <li>{{ __('İletişim') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area end here -->

<!-- Contact area start here -->
<section class="contact-two-area pt-130 pb-130 bg-sub">
    <div class="container-lg">
        <div class="row g-4 g-xl-0 align-items-center">
            <div class="col-xl-6 order-2 order-xl-1">
                <div class="contact-two-left">
                    <div class="contact-two__content">
                        <div class="section-header mb-20">
                            <h2 class="wow splt-txt" data-splitting>{{ __('Bize Ulaşın') }}</h2>
                        </div>
                        <ul>
                            <li class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.50079 0C4.50533 0 2.06836 2.43697 2.06836 5.4324C2.06836 9.14982 6.92985 14.6072 7.13684 14.8377C7.33125 15.0543 7.67068 15.0539 7.86475 14.8377C8.07173 14.6072 12.9332 9.14982 12.9332 5.4324C12.9332 2.43697 10.4962 0 7.50079 0ZM7.50079 8.1656C5.9937 8.1656 4.76763 6.93949 4.76763 5.4324C4.76763 3.92531 5.99373 2.69924 7.50079 2.69924C9.00785 2.69924 10.2339 3.92534 10.2339 5.43243C10.2339 6.93952 9.00785 8.1656 7.50079 8.1656Z"
                                        fill="#121C27" />
                                </svg>

                                {{ $settings->get('address') }}
                            </li>
                            <li class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.71865 8.12305L8.46237 9.38357C7.95293 9.8948 7.05656 9.90582 6.5361 9.38357L5.27977 8.12305L0.767578 12.6499C0.935537 12.7275 1.12072 12.7739 1.3176 12.7739H13.6809C13.8778 12.7739 14.0629 12.7276 14.2308 12.6499L9.71865 8.12305Z"
                                        fill="#121C27" />
                                    <path
                                        d="M13.6808 2.22656H1.31754C1.12066 2.22656 0.935479 2.27291 0.767578 2.35058L5.58917 7.18816C5.58949 7.18849 5.58987 7.18855 5.5902 7.18887C5.59052 7.18919 5.59058 7.18963 5.59058 7.18963L7.15834 8.76258C7.32486 8.9291 7.67355 8.9291 7.84008 8.76258L9.40752 7.18989C9.40752 7.18989 9.4079 7.18919 9.40822 7.18887C9.40822 7.18887 9.40893 7.18849 9.40925 7.18816L14.2307 2.35055C14.0628 2.27285 13.8777 2.22656 13.6808 2.22656Z"
                                        fill="#121C27" />
                                    <path
                                        d="M0.140215 2.96484C0.0533203 3.14057 0 3.33563 0 3.54457V11.4547C0 11.6637 0.0532617 11.8587 0.140186 12.0345L4.6602 7.49979L0.140215 2.96484Z"
                                        fill="#121C27" />
                                    <path
                                        d="M14.8598 2.96484L10.3398 7.49985L14.8598 12.0346C14.9467 11.8588 15 11.6638 15 11.4548V3.54463C15 3.33563 14.9467 3.14057 14.8598 2.96484Z"
                                        fill="#121C27" />
                                </svg>
                                <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__" >{{ $settings->get('email') }}</span></a>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <svg height="15" width="15" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M130.344,129.778c-27.425,17.786-32.812,73.384-22.459,118.698c8.064,35.288,25.208,82.623,54.117,127.198 c27.196,41.933,65.138,79.532,94.069,101.286c37.151,27.934,90.112,45.688,117.537,27.902c13.868-8.994,34.47-33.567,35.41-37.976 c0,0-12.082-18.629-14.733-22.716l-40.516-62.47c-3.011-4.642-21.892-0.399-31.484,5.034 c-12.938,7.331-24.854,27.001-24.854,27.001c-8.872,5.125-16.302,0.019-31.828-7.126c-19.081-8.779-40.535-36.058-57.609-60.765 c-15.595-25.666-31.753-56.38-31.988-77.382c-0.192-17.09-1.824-25.957,6.473-31.967c0,0,22.82-2.858,34.79-11.681 c8.872-6.542,20.447-22.051,17.436-26.693l-40.515-62.47c-2.651-4.088-14.733-22.716-14.733-22.716 C175.05,111.994,144.211,120.784,130.344,129.778z"></path> <path class="st0" d="M360.036,176.391c16.488-67.201-22.687-135.921-88.913-155.97L276.715,0 c77.488,23.14,123.308,103.517,103.742,181.983L360.036,176.391z"></path> <path class="st0" d="M315.781,164.273c9.845-42.802-14.93-86.262-56.776-99.596l5.594-20.428 c53.106,16.435,84.524,71.548,71.61,125.618L315.781,164.273z"></path> <path class="st0" d="M271.466,152.138c3.288-18.373-7.111-36.616-24.596-43.147l5.605-20.468 c28.724,9.694,45.751,39.564,39.459,69.22L271.466,152.138z"></path> </g> </g></svg>
                                <a href="tel:{{ $settings->get('telephone') }}"><span class="telephone" >{{ $settings->get('telephone') }}</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-two__form">
                        <form action="{{ route('site.contact.message') }}" method="post">@csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row g-4 mb-4">
                                <div class="col-6">
                                    <div class="input">
                                        <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required />
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input">
                                        <input name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required />
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input">
                                        <input name="telephone" class="@error('telephone') is-invalid @enderror" type="tel" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required />
                                        @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input">
                                        <input name="subject" class="@error('subject') is-invalid @enderror" type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required />
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="textarea">
                                <textarea name="message" class="@error('message') is-invalid @enderror" rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn-one mt-50" data-splitting data-text="{{ __('Gönder') }}">{{ __('Gönder') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 order-1 order-xl-2">
                <div class="contact-two__map">
                    @if($settings->get('google_map_link'))
                        <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact area end here -->
@endsection
