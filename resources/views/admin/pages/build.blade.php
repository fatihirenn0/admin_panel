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
<div class="modal fade" id="imageCropModal" tabindex="-1" aria-labelledby="imageCropModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageCropModalLabel">Görüntü Kırp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" style="max-width: 100%; display: none;" alt="Görüntü Yükleyin">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="cancelCropImageButton" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-success" id="cropImageButton">Kırp</button>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.script')
</body>
</html>
