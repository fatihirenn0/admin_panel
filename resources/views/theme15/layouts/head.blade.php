<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="@yield('meta_keywords',$settings->get('meta_keywords_'.app()->getLocale()))">
    <meta name="description" content="@yield('meta_description',$settings->get('meta_description_'.app()->getLocale()))">
    <meta name="author" content="ThemeMascot"/>

    <!-- Page Title -->
    <title>@yield('title',$settings->get('title_'.app()->getLocale()))</title>

    <!-- Favicon and Touch Icons -->
    <link href="/storage/{{ $settings->get('favicon') }}" rel="shortcut icon" type="image/png">
    <link href="/theme15/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/theme15/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="/theme15/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="/theme15/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="/theme15/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/theme15/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="/theme15/css/javascript-plugins-bundle.css" rel="stylesheet"/>

    <!-- CSS | menuzord megamenu skins -->
    <link href="/theme15/js/menuzord/css/menuzord.css" rel="stylesheet"/>

    <!-- CSS | timeline -->
    <link href="/theme15/js/timeline-cp-responsive-vertical/timeline-cp-responsive-vertical.css" rel="stylesheet" type="text/css">

    <!-- CSS | Main style file -->
    <link href="/theme15/css/style-main.css" rel="stylesheet" type="text/css">
    <link id="menuzord-menu-skins" href="/theme15/js/menuzord/css/skins/menuzord-rounded-boxed.css" rel="stylesheet"/>

    <!-- CSS | Responsive media queries -->
    <link href="/theme15/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->

    <!-- CSS | Theme Color -->
    <link href="/theme15/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="/theme15/js/jquery.js"></script>
    <script src="/theme15/js/bootstrap.min.js"></script>
    <script src="/theme15/js/javascript-plugins-bundle.js"></script>
    <script src="/theme15/js/menuzord/js/menuzord.js"></script>

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="/theme15/js/revolution-slider/css/rs6.css">
    <!-- REVOLUTION LAYERS STYLES -->
    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript" src="/theme15/js/revolution-slider/js/revolution.tools.min.js"></script>
    <script type="text/javascript" src="/theme15/js/revolution-slider/js/rs6.min.js"></script>

    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
