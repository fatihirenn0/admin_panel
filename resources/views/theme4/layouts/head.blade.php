<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <!-- favicons Icons -->
    <link rel="shortcut icon" href="/storage/{{ $settings->get('favicon') }}" type="image/x-icon">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="/theme4/css2?family=Marcellus&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Whisper&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/theme4/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/theme4/vendors/bootstrap-select/bootstrap-select.min.css">
    <link rel="stylesheet" href="/theme4/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="/theme4/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/theme4/vendors/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="/theme4/vendors/jarallax/jarallax.css">
    <link rel="stylesheet" href="/theme4/vendors/jquery-magnific-popup/jquery.magnific-popup.css">
    <link rel="stylesheet" href="/theme4/vendors/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="/theme4/vendors/nouislider/nouislider.pips.css">
    <link rel="stylesheet" href="/theme4/vendors/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" href="/theme4/vendors/procounsel-icons/style.css">
    <link rel="stylesheet" href="/theme4/vendors/slick/slick.css">
    <link rel="stylesheet" href="/theme4/vendors/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/theme4/vendors/owl-carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- template styles -->
    <link rel="stylesheet" href="/theme4/css/procounsel.css">
</head>
