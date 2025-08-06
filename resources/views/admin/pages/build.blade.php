<!DOCTYPE html>
<html lang="tr" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default" data-assets-path="/panel/assets/" data-template="vertical-menu-template-starter" data-bs-theme="light">

@include('admin.layouts.head')
<body>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('admin.layouts.menu')

        <!-- Layout container -->
        <div class="layout-page">

            @include('admin.layouts.header')

            <!-- Content wrapper -->
            <div class="content-wrapper">

                @yield('content')

                @include('admin.layouts.footer')

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

@include('admin.layouts.script')
</body>
</html>
