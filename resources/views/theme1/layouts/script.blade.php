<script src="/theme1/js/jquery-3.7.1.min.js"></script>
<!-- Bootstrap min Js -->
<script src="/theme1/js/bootstrap.min.js"></script>
<!-- Mean menu Js -->
<script src="/theme1/js/meanmenu.js"></script>
<!-- Swiper bundle min Js -->
<script src="/theme1/js/swiper-bundle.min.js"></script>
<!-- Counterup min Js -->
<script src="/theme1/js/jquery.counterup.min.js"></script>
<!-- Wow min Js -->
<script src="/theme1/js/wow.min.js"></script>
<!-- Magnific popup min Js -->
<script src="/theme1/js/magnific-popup.min.js"></script>
<!-- Nice select min Js -->
<script src="/theme1/js/nice-select.min.js"></script>
<!-- Isotope pkgd min Js -->
<script src="/theme1/js/isotope.pkgd.min.js"></script>
<!-- Parallax Js -->
<script src="/theme1/js/parallax.js"></script>
<!-- Splitting Js -->
<script src="/theme1/js/splitting.js"></script>
<!-- Waypoints Js -->
<script src="/theme1/js/jquery.waypoints.js"></script>
<!-- Gsap -->
<script src="/theme1/js/gsap/gsap.min.js"></script>
<script src="/theme1/js/gsap/ScrollTrigger.min.js"></script>
<script src="/theme1/js/gsap/ScrollSmoother.min.js"></script>
<!-- form submit -->
<script src="/theme1/js/jquery.validate.min.js"></script>
<script src="/theme1/js/jquery.form.min.js"></script>
<!-- Script Js -->
<script src="/theme1/js/script.js"></script>

<script>
    (function($) {
        $("#contact_form").validate({
            submitHandler: function(form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                        if( data.status == 'true' ) {
                            $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                });
            }
        });
    })(jQuery);
</script>
