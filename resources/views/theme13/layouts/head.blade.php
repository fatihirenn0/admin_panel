<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))"><meta name="author" content="Themexriver">
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <link rel="shortcut icon" href="/storage/{{ $settings->get('favicon') }}" type="image/x-icon">
    <link rel="stylesheet" href="/theme13/fonts/tabler.min.css">
    <link rel="stylesheet" href="/theme13/css/swiper.min.css">
    <link rel="stylesheet" href="/theme13/css/odometer.min.css">
    <link rel="stylesheet" href="/theme13/css/magnific-popup.css">
    <link rel="stylesheet" href="/theme13/css/nice-select2.css">
    <link rel="stylesheet" href="/theme13/css/glightbox.min.css">
    <script defer="" src="/theme13/js/main.js"></script>
    <link href="/theme13/css/style.css" rel="stylesheet"></head>
