<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">
    <!-- Favicon img -->
    <link rel="shortcut icon" href="/storage/{{ $settings->get('favicon') }}" type="image/x-icon">
    <link rel="icon" href="/storage/{{ $settings->get('favicon') }}" type="image/x-icon">
    <!-- Bootstarp min css -->
    <link rel="stylesheet" href="/theme1/css/bootstrap.min.css">
    <!-- Mean menu css -->
    <link rel="stylesheet" href="/theme1/css/meanmenu.css">
    <!-- All min css -->
    <link rel="stylesheet" href="/theme1/css/all.min.css">
    <!-- Swiper bundle min css -->
    <link rel="stylesheet" href="/theme1/css/swiper-bundle.min.css">
    <!-- Magnigic popup css -->
    <link rel="stylesheet" href="/theme1/css/magnific-popup.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="/theme1/css/animate.css">
    <!-- Splitting css -->
    <link rel="stylesheet" href="/theme1/css/splitting.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="/theme1/css/nice-select.css">
    <!-- Style css -->
    <link rel="stylesheet" href="/theme1/css/style.css">
</head>
