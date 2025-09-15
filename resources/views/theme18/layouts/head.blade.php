<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/theme18/css/bootstrap.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="/theme18/css/meanmenu.css">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="/theme18/css/icofont.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/theme18/css/nice-select.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/theme18/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/theme18/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/theme18/css/magnific-popup.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="/theme18/fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/theme18/css/animate.min.css">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="/theme18/css/odometer.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/theme18/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/theme18/css/responsive.css">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="/theme18/css/theme-dark.css">

    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>

    <link rel="icon" type="image/png" href="/storage/{{ $settings->get('favicon') }}">
</head>
