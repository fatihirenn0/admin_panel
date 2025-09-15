<head>
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <meta charset="utf-8">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- FavIcon Link -->
    <link rel="icon" href="/storage/{{ $settings->get('favicon') }}" type="image/gif" sizes="16x16">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" type="text/css" href="/theme17/css/bootstrap.min.css">

    <!-- Swiper Slider CSS Link -->
    <link rel="stylesheet" type="text/css" href="/theme17/css/swiper-bundle.min.css">

    <!-- Fancybox CSS Link -->
    <link rel="stylesheet" type="text/css" href="/theme17/css/jquery.fancybox.min.css">

    <!-- Wow Animation CSS Link -->
    <link rel="stylesheet" type="text/css" href="/theme17/css/animate.css">

    <!-- Main Style CSS Link -->
    <link rel="stylesheet" type="text/css" href="/theme17/css/style.css">
</head>
