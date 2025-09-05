<!doctype html>

<html
    lang="en"
    class="layout-wide customizer-hide"
    dir="ltr"
    data-skin="default"
    data-assets-path="/panel/assets/"
    data-template="vertical-menu-template"
    data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> Giriş Yap</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/panel/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/panel/assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="/panel/assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="/panel/assets/vendor/libs/pickr/pickr-themes.css" />

    <link rel="stylesheet" href="/panel/assets/vendor/css/core.css" />
    <link rel="stylesheet" href="/panel/assets/css/demo.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="/panel/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

    <!-- Vendor -->
    <link rel="stylesheet" href="/panel/assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/panel/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="/panel/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="/panel/assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="/panel/assets/js/config.js"></script>
</head>

<body>
<!-- Content -->
@php
    $images = [
        [
            'title' => 'Iğdır',
            'path' => '/panel/assets/img/login/igdir.jpg'
        ],
        [
            'title' => 'İstanbul',
            'path' => '/panel/assets/img/login/istanbul.jpg'
        ],
        [
            'title' => 'İstanbul',
            'path' => '/panel/assets/img/login/istanbul2.jpg'
        ],
        [
            'title' => 'İzmir',
            'path' => '/panel/assets/img/login/izmir.jpg'
        ],
        [
            'title' => 'Konya',
            'path' => '/panel/assets/img/login/konya.jpg'
        ],
        [
            'title' => 'Mardin',
            'path' => '/panel/assets/img/login/mardin.jpg'
        ],
        [
            'title' => 'Nevşehir',
            'path' => '/panel/assets/img/login/nevsehir.jpg'
        ],
        [
            'title' => 'Rize',
            'path' => '/panel/assets/img/login/rize.jpg'
        ],
    ];
    $rand = rand(0,count($images) - 1);

@endphp
<div class="authentication-wrapper authentication-cover">
    <!-- /Logo -->
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-xl-flex col-xl-8 p-0">
            <div class="auth-cover-bg d-flex justify-content-center align-items-center"
                 style="background-image: url('{{ $images[$rand]['path'] }}');
                background-size: cover;
                background-position: center;
                width: 100%;
                height: 100vh;">
                <!-- İsterseniz buraya ekstra içerik koyabilirsiniz -->
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
            <div class="w-px-400 mx-auto mt-12 pt-5">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <h4 class="mb-1">Hoşgeldiniz! 👋</h4>
                <p class="mb-6">Devam etmek için lütfen giriş yapınız.</p>

                    <form id="formAuthentication" class="mb-6" action="{{ route('admin.loginPost') }}" method="POST">
                        <input type="hidden" name="return_url" value="{{ $_GET['return_url'] ?? '' }}">
                        @csrf

                        <div class="mb-6 form-control-validation">
                            <label for="email" class="form-label">E-posta Adresi</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   required value="{{ old('email') }}" autofocus />
                        </div>

                        <div class="mb-6 form-password-toggle form-control-validation">
                            <label class="form-label" for="password">Şifre</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control"
                                       name="password" required aria-describedby="password" />
                                <span class="input-group-text cursor-pointer">
                                    <i class="icon-base ti tabler-eye-off"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-6 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} name="remember">
                                <label class="form-check-label" for="remember">Beni hatırla</label>
                            </div>
                        </div>

                        <button class="btn btn-primary d-grid w-100">Giriş Yap</button>
                    </form>

                    <small class="mt-3">Görsel: <span class="text-primary">{{ $images[$rand]['title'] }}/Türkiye</span></small>
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/theme.js -->

<script src="/panel/assets/vendor/libs/jquery/jquery.js"></script>

<script src="/panel/assets/vendor/libs/popper/popper.js"></script>
<script src="/panel/assets/vendor/js/bootstrap.js"></script>
<script src="/panel/assets/vendor/libs/node-waves/node-waves.js"></script>

<script src="/panel/assets/vendor/libs/@algolia/autocomplete-js.js"></script>

<script src="/panel/assets/vendor/libs/pickr/pickr.js"></script>

<script src="/panel/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="/panel/assets/vendor/libs/hammer/hammer.js"></script>

<script src="/panel/assets/vendor/libs/i18n/i18n.js"></script>

<script src="/panel/assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="/panel/assets/vendor/libs/@form-validation/popular.js"></script>
<script src="/panel/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="/panel/assets/vendor/libs/@form-validation/auto-focus.js"></script>

<!-- Main JS -->

<script src="/panel/assets/js/main.js"></script>

<!-- Page JS -->
<script src="/panel/assets/js/pages-auth.js"></script>
</body>
</html>
