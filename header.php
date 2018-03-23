<?php include 'includes/bbit-compress.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|', true, 'right'); ?></title>
        <meta name="google-site-verification" content="ovEs12RQtA-jnyU84qaYr_WbROyKHCv2aI1kPBaDeXw" />
        <meta name="google-site-verification" content="j2O1ZeOO-z7VkyCTqlUiqsj0wa0a4eTj1XR87yLcLy8" />
        <meta name="author" content="gsb.edu.vn" />
        <meta name="robots" content="index, follow" /> 
        <meta name="googlebot" content="index, follow" />
        <meta name="bingbot" content="index, follow" />
        <meta name="geo.region" content="VN" />
        <meta name="geo.position" content="14.058324;108.277199" />
        <meta name="ICBM" content="14.058324, 108.277199" />
        <meta property="fb:app_id" content="<?php echo get_option(SHORT_NAME . "_appFBID"); ?>" />

        <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="keywords" content="<?php echo get_option('keywords_meta') ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/common.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/wp-default.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/colorbox/colorbox.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/addquicktag.css" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/fancybox/jquery.fancybox.min.css" media="screen" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/animate.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/grid.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/main.min.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        
        <?php if(!wp_is_mobile()): ?>
        <style type="text/css">
        .menu > li:first-child > a {
          border: 5px solid #fff;
          margin-top: 1px;
          padding: 21px 8px 22px;
        }
        </style>
        <?php endif; ?>
        <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
<!--        <style type="text/css">
            #depreload {
                background-color: #ccc;
                background-size: cover;
                position: fixed;
                text-align: center;
                z-index: 9999;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                display: table;
            }
            #depreload .wrapper{
                display: table-cell;
                vertical-align: middle;
            }
            #depreload .circle {
                border: 1px solid rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                box-shadow: 0 0 1px 0 rgb(255, 255, 255);
                height: 110px;
                margin: 0 auto;
                position: relative;
                width: 110px;
            }
            #depreload .line {
                margin: -20px;
                opacity: 0;
            }
            #depreload .logo {
                width: 102px;
                height: 102px;
                left: 50%;
                top: 50%;
                margin-left: -51px;
                margin-top: -51px;
                opacity: 0;
                position: absolute;
                background: url('<?php bloginfo('stylesheet_directory'); ?>/images/logo_preload.png') no-repeat center;
            }
        </style>-->
        <script>
            var siteUrl = "<?php bloginfo('siteurl'); ?>";
            var themeUrl = "<?php bloginfo('stylesheet_directory'); ?>";
            var contactUrl = "<?php echo get_page_link(get_option(SHORT_NAME . "_pageContactID")); ?>";
            var no_image_src = themeUrl + "/images/no_image_available.jpg";
            var is_fixed_menu = <?php echo (get_option(SHORT_NAME . "_fixedMenu")) ? 'true' : 'false'; ?>;
            var is_home = <?php echo is_home() ? 'true' : 'false'; ?>;
            var ajaxurl = siteUrl + '/wp-admin/admin-ajax.php';
        </script>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->

        <?php
        if (is_singular())
            wp_enqueue_script('comment-reply');

        wp_head();
        ?>
    </head>
    <body>
        <noscript id="deferred-styles">
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,vietnamese" rel="stylesheet" />
            <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic&subset=latin,vietnamese" rel="stylesheet" />
            <link href="http://fonts.googleapis.com/css?family=Patrick+Hand&subset=latin,vietnamese" rel="stylesheet" />
            <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=latin,vietnamese" rel="stylesheet" />
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' type='text/css' media='all' />
        </noscript>
<!--        <div id="depreload">
            <div class="wrapper">
                <div class="circle">
                    <canvas class="line" width="150px" height="150px"></canvas>
                    <span class="logo"></span>
                </div>
            </div>
        </div>-->
        <!--BEGIN: HEADER-->
        <header class="rHeader">
            <div class="in">
                <div itemtype="http://schema.org/Organization" itemscope="itemscope" class="page-logo">
                    <a title="Nguyễn Hiển" href="<?php bloginfo('siteurl'); ?>" itemprop="url">Nguyễn Hiển</a>
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_1.png" itemprop="logo">
                    <!--<span class="txt-logo">Nguyễn Hiển</span>-->
                </div>
                <input type="checkbox" id="nav" />
                <label for="nav"></label>
                <ul class="rMenu">
                    <li>
                        <?php
                        wp_nav_menu(array(
                            'container' => '',
                            'theme_location' => 'primaryv2',
                        ));
                        ?>
                    </li>
                    <li class="google-search-bind dropdown">
                        <a  class="btn-search dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                            <span class="ico-search"></span>
                        </a>
                        <div class="dropdown-menu search-div">
                            <div class="search-input">
                                <form action="<?php echo home_url('/'); ?>" method="post" class="form-inline form-search">
                                    <input type="text" name="s" placeholder="Nhập từ khoá tìm kiếm...">
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <!-- END HEADER -->
