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
                    <small class="fw-medium">Ayarlar</small>
                    <div class="bs-stepper wizard-numbered mt-2">
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
                                    <div class="row g-6">
                                        <div class="col-sm-12">
                                            @include('inputs.input',[
                                                'title'=>__('Site Başlığı'),
                                                'name'=>"title[{}]",
                                                'value' => old('title',$settings->firstWhere('key','title')?->value)
                                            ])
                                            <label class="form-label" for="name">Site Başlığı</label>
                                            <input type="text" id="name" class="form-control" value="{{ old('name',$settings->firstWhere('key','name')?->value) }}" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="google_map_link">Google Map link</label>
                                            <input type="url" id="google_map_link"  class="form-control" value="{{ old('google_map_link',$settings->firstWhere('key','google_map_link')?->value) }}"/>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="google_anayltics">Google Analytics</label>
                                            <div class="input-group input-group-merge">
                                                <input type="url" id="google_anayltics" class="form-control" value="{{ old('google_analytics',$settings->firstWhere('key','google_analytics')?->value) }}"/>
                                                <span class="input-group-text cursor-pointer" id="google_anayltics">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="row g-6">
                                        <div class="col-sm-12">
                                            <label class="form-label" for="first-name">Telefon 1</label>
                                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="first-name">Telefon 2</label>
                                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="first-name">Telefon 2</label>
                                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="first-name">Mail 1</label>
                                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="first-name">Mail 2</label>
                                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="first-name">Whatsapp</label>
                                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="first-name">Adres</label>
                                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Social Links -->
                                <div id="social-links" class="content">
                                    <div class="row g-6">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="twitter">Twitter</label>
                                            <input
                                                type="text"
                                                id="twitter"
                                                class="form-control"
                                                placeholder="https://twitter.com/abc" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="facebook">Facebook</label>
                                            <input
                                                type="text"
                                                id="facebook"
                                                class="form-control"
                                                placeholder="https://facebook.com/abc" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="google">İnstagram</label>
                                            <input
                                                type="text"
                                                id="google"
                                                class="form-control"
                                                placeholder="https://plus.google.com/abc" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="linkedin">LinkedIn</label>
                                            <input
                                                type="text"
                                                id="linkedin"
                                                class="form-control"
                                                placeholder="https://linkedin.com/abc" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="facebook">Youtube</label>
                                            <input
                                                type="text"
                                                id="facebook"
                                                class="form-control"
                                                placeholder="https://facebook.com/abc" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="google">Tiktok</label>
                                            <input
                                                type="text"
                                                id="google"
                                                class="form-control"
                                                placeholder="https://plus.google.com/abc" />
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-success btn-submit mt-2">Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-5 mb-6">
                    <div class="bs-stepper wizard-numbered mt-2">
                    <div class="row">
                        <div class="col-md-6">
                            @include('inputs.file',[
                                'title'=>__('Kapak Resmi'),
                                'name'=>"image[{}]",
                                'cropWidth' => 1200,
                                'cropHeight' => 800,
                                'loopIndex' => 0
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('inputs.file',[
                                'title'=>__('Favicon'),
                                'name'=>"image[{}]",
                                'cropWidth' => 1200,
                                'cropHeight' => 800,
                                'loopIndex' => 0
                            ])
                        </div>
                        <div class="col-12 mt-2">
                            @include('inputs.textarea',[
                                'title'=>__('Meta Anahtar Kelimeler'),
                                'name'=>"meta_keywords[{}]",
                            ])
                        </div>
                        <div class="col-12 mt-2">
                            @include('inputs.textarea',[
                                'title'=>__('Meta Açıklamalar'),
                                'name'=>"meta_description[{}]"
                            ])
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
