<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />


    <title><?php wp_title(''); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <meta name="msapplication-TileColor" content="#f01d4f">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/resources/img/win8-tile-icon.png">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
 <!--[if lt IE 9]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->


            <nav role="navigation">
                <?php wp_nav_menu(array(
                        'container' => false,                           // remove nav container
                        'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                        'menu' => __( 'The Main Menu', 'dreamstheme' ),  // nav name
                        'menu_class' => 'nav top-nav cf',               // adding custom nav class
                        'theme_location' => 'main-nav',                 // where it's located in the theme
                        'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 0,                                   // limit the depth of the nav
                        'fallback_cb' => ''                             // fallback function (if there is one)
                        )); ?>

                    </nav>
