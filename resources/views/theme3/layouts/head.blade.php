<head>
    <meta charset="utf-8">
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <!-- Stylesheets -->
    <link href="/theme3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/theme3/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
    <link href="/theme3/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
    <link href="/theme3/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
    <link href="/theme3/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="/theme3/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/theme3/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]
    <script src="/theme3/js/respond.js"></script> -->
</head>
