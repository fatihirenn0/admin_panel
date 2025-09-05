@extends('theme5.pages.build')
@section('title',__('İletişim'))
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section bg-img jarallax static-image" data-jarallax="" data-speed="0.6" style="background-image: url('/theme5/img/bg-img/73.jpg');" alt="{{__('İletişim Sayfası Görseli')}}">
        <div class="divider"></div>
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">{{ __('İletişim') }}</h2>
                <ul class="list-unstyled wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <li><a class="magnet-link" href="{{ route('site.index') }}">{{ __('Ana Sayfa') }}</a></li>
                    <li>{{ __('İletişim') }}</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
    </div>

    <!-- Contact Wrapper -->
    <div class="contact-section bg-white">
        <div class="divider"></div>

        <div class="container">
            <div class="row g-4 justify-content-between">
                <div class="col-12 col-md-6">
                    <!-- Contact Form -->
                    <div class="contact-form style-two bg-dark wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <div class="mb-4 contact-title text-white">{{ __('Bize Ulaşın') }}</div>

                        <!-- Form -->
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
                            <div class="row g-4">
                                <div class="col-12 col-lg-6">
                                    <input name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" type="text" placeholder="{{ __('Ad Soyad') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" type="email" placeholder="{{ __('E-posta Adresi') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                           type="text" value="{{ old('telephone') }}" placeholder="{{ __('Telefon Numarası') }}" required>
                                    @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input name="subject" class="form-control @error('subject') is-invalid @enderror"
                                           type="text" value="{{ old('subject') }}" placeholder="{{ __('Konu') }}" required>
                                    @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                              rows="7" placeholder="{{ __('Mesaj') }}" required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">
                                        <span>{{ __('Gönder') }} <i class="ti ti-arrow-up-right"></i></span>
                                        <span>{{ __('Gönder') }} <i class="ti ti-arrow-up-right"></i></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-5">
                    <!-- Contact Small Card -->
                    <div class="contact-small-card mb-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewbox="0 0 44 44" fill="none">
                            <g clip-path="url(#clip0_1_1367)">
                                <mask id="mask0_1_1367" style="mask-type:luminance" maskunits="userSpaceOnUse" x="0" y="0" width="44" height="44">
                                    <path d="M0 3.8147e-06H44V44H0V3.8147e-06Z" fill="white"></path>
                                </mask>
                                <g mask="url(#mask0_1_1367)">
                                    <path d="M39.6294 19.8746V5.09241H18.3906V42.1875H39.6294V27.4623" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M18.3888 42.1875H4.01172V19.3733H18.3888V42.1875Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M0.859375 42.1875H43.1406" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <path d="M9.93155 19.3711H4.00977V15.8139H9.93155V19.3711Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <mask id="mask1_1_1367" style="mask-type:luminance" maskunits="userSpaceOnUse" x="0" y="0" width="44" height="44">
                                    <path d="M0 3.8147e-06H44V44H0V3.8147e-06Z" fill="white"></path>
                                </mask>
                                <g mask="url(#mask1_1_1367)">
                                    <path d="M36.6567 5.08984H21.582V1.81356H36.6567V5.08984Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <path d="M26.678 13.5312H23.0352V9.88845H26.678V13.5312Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M34.7326 13.5312H31.0898V9.88845H34.7326V13.5312Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M26.678 21.043H23.0352V17.4002H26.678V21.043Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M34.7326 21.0469H31.0898V17.4041H34.7326V21.0469Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M26.678 28.5586H23.0352V24.9158H26.678V28.5586Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M34.7326 28.5586H31.0898V24.9158H34.7326V28.5586Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <mask id="mask2_1_1367" style="mask-type:luminance" maskunits="userSpaceOnUse" x="0" y="0" width="44" height="44">
                                    <path d="M0 3.8147e-06H44V44H0V3.8147e-06Z" fill="white"></path>
                                </mask>
                                <g mask="url(#mask2_1_1367)">
                                    <path d="M31.7386 42.1875H26.1348V34.1829H31.7386V42.1875Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.0504 42.1875H9.24023V37.4002H13.0504V42.1875Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <path d="M7.61719 23.0694V33.8359" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M11.1328 23.0694V33.8359" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M14.6543 23.0694V33.8359" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                            <defs>
                                <clippath id="clip0_1_1367">
                                    <rect width="44" height="44" rx="10" fill="white"></rect>
                                </clippath>
                            </defs>
                        </svg>

                        <div>
                            <div>{{ __('Adres') }}</div>
                            <p class="mb-0">{{ $settings->get('address') }}</p>
                        </div>
                    </div>

                    <!-- Contact Small Card -->
                    <div class="contact-small-card mb-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">
                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewbox="0 0 44 44" fill="none">
                            <g clip-path="url(#clip0_1_1410)">
                                <mask id="mask0_1_1410" style="mask-type:luminance" maskunits="userSpaceOnUse" x="0" y="0" width="44" height="44">
                                    <path d="M0 3.8147e-06H44V44H0V3.8147e-06Z" fill="white"></path>
                                </mask>
                                <g mask="url(#mask0_1_1410)">
                                    <path d="M38.5 10.3125L43.1406 14.9531V39.7031C43.1406 41.6016 41.6016 43.1406 39.7031 43.1406H4.29688C2.39843 43.1406 0.859375 41.6016 0.859375 39.7031V14.9531L5.5 10.3125" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M42.8817 15.2113L21.9603 36.1328L1.13477 15.3073" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.94922 42.0547L14.9157 29.0882" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M41.8086 41.8086L29.0469 29.0469" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M18.1051 0.862012H5.5V19.4531" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M38.5003 19.4531V0.862012H25.8398" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M24.9173 14.8019C24.9173 17.3051 23.3812 19.1797 21.5419 19.1797C19.7027 19.1797 18.0762 17.3312 18.0762 14.828C18.0762 12.3248 19.793 10.6569 21.6323 10.6569C23.4715 10.6569 24.9173 12.2988 24.9173 14.8019Z" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M21.8215 23.4141C18.1633 23.3129 14.8277 20.837 13.8372 17.0709C12.6941 12.7241 15.1944 8.18405 19.4772 6.82074C24.007 5.37879 28.8244 7.92718 30.1931 12.4619C30.6773 14.2764 30.3947 15.8549 29.7529 17.4686C29.4984 18.1085 28.6593 19.6063 26.7924 19.6063C25.7734 19.6063 24.9238 18.6295 24.9293 17.5047V10.3996" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </g>
                            <defs>
                                <clippath id="clip0_1_1410">
                                    <rect width="44" height="44" rx="10" fill="white"></rect>
                                </clippath>
                            </defs>
                        </svg>
                        <div>
                            <div>{{ __('E-Posta Adresi') }}</div>
                            <p class="mb-0">{{ $settings->get('email') }}</p>
                        </div>
                    </div>

                    <!-- Contact Small Card -->
                    <div class="contact-small-card wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="900ms">
                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewbox="0 0 44 44" fill="none">
                            <g clip-path="url(#clip0_1_1438)">
                                <mask id="mask0_1_1438" style="mask-type:luminance" maskunits="userSpaceOnUse" x="0" y="0" width="44" height="44">
                                    <path d="M0 3.8147e-06H44V44H0V3.8147e-06Z" fill="white"></path>
                                </mask>
                                <g mask="url(#mask0_1_1438)">
                                    <path d="M25.0449 0.86907C35.0231 0.86907 43.1408 8.98673 43.1408 18.9648" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M25.0449 6.03899C32.1718 6.03899 37.9708 11.838 37.9708 18.9648" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M25.0449 11.2099C29.3213 11.2099 32.7999 14.6886 32.7999 18.9648" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M25.0449 16.3798C26.4723 16.3798 27.6299 17.5375 27.6299 18.9648" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.1055 27.9141C16.1055 28.3887 15.7207 28.7734 15.2461 28.7734C14.7715 28.7734 14.3867 28.3887 14.3867 27.9141C14.3867 27.4395 14.7715 27.0547 15.2461 27.0547C15.7207 27.0547 16.1055 27.4395 16.1055 27.9141Z" fill="#E8BF96"></path>
                                    <path d="M12.7375 24.9742C12.1923 24.2581 11.6756 23.5186 11.189 22.7572C10.5497 21.7561 10.7431 20.4301 11.5826 19.5905L14.5003 16.6728C15.1284 16.0456 15.1284 15.0272 14.5003 14.3998L7.6338 7.53347C7.00645 6.90518 5.98818 6.90518 5.36084 7.53347L3.62309 9.27104C0.802711 12.0907 0.0404452 16.3944 1.81076 19.9677C4.96037 26.3262 11.4418 36.0732 23.9285 42.1963C27.5129 43.9529 31.8365 43.2078 34.6586 40.3857L36.4358 38.6084C37.064 37.9811 37.064 36.9628 36.4358 36.3345L29.5693 29.469C28.942 28.8407 27.9237 28.8407 27.2964 29.469L24.3788 32.3866C23.5391 33.2261 22.2132 33.4195 21.2119 32.7802C20.1289 32.088 19.0894 31.3345 18.0986 30.5243" stroke="#E8BF96" stroke-width="1.71875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </g>
                            <defs>
                                <clippath id="clip0_1_1438">
                                    <rect width="44" height="44" rx="10" fill="white"></rect>
                                </clippath>
                            </defs>
                        </svg>

                        <div>
                            <div>{{ __('Telefon Numarası') }}</div>
                            <p class="mb-0">{{ $settings->get('telephone') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>
    </div>

    <!-- Google Maps -->
    <div class="google-maps-container">
        @if($settings->get('google_map_link'))
            <div style="width: 100% !important;" class="map w-100">{!! $settings->get('google_map_link') !!}</div>
        @endif
    </div>

@endsection
