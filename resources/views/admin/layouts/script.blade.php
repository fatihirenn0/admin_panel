
<!-- Core JS -->
<!-- build:js assets/vendor/js/theme.js -->

<script src="/panel/assets/vendor/libs/jquery/jquery.js"></script>

<script src="/panel/assets/vendor/libs/popper/popper.js"></script>
<script src="/panel/assets/vendor/js/bootstrap.js"></script>
<script src="/panel/assets/vendor/libs/node-waves/node-waves.js"></script>

<script src="/panel/assets/vendor/libs/@algolia/autocomplete-js.js"></script>

<script src="/panel/assets/vendor/libs/pickr/pickr.js"></script>

<script src="/panel/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="/panel/assets/vendor/libs/hammer/hammer.js"></script>

<script src="/panel/assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="/panel/assets/vendor/libs/notyf/notyf.js"></script>
<script src="/panel/assets/js/ui-toasts.js"></script>
<script src="/panel/assets/js/main.js"></script>
<script src="/panel/assets/js/cropper.min.js"></script>
<script src="/panel/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="/panel/assets/js/panel.js"></script>
<script>
    window.laravelSuccessMessage = @json(session('success'));
    window.laravelErrorMessage = @json(session('error'));
</script>
@stack('js')
