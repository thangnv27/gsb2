wow = new WOW({
    mobile: false
});
wow.init();

var PPOFixed = {
    mainMenu: function () {
        $('.rHeader').scrollToFixed({
            marginTop: $('#wpadminbar').outerHeight(true),
            limit: $('.footer').offset().top
        });
        /*var msie6 = $.browser == 'msie' && $.browser.version < 7;
         if (!msie6) {
         var top = $('.rHeader').offset().top - parseFloat($('.rHeader').css('margin-top').replace(/auto/, 0));
         $(window).scroll(function (event) {
         if ($(this).scrollTop() >= top) {
         var wpadminbar_height = 0;
         if ($(this).width() > 583) {
         wpadminbar_height = $('.rHeader').outerHeight(true);
         }
         $('.rHeader').css({
         'position': 'fixed',
         'top': wpadminbar_height + 0,
         'z-index': 1000
         });
         } else {
         $('.rHeader').css({
         'position': 'relative',
         'top': 0,
         'z-index': 10
         });
         }
         });
         }*/
    },
    columns: function (col) {
        var summaries = $(col);
        summaries.each(function (i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('#wpadminbar').outerHeight(true) + $(".rHeader").outerHeight(true),
                limit: function () {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    }
};

// Run
jQuery(function ($) {
    $(window).load(function (){
        if(is_home){
            $('.bxslider').show().bxSlider({
                nextSelector: '#slider-next',
                prevSelector: '#slider-prev',
                nextText: 'Onward →',
                prevText: '← Go back',
                minSlides: 4,
                maxSlides: 4,
                slideWidth: 330,
                slideMargin: 10,
                auto: true,
                speed: 1500,
                pause: 6000
            });

            $('.slider-mobile').show().bxSlider({
                mode: 'fade',
                controls: false,
                captions: true
            });
        }
        setTimeout(function (){
            var left = ($(".minimax_module.trial").outerWidth(true) - $(".minimax_module.trial .btns .button").outerWidth(true)) / 2 - 50;
            $("head").append('<style>.minimax_module.trial .btns::after{left:' + left + 'px}</style>');
        }, 1000);
    });
    
    $('.fancybox').fancybox();
    $(".vdo").fancybox({
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        width: '70%',
        height: '70%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
    });

    if (is_fixed_menu) {
        PPOFixed.mainMenu();
    }
    if ($(window).width() > 993) {
        PPOFixed.columns("#lichkhaigiang");
    }	$( "#nav" ).on( "click", function() {		if($(".menu").is( ":hidden" )){			$(".menu").addClass('mnmobile');		$("ul.menu").show();			} else{		$("ul.menu").hide();		}});

    // jQuery placeholder for IE
//    $("input, textarea").placeholder();

    $(".btn-search").on("click", function () {
        if ($(".search-div").is(":hidden")) {
            $(".search-div").show("slow");
        } else {
            $(".search-div").hide();
        }
    });
    
    // Hide/Show lich hoc
//    $("#tkf-sidebuttonid").click(function () {
//        var container = $(".lichhoc-container");
//        if (container.hasClass("show")) {
//            container.css("left", -385).removeClass('show');
//        } else {
//            container.addClass('show').css("left", 0);
//        }
//    });
    if($("#tkf-sidebuttonid").length > 0){
        $("#tkf-sidebuttonid").hoverIntent( function(){
            var container = $(".lichhoc-container");
            if (container.hasClass("show")) {
                container.css("left", -385).removeClass('show');
            } else {
                container.addClass('show').css("left", 0);
            }
        }, function(){} );
        $(".lichhoc-container").hoverIntent( function(){}, function(){
            $(".lichhoc-container").css("left", -385).removeClass('show');
        });
        $(".lichhoc-container .btn-close").click(function () {
            $(".lichhoc-container").css("left", -385).removeClass('show');
        });
        $(document).mouseup(function (e) {
            var container = $(".lichhoc-container");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.css("left", -385).removeClass('show');
            }
        });
    }
});
