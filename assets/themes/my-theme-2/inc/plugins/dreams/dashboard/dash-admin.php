<?php
// Custom Styles and Effects
function dreams_dashboard_css(){
   wp_register_style('dreams_dashboard', get_template_directory_uri() . '/inc/plugins/dreams/dashboard/css/dashboard.css');
   wp_enqueue_style( 'dreams_dashboard');
}

function dreams_login_css() {
  $template = get_template_directory_uri();
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\" {$template}/inc/plugins/dreams/dashboard/css/dashboard.css\" />";
  echo "<style>
  html {
    background:none;
  }
  </style>";
}


function ot_theme() {

  wp_register_style('gcc_ot_admin_styles', get_template_directory_uri(). '/inc/plugins/dreams/dashboard/ot/admin-styles.css');
  wp_register_style('gcc_ot_admin_styles_IE8', get_template_directory_uri(). '/inc/plugins/dreams/dashboard/ot/admin-styles_IE8.css');
  wp_enqueue_style('gcc_ot_admin_styles');

  $GLOBALS['wp_styles']->add_data( 'gcc_ot_admin_styles_IE8', 'conditional', 'lte IE 9' );

  wp_enqueue_style('gcc_ot_admin_styles_IE8');
}


function dreams_dashboard_js() {
  wp_register_script('dashboard-js', get_template_directory_uri() . '/inc/plugins/dreams/dashboard/js/dashboard.js', array('jquery'), '2.0', false);

  wp_enqueue_script('dashboard-js');

}

function dreams_login_url() {
  global $deCDN, $deSiteURL;
  return $deSiteURL;
}


function dreams_footer_admin (){
  global $deCDN, $deSiteURL;
  echo "<span id=\"footer-thankyou\">Developed by <a href=\"$deSiteURL\" target=\"_blank\">Dreams Engineering</a></span>\n";
}



add_action( 'admin_init', 'dreams_dashboard_css', 99 );
add_action('login_head', 'dreams_login_css');
add_action( 'admin_init', 'ot_theme', 99);
add_action( 'admin_head', 'dreams_dashboard_js', 99 );
add_action( 'login_headerurl', 'dreams_login_url',99);
add_action('admin_footer_text', 'dreams_footer_admin');


/*
#######
 function dreams_login_title(){
   global $deCDN, $deSiteURL;
   return get_option( 'blogname' );
 }

add_action( 'admin_init', 'gcc_ot_css', 99);
add_action( 'admin_head', 'ot_custom_scripts', 99);
#######
*/



?>