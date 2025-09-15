@php $slider = $sliders->first(); @endphp @if($slider)
    <!-- Section: home -->
    <section id="home" class="">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col">
                    <!-- START Home Slider REVOLUTION SLIDER 6.0.8 -->
                    <p class="rs-p-wp-fix"></p>
                    <rs-module-wrap id="rev_slider_1_1_wrapper" data-alias="home-slider-2" data-source="gallery">
                        <rs-module id="rev_slider_1_1" data-version="6.0.8">
                            <rs-slides>
                                <rs-slide data-key="rs-1" data-title="Slide" data-thumb="/theme15/images/bg/as3.jpg" data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">
                                    <img src="/theme15/images/bg/as3.jpg" title="s1.jpg" width="1920" height="1001" class="rev-slidebg" data-no-retina />
                                    <!--
                                            -->
                                    <rs-layer
                                        id="slider-1-slide-1-layer-5"
                                        data-type="text"
                                        data-rsp_ch="on"
                                        data-xy="xo:30px,30px,30px,20px;yo:260px,214px,162px,117px;"
                                        data-text="w:normal;s:24,19,17,16;l:25,20,18,18;fw:300;"
                                        data-ford="frame_0;frame_1;frame_2;frame_999;"
                                        data-frame_0="x:0,0,0px,0px;y:-50,-41,-37px,-36px;"
                                        data-frame_1="x:0,0,0px,0px;y:0,0,0px,0px;sp:1000;"
                                        data-frame_999="o:0;st:w;sR:8200;"
                                        data-frame_2="oX:50%;oY:50%;oZ:0;tp:600px;st:400;sp:400;sR:-600;"
                                        style="z-index: 16; font-family: Rubik;"
                                    >
                                        Learn Anything. Make Things Happen
                                    </rs-layer>
                                    <!--
                                            -->
                                    <rs-layer
                                        id="slider-1-slide-1-layer-6"
                                        data-type="text"
                                        data-rsp_ch="on"
                                        data-xy="xo:30px,30px,30px,20px;yo:311px,256px,194px,149px;"
                                        data-text="w:normal;s:90,74,56,39;l:95,78,59,41;ls:-1px,0px,0px,0px;fw:900;"
                                        data-dim="w:auto,auto,auto,278px;h:303px,250px,189px,132px;"
                                        data-frame_0="x:0,0,0,0px;y:-50,-41,-31,-22px;"
                                        data-frame_1="x:0,0,0,0px;y:0,0,0,0px;st:600;sp:1000;sR:600;"
                                        data-frame_999="o:0;st:w;sR:7400;"
                                        style="z-index: 15; font-family: Playfair Display;"
                                    >
                                        Specifically<br />
                                        Designed For<br />
                                        Law Firm<span class="text-theme-colored2">.</span>
                                    </rs-layer>
                                    <!--
                                            -->
                                    <rs-layer
                                        id="slider-1-slide-1-layer-9"
                                        class="rev-btn btn-theme-colored2"
                                        data-type="button"
                                        data-color="#252628"
                                        data-rsp_ch="on"
                                        data-xy="xo:30px,30px,30px,20px;y:m;yo:213px,196px,114px,86px;"
                                        data-text="w:normal;s:16,13,12,10;l:50,41,42,35;fw:500;a:center;"
                                        data-dim="w:147px,121px,123px,105px;minh:0px,none,none,none;"
                                        data-padding="r:20,17,18,15;l:20,17,18,15;"
                                        data-border="boc:rgba(255,255,255,0.35);bow:1px,1px,1px,1px;bor:25px,25px,25px,25px;"
                                        data-frame_0="x:100%;y:0,0,0px,0px;skX:-45;"
                                        data-frame_1="x:0,0,0px,0px;y:0,0,0px,0px;st:750;sp:1000;sR:750;"
                                        data-frame_999="o:0;st:w;sR:7250;"
                                        data-frame_hover="c:#000;bgc:#fff;boc:rgba(255,255,255,0.75);bor:25px,25px,25px,25px;bow:1px,1px,1px,1px;sp:200;e:Power1.easeInOut;"
                                        style="z-index: 13; font-family: Rubik;"
                                    >
                                        Learn More
                                    </rs-layer>
                                    <!--
                                            -->
                                </rs-slide>
                            </rs-slides>
                            <rs-progress class="rs-bottom" style="visibility: hidden !important;"></rs-progress>
                        </rs-module>
                        <script type="text/javascript">
                            if (typeof revslider_showDoubleJqueryError === "undefined") {
                                function revslider_showDoubleJqueryError(sliderID) {
                                    var err = "<div class='rs_error_message_box'>";
                                    err += "<div class='rs_error_message_oops'>Oops...</div>";
                                    err += "<div class='rs_error_message_content'>";
                                    err += "You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>";
                                    err += "To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' ->  'jQuery & OutPut Filters' -> 'Put JS to Body' to on";
                                    err += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it";
                                    err += "</div>";
                                    err += "</div>";
                                    jQuery(sliderID).show().html(err);
                                }
                            }
                        </script>
                    </rs-module-wrap>
                    <!-- END REVOLUTION SLIDER -->

                    <script type="text/javascript">
                        var revapi1, tpj;
                        jQuery(function () {
                            tpj = jQuery;
                            if (tpj("#rev_slider_1_1").revolution == undefined) {
                                revslider_showDoubleJqueryError("#rev_slider_1_1");
                            } else {
                                revapi1 = tpj("#rev_slider_1_1")
                                    .show()
                                    .revolution({
                                        jsFileLocation: "js/",
                                        sliderLayout: "fullwidth",
                                        visibilityLevels: "1240,1024,778,480",
                                        gridwidth: "1240,1024,778,480",
                                        gridheight: "900,700,600,450",
                                        minHeight: "",
                                        spinner: "spinner0",
                                        editorheight: "900,700,600,450",
                                        responsiveLevels: "1240,1024,778,480",
                                        disableProgressBar: "on",
                                        navigation: {
                                            onHoverStop: false,
                                            bullets: {
                                                enable: true,
                                                tmp: '<span class="tp-bullet-image"></span>',
                                                style: "hebe",
                                            },
                                        },
                                        fallbacks: {
                                            allowHTML5AutoPlayOnAndroid: true,
                                        },
                                    });
                            }
                        });
                    </script>
                    <!-- END REVOLUTION SLIDER -->
                </div>
            </div>
        </div>
    </section>

@endif
