<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">
    <meta name="author" content="">

    <!-- Page Title -->
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>

    <!-- Favicon and touch Icons -->
    <link href="/storage/{{ $settings->get('favicon') }}" rel="shortcut icon" type="image/png">
    <link href="/theme16/images/apple-touch-icon.html" rel="apple-touch-icon">
    <link href="/theme16/images/apple-touch-icon-72x72.html" rel="apple-touch-icon" sizes="72x72">
    <link href="/theme16/images/apple-touch-icon-114x114.html" rel="apple-touch-icon" sizes="114x114">
    <link href="/theme16/images/apple-touch-icon-144x144.html" rel="apple-touch-icon" sizes="144x144">

    <!-- Lead Style -->
    <link href="/theme16/css/style.css" rel="stylesheet" type="text/css">
</head>
