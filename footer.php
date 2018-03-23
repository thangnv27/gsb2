<!-- FOOTER -->
<footer class="mFooter footer">
    <?php /*if (wp_is_mobile()) : ?>
        <div class="ft-fix">
            <a id="callnowbutton" href="tel:<?php echo get_option(SHORT_NAME . "_hotline") ?>" class="ft-btn">&nbsp;</a>
            <a id="dangkydi" href="http://gsb.edu.vn/dang-ky-khoa-hoc-google-adwrods/" class="ft-btn">&nbsp;</a>
        </div>
    <?php endif;*/ ?>
    <div class="mFin">
        <div class="sub-nav">
            <div class="row">
                <div class="col-md-6">
                    <?php echo wpautop(stripslashes(get_option("footer_info1"))); ?>
                </div>
                <div class="col-md-6">
                    <?php echo wpautop(stripslashes(get_option("footer_info2"))); ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="copy">
            Kết Bạn Với Tôi Tại <a href="https://www.facebook.com/hi3nd3n83">Nguyễn Hiển AdWords</a>.
        </div>
        <div class="clearer"></div>
    </div>
</footer>
<!-- END FOOTTER -->
<div class="to-top"><span onclick="jQuery('html,body').animate({scrollTop: 0}, 500);" class="back-top-top"></span></div>

<?php if (!wp_is_mobile()) : ?>
<a id="tkf-sidebuttonid" style="left: -39px">Lịch học</a>
<div class="lichhoc-container">
    <span class="btn-close">X</span>
    <?php
    if (function_exists('dynamic_sidebar')) {
        dynamic_sidebar('sidebar2');
    }
    ?>
</div>
<?php endif; ?>

<style type="text/css">
    .getfly-form{
        width: auto!important;
    }
    .getfly-form .getfly-input{
        width: calc(100% - 10px)!important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.DEPreLoad.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        setTimeout(function(){
            $("#depreload .wrapper").animate({ opacity: 1 });
        }, 400);

        setTimeout(function(){
            $("#depreload .logo").animate({ opacity: 1 });
        }, 800);

        var canvas  = $("#depreload .line")[0],
            context = canvas.getContext("2d");

        context.beginPath();
        context.arc(75, 75, 54, Math.PI * 1.5, Math.PI * 1.6);
        context.strokeStyle = '#fff';
        context.lineWidth = 5;
        context.stroke();
        
        var loader = jQuery("body").DEPreLoad({
            // callbacks
            OnStep: function(percent) {
                $("#depreload .line").animate({ opacity: 1 });

                if (percent > 5) {
                    context.clearRect(0, 0, canvas.width, canvas.height);
                    context.beginPath();
                    context.arc(75, 75, 54, Math.PI * 1.5, Math.PI * (1.5 + percent / 50), false);
                    context.stroke();
                }
            },
            OnComplete: function() {
                setTimeout(function (){
                    $("#depreload").fadeOut('slow');
                }, 1500);
            }
        });
    });
</script>-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.accordion.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bpopup.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/custom.js"></script>
<?php if(is_home()): ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bxslider.min.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/app.js"></script>
<?php wp_footer(); ?>
<script>
var loadDeferredStyles = function() {
  var addStylesNode = document.getElementById("deferred-styles");
  var replacement = document.createElement("div");
  replacement.innerHTML = addStylesNode.textContent;
  document.body.appendChild(replacement);
  addStylesNode.parentElement.removeChild(addStylesNode);
};
var raf = requestAnimationFrame || mozRequestAnimationFrame ||
    webkitRequestAnimationFrame || msRequestAnimationFrame;
if (raf){ raf(function() { window.setTimeout(loadDeferredStyles, 0); });}
else{ window.addEventListener('load', loadDeferredStyles);}
</script>
<?php if (!wp_is_mobile()): ?>
<script type='text/javascript'>window._sbzq || function (e) {
        e._sbzq = [];
        var t = e._sbzq;
        t.push(["_setAccount", 21290]);
        var n = e.location.protocol == "https:" ? "https:" : "http:";
        var r = document.createElement("script");
        r.type = "text/javascript";
        r.async = true;
        r.src = n + "//static.subiz.com/public/js/loader.js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(r, i)
    }(window);</script>
<?php endif; ?>
<!-- Google Code dành cho Thẻ tiếp thị lại -->
<!--------------------------------------------------
Không thể liên kết thẻ tiếp thị lại với thông tin nhận dạng cá nhân hay đặt thẻ tiếp thị lại trên các trang có liên quan đến danh mục nhạy cảm. Xem thêm thông tin và hướng dẫn về cách thiết lập thẻ trên: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 928493035;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/928493035/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>