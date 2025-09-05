<script src="/theme3/js/jquery.js"></script>
<script src="/theme3/js/popper.min.js"></script>
<!--Revolution Slider-->
<script src="/theme3/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="/theme3/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/theme3/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="/theme3/js/main-slider-script.js"></script>
<!--Revolution Slider-->
<script src="/theme3/js/bootstrap.min.js"></script>
<script src="/theme3/js/jquery.fancybox.js"></script>
<script src="/theme3/js/jquery-ui.js"></script>
<script src="/theme3/js/gsap.min.js"></script>
<script src="/theme3/js/ScrollTrigger.min.js"></script>
<script src="/theme3/js/splitType.js"></script>
<script src="/theme3/js/wow.js"></script>
<script src="/theme3/js/appear.js"></script>
<script src="/theme3/js/owl.js"></script>
<script src="/theme3/js/script.js"></script>
<!-- form submit -->
<script src="/theme3/js/jquery.validate.min.js"></script>
<script src="/theme3/js/jquery.form.min.js"></script>
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
<script>
    $('.packages-section-three .package-block-three').hover(function() {
        $(this).siblings('.package-block-three').removeClass('active'), $(this).addClass('active')
    })
</script>
