<?php

/*********************
LAUNCH DREAMS
Let's get everything up and running.
*********************/

function dreams_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'dreamstheme', get_template_directory() . '/inc/translation' );

  // launching operation cleanup
  add_action( 'init', 'dreams_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'dreams_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'dreams_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'dreams_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'dreams_gallery_style' );
  // Google Analytics
  add_filter( 'wp_head', 'dreams_google_analytics' );
  //Custom CSS
  add_filter( 'wp_head', 'dreams_custom_css' );
  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'dreams_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  dreams_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'dreams_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'dreams_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'dreams_excerpt_more' );

  if ( !current_user_can('manage_options') ){
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
  }

} /* end dreams ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'dreams_ahoy' );



/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
  $content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'dreams-thumb-600', 600, 150, true );
add_image_size( 'dreams-thumb-300', 300, 100, true );


add_filter( 'image_size_names_choose', 'dreams_custom_image_sizes' );

function dreams_custom_image_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'dreams-thumb-600' => __('600px by 150px'),
    'dreams-thumb-300' => __('300px by 100px'),
    ) );
}

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function dreams_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Sidebar 1', 'dreamstheme' ),
    'description' => __( 'The first (primary) sidebar.', 'dreamstheme' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
    ));
}

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function dreams_head_cleanup() {
  // category feeds
  // remove_action( 'wp_head', 'feed_links_extra', 3 );
  // post and comment feeds
  //remove_action( 'wp_head', 'feed_links', 2 );
  // EditURI link
  remove_action( 'wp_head', 'rsd_link' );
  // windows live writer
  remove_action( 'wp_head', 'wlwmanifest_link' );
  // index link
  remove_action( 'wp_head', 'index_rel_link' );
  // previous link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  // start link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  // links for adjacent posts
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  // WP version
  remove_action( 'wp_head', 'wp_generator' );
  // remove WP version from css
  add_filter( 'style_loader_src', 'dreams_remove_wp_ver_css_js', 9999 );
  // remove Wp version from scripts
  add_filter( 'script_loader_src', 'dreams_remove_wp_ver_css_js', 9999 );

} /* end dreams head cleanup */


/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function dreams_theme_support() {

  // wp thumbnails (sizes handled in functions.php)
  add_theme_support( 'post-thumbnails' );

  // default thumb size
  set_post_thumbnail_size(125, 125, true);

  // wp custom background (thx to @bransonwerner for update)
  add_theme_support( 'custom-background',
    array(
      'default-image' => '',    // background image default
      'default-color' => '',    // background color default (dont add the #)
      'wp-head-callback' => '_custom_background_cb',
      'admin-head-callback' => '',
      'admin-preview-callback' => ''
      )
    );

  // rss thingy
  add_theme_support('automatic-feed-links');

  // to add header image support go here: http://themble.com/support/adding-header-background-image-support/

  // adding post format support
  add_theme_support( 'post-formats',
    array(
      'aside',             // title less blurb
      'gallery',           // gallery of images
      'link',              // quick link to other site
      'image',             // an image
      'quote',             // a quick quote
      'status',            // a Facebook like status update
      'video',             // video
      'audio',             // audio
      'chat'               // chat transcript
      )
    );

  // wp menus
  add_theme_support( 'menus' );

  // registering wp3+ menus
  register_nav_menus(
    array(
      'main-nav' => __( 'The Main Menu', 'dreamstheme' ),   // main nav in header
      'footer-links' => __( 'Footer Links', 'dreamstheme' ) // secondary nav in footer
      )
    );
} /* end dreams theme support */


/* =============================================================================
   Functions
   ========================================================================== */


// Better Titel
   function rw_title( $title, $sep, $seplocation ) {
    global $page, $paged;

  // Don't affect in feeds.
    if ( is_feed() ) return $title;

  // Add the blog's name
    if ( 'right' == $seplocation ) {
      $title .= get_bloginfo( 'name' );
    } else {
      $title = get_bloginfo( 'name' ) . $title;
    }

  // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );

    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title .= " {$sep} {$site_description}";
    }

  // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) {
      $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
    }

    return $title;

} // end better title


// remove WP version from RSS
function dreams_rss_version() { return ''; }

// remove WP version from scripts
function dreams_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}


// remove injected CSS for recent comments widget
function dreams_remove_wp_widget_recent_comments_style() {
  if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
    remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
  }
}

// remove injected CSS from recent comments widget
function dreams_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}

// remove injected CSS from gallery
function dreams_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


//Exclude Categories
function exclude_category($query) {
  if ( $query->is_home  || $query->is_feed || $query->is_archive ) {
    $query->set('cat', '-1');
  }
  return $query;
}


/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function dreams_filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function dreams_excerpt_more($more) {
  global $post;
  // edit here if you like
  return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read ', 'dreamstheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'dreamstheme' ) .'</a>';
}

?>