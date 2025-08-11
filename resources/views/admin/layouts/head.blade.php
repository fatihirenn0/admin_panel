<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

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

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/panel/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="/panel/assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="/panel/assets/js/config.js"></script>
    <link  href="/panel/assets/css/cropper.min.css" rel="stylesheet">
    <link  href="/panel/assets/css/panel.css" rel="stylesheet">
    <link rel="stylesheet" href="/panel/assets/vendor/libs/notyf/notyf.css" />
    <link rel="stylesheet" href="/panel/assets/vendor/libs/sweetalert2/sweetalert2.css" />
    @stack('css')
</head>
