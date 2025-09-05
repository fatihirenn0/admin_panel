<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">

    <!-- Title & Favicon -->
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <link rel="shortcut icon" href="/theme5/img/core-img/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="/theme5/css2?family=DM+Serif+Display:ital@0;1&family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/theme5/css/animate.css">
    <link rel="stylesheet" href="/theme5/css/tabler-icons.min.css">
    <link rel="stylesheet" href="/theme5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/theme5/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/theme5/css/style.css">
</head>
