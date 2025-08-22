@extends('admin.pages.build')
@section('title',__('Ayarlar'))
@push('css')

    <link rel="stylesheet" href="/panel/assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="/panel/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="/panel/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/panel/assets/vendor/libs/@form-validation/form-validation.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-6">
                <!-- Default Wizard -->
                <div class="col-7 mb-6">
                    <div class="bs-stepper wizard-numbered">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Genel Ayarlar</span>
                          </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="icon-base ti tabler-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#personal-info">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">
                            <span class="bs-stepper-title">İletişim Bilgileri</span>
                          </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="icon-base ti tabler-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#social-links">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Sosyal Medya</span>
                          </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form onSubmit="return false">
                                <!-- Account Details -->
                                <div id="account-details" class="content">
                                    <div class="nav-align-top nav-tabs-shadow">
                                        <ul class="nav nav-tabs" role="tablist">
                                            @foreach($locales as $locale)
                                                <li class="nav-item">
                                                    <button
                                                        type="button"
                                                        class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                        role="tab"
                                                        data-bs-toggle="tab"
                                                        data-bs-target="#navs-locale-{{ $locale->locale }}"
                                                        aria-controls="navs-locale-{{ $locale->locale }}"
                                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                        {{ $locale->language }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            @foreach($locales as $locale)
                                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="navs-locale-{{ $locale->locale }}" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            @include('inputs.input',[
                                                                'title'=>__('Site Başlığı') . " (".$locale->language.")",
                                                                'name'=>"title_".$locale->locale,
                                                                'value' => old("title_".$locale->locale,$settings->firstWhere('key',"title_".$locale->locale)?->value)
                                                            ])
                                                        </div>
                                                        @if($loop->first)
                                                            <div class="col-sm-12 mt-3">
                                                                @include('inputs.input',[
                                                                    'title'=>__('Google Map link'),
                                                                    'name'=>"google_map_link",
                                                                    'value' => old('google_map_link',$settings->firstWhere('key','google_map_link')?->value)
                                                                ])
                                                            </div>
                                                            <div class="col-sm-12 mt-3">
                                                                @include('inputs.input',[
                                                                    'title'=>__('Google Analytics'),
                                                                    'name'=>"google_analytics",
                                                                    'value' => old('google_analytics',$settings->firstWhere('key','google_analytics')?->value)
                                                                ])
                                                            </div>
                                                        @endif
                                                        <div class="col-12 mt-2">
                                                            @include('inputs.textarea',[
                                                                'title'=>__('Meta Anahtar Kelimeler') . " (".$locale->language.")",
                                                                'name'=>"meta_keywords_".$locale->locale,
                                                            ])
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            @include('inputs.textarea',[
                                                                'title'=>__('Meta Açıklamalar') . " (".$locale->language.")",
                                                                'name'=>"meta_description_".$locale->locale
                                                            ])
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="row g-6">
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Telefon Numarası 1",
                                                'name'=>"telephone",
                                                'value' => old("telephone",$settings->firstWhere('key',"telephone")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Telefon Numarası 2",
                                                'name'=>"telephone2",
                                                'value' => old("telephone2",$settings->firstWhere('key',"telephone2")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Telefon Numarası 3",
                                                'name'=>"telephone3",
                                                'value' => old("telephone3",$settings->firstWhere('key',"telephone3")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "E-posta Adresi 1",
                                                'name'=>"email",
                                                'type' => 'email',
                                                'value' => old("email",$settings->firstWhere('key',"email")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "E-posta Adresi 2",
                                                'name'=>"email2",
                                                'type' => 'email',
                                                'value' => old("email2",$settings->firstWhere('key',"email2")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "E-posta Adresi 3",
                                                'name'=>"email3",
                                                'type' => 'email',
                                                'value' => old("email3",$settings->firstWhere('key',"email3")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Whatsapp",
                                                'name'=>"whatsapp",
                                                'value' => old("whatsapp",$settings->firstWhere('key',"whatsapp")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.textarea',[
                                                'title'=> "Adres",
                                                'name'=>"address",
                                                'value' => old("address",$settings->firstWhere('key',"address")?->value)
                                            ])
                                        </div>
                                    </div>
                                </div>
                                <!-- Social Links -->
                                <div id="social-links" class="content">
                                    <div class="row g-6">
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Facebook",
                                                'name'=>"facebook",
                                                'value' => old("facebook",$settings->firstWhere('key',"facebook")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Twitter/X",
                                                'name'=>"twitter",
                                                'value' => old("twitter",$settings->firstWhere('key',"twitter")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Youtube",
                                                'name'=>"youtube",
                                                'value' => old("youtube",$settings->firstWhere('key',"youtube")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Instagram",
                                                'name'=>"instagram",
                                                'value' => old("instagram",$settings->firstWhere('key',"instagram")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Linkedin",
                                                'name'=>"linkedin",
                                                'value' => old("linkedin",$settings->firstWhere('key',"linkedin")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Tiktok",
                                                'name'=>"tiktok",
                                                'value' => old("tiktok",$settings->firstWhere('key',"tiktok")?->value)
                                            ])
                                        </div>
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=> "Google İşletme",
                                                'name'=>"google_business",
                                                'value' => old("google_business",$settings->firstWhere('key',"google_business")?->value)
                                            ])
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-submit mt-2">Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-5 mb-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('inputs.file',[
                                        'title'=>__('Renkli Logo'),
                                        'name'=>"logo",
                                        'loopIndex' => 0,
                                        'value' => '/storage/'.$settings->firstWhere('key','logo')?->value
                                    ])
                                </div>
                                <div class="col-md-12">
                                    @include('inputs.file',[
                                        'title'=>__('Beyaz Logo'),
                                        'name'=>"logo_white",
                                        'loopIndex' => 0,
                                        'value' => '/storage/'.$settings->firstWhere('key','logo_white')?->value
                                    ])
                                </div>
                                <div class="col-md-12">
                                    @include('inputs.file',[
                                        'title'=>__('Footer Logo'),
                                        'name'=>"footer_logo",
                                        'loopIndex' => 0,
                                        'value' => '/storage/'.$settings->firstWhere('key','footer_logo')?->value
                                    ])
                                </div>
                                <div class="col-md-12">
                                    @include('inputs.file',[
                                        'title'=>__('Favicon'),
                                        'name'=>"favicon",
                                        'loopIndex' => 0,
                                        'value' => '/storage/'.$settings->firstWhere('key','favicon')?->value
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Default Wizard -->
            </div>
        </form>
    </div>
@endsection
@push('js')

    <script src="/panel/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="/panel/assets/vendor/libs/select2/select2.js"></script>
    <script src="/panel/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="/panel/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="/panel/assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="/panel/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="/panel/assets/js/form-wizard-numbered.js"></script>
    <script src="/panel/assets/js/form-wizard-validation.js"></script>

@endpush
