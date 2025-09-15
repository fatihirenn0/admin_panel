<head>
    <meta charset="utf-8">

    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>
    <!-- Stylesheets -->
    <link href="/theme11/css/bootstrap.css" rel="stylesheet">
    <link href="/theme11/css/style.css" rel="stylesheet">
    <link href="/theme11/css/responsive.css" rel="stylesheet">

    <link href="/theme11/css/css2?family=Bellefair&family=Open+Sans:wght@300;400;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="/storage/{{ $settings->get('favicon') }}" type="image/x-icon">
    <link rel="icon" href="/storage/{{ $settings->get('favicon') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))"><meta name="author" content="Themexriver">

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="/theme11/js/respond.js"></script><![endif]-->
</head>
