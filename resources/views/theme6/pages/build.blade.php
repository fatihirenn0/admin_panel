<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme6.layouts.head')
<body>
<div id="preloader"></div>
<!-- Pages Settings -->
<div class="page-settings">
    <div class="psg-icon">
        <i class="fa fa-cog" aria-hidden="true"></i>
    </div>
    <div class="pgs-box">
        <a href="rtl-html/index.html">View RTL Verson</a>
    </div>
</div>
<!-- /Pages Settings -->

@include('theme6.layouts.menu')
<div id="searchcontainer" class="fullscreensearch">
    <form id="search" action="#" method="post">
        <div class="search-o-group">
            <input type="text" name="search-terms" id="search-terms" placeholder="Enter search terms...">
            <button type="submit" class="osearch-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <span class="search-text-info">Type and hit Enter to Search</span>
    </form>

</div>

@yield('content')


@include('theme6.layouts.footer')


@include('theme6.layouts.script')

</body>
</html>
