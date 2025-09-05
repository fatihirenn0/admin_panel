<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">
    <!-- ======== Page title ============ -->
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="/theme2/img/favicon.svg">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="/theme2/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="/theme2/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="/theme2/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="/theme2/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="/theme2/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="/theme2/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="/theme2/css/nice-select.css">
    <!--<< Color.css >>-->
    <link rel="stylesheet" href="/theme2/css/color.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="/theme2/css/main.css">
</head>
