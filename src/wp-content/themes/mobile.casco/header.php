<?php
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name');}
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s);  }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); }
    ?></title>
<!--META TAGS BEGIN-->
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <!--GYROSCOPE PORTRAIT LANDSCAPE-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--IPHONE NAV BARS REMOVE-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <!--IPHONE ICON-->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/Small-Icon-v1.jpg" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/Large-Icon-v1.jpg" />
    <!--STARTUP IMAGE-->
    <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/main-loading-small.png" />
<!--META TAGS END-->
<!--STYLE SHEETS-->
    <!--MAIN STYLE-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <!--MOBILE STYLE-->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
<!--JQUERY & JAVASCRIPTS-->
    <!--JQUERY CORE-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/jquery-1.7.1.min.js"><\/script>')</script>
    <!--JQUERY MOBILE-->
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
    <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.mobile-1.0.1.min.js"><\/script>')</script>
    <!--HTML5 for IE-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <!--JQUERY SCRIPT FOR PUZZLE-->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.puzzle.js"></script>
    <!--INITIALIZES PUZZLE-->
    <script type="text/javascript">
        $(document).bind("mobileinit", function(){
            $.support.touchOverflow = true;
            $.mobile.touchOverflowEnabled = true;
        });
        $(document).ready(function(){
           $("div.puzzle, p").puzzle(77); 
        });
    </script>
<!--EXTRA LINKS (WORDPRESS)-->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
</head>
<body>