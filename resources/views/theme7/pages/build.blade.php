<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('theme7.layouts.head')
<body>
<div class="page-wrapper">

    @include('theme7.layouts.menu')

    <div class="page-content @if(\Illuminate\Support\Facades\Route::currentRouteName() == "site.index") pbmit-bg-color-blackish @endif">

        @yield('content')

    </div>

    @include('theme7.layouts.footer')
</div>
    <!-- Search Box Start Here -->
    <div class="pbmit-search-overlay">
        <div class="pbmit-icon-close"></div>
        <div class="pbmit-search-outer">
            <form class="pbmit-site-searchform">
                <input type="search" class="form-control field searchform-s" name="s" placeholder="Type Word Then Press Enter">
                <button type="submit">
                    <i class="pbmit-base-icon-search-1"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Search Box End Here -->

@include('theme7.layouts.script')
</body>
</html>
