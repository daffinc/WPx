<?php
function dreams_custom_theme_options() {
  global $prefix;

  $saved_settings = get_option( 'option_tree_settings', array() );


  $bolean = array('label' => 'Check to Active', 'value' => 'Yes');
  $modernizr_versions = array(
    array(
      'value' => ''.get_template_directory_uri() . '/resources/js/vendor/modernizr.min.js'.'', 'label' => '2.8.2 Local',
      )
    );

  $easing_versions = array(
    array(
      'value' => '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', 'label' => '1.3',
      ),
    array(
      'value' => '//cdn.jsdelivr.net/jquery.easing/1.3/jquery.easing.compatibility.js', 'label' => '1.3c'
      )
    );

  $mousewheel_versions = array(
    array(

      'value' => '//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.9/jquery.mousewheel.min.js', 'label' =>  '3.1.9',
      ),
    array(

      'value' => '//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.6/jquery.mousewheel.min.js', 'label' =>  '3.1.6',
      ),
    array(
      'value' => '//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.3/jquery.mousewheel.min.js', 'label' =>  '3.0.6'
      )
    );



  $jquery_versions = array(
    array(
      'value' => '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', 'label' =>  '1.11.0',
      ),
    array(
      'value' => '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', 'label' =>  '2.1.1',
      )
    );

  $jqueryuicss_versions = array(
    array(
      'value' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css', 'label' =>  '1.10.4',
      ),
    array(
      'value' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css', 'label' =>  '1.11.0',
      )
    );

  $jqueryui_versions = array(
    array(
      'value' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', 'label' =>  '1.10.4',
      ),
    array(
      'value' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', 'label' =>  '1.10.3'
      ),
    array(
      'value' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js', 'label' =>  '1.11.0'
      )
    );


  $custom_settings = array(

/* =============================================================================
Help Settings
==========================================================================
'contextual_help' => array(
  'content'       => array(
    array(
      'id'        => 'general_help',
      'title'     => 'General',
      'content'   => ''
      )
    ),
  'sidebar'       => ''
  ),
*/
/* =============================================================================
Sections Settings
========================================================================== */

'sections'        => array(
  array(
    'title'       => 'General',
    'id'          => "{$prefix}general_default"
    ),
  array(
    'title'       => 'Home',
    'id'          => "{$prefix}home_settings"
    ),
  array(
    'title'       => 'Contact',
    'id'          => "{$prefix}contact_settings"
    ),
  array(
    'title'       => 'Advance',
    'id'          => "{$prefix}advanced_settings"
    ),


  ),

'settings'          => array(

/* =============================================================================
General Settings
========================================================================== */
array(
  'label'         => 'Main Logo',
  'id'            => "{$prefix}logo",
  'desc'          => 'Upload the header image Logo.',
  'type'          => 'upload',
  'section'     => "{$prefix}general_default"
  ),

array(
  'label'       => 'Custom Background',
  'id'          => "{$prefix}background",
  'type'        => 'background',
  'desc'        => 'Change the background CSS.',
  'section'     => "{$prefix}general_default"
  ),

array(
  'label'       => 'Custom CSS',
  'id'          => "{$prefix}customcss",
  'type'        => 'css',
  'desc'        => 'Override CSS Defaults.',
  'rows'        => '20',
  'section'     => "{$prefix}general_default"
  ),

array(
  'label'       => 'Google Analytics',
  'id'          => "{$prefix}ga",
  'type'        => 'text',
  'desc'        => 'Please Provide your Google Analytics Code.',
  'section'     => "{$prefix}general_default"
  ),
array(
  'label'       => 'Advance Setting',
  'id'          => "{$prefix}advanced",
  'type'        =>  'checkbox',
  'desc'        =>  'Activete more complex functions.',
  'choices'     =>  array($bolean),
  'section'     =>  "{$prefix}general_default"
  ),

/* =============================================================================
Home Settings
========================================================================== */
array(
  'label'       => 'Activate Slider',
  'id'          => "{$prefix}active_slider",
  'type'        =>  'checkbox',
  'desc'        =>  'Activete Slider for Home.',
  'choices'     =>  array($bolean),
  'section'     =>  "{$prefix}home_settings"
  ),

array(
  'label'       => 'Slider',
  'id'          => "{$prefix}slider",
  'type'        =>  'slider',
  'desc'        =>  'Slider for Home.',
  'section'     =>  "{$prefix}home_settings"
  ),

/* =============================================================================
Contact Setting
========================================================================== */

array(
  'label' => 'Emails',
  'desc' => 'Please Provide your email(s).',
  'id' => "{$prefix}mail",
  'type' => 'textarea',
  'rows'        => '2',
  'section'     =>  "{$prefix}contact_settings"
  ),

array(
  'label' => 'Telephone',
  'desc' => 'Please Provide your Telephone number(s).',
  'id' => "{$prefix}tel",
  'type' => 'textarea',
  'rows'        => '2',
  'section'     =>  "{$prefix}contact_settings"
  ),

array(
  'label' => 'Address',
  'desc' => 'Please Provide your address.',
  'id' => "{$prefix}add",
  'type' => 'textarea',
  'section'     =>  "{$prefix}contact_settings"
  ),

array(
  'label' => 'Twitter',
  'desc' => 'Please Provide Twitter Usrname without @.',
  'id' => "{$prefix}twitter",
  'section'     =>  "{$prefix}contact_settings",
  'type' => 'text'
  ),

array(
  'label' => 'Youtube',
  'desc' => 'Please provide Youtube username.',
  'id' => "{$prefix}youtube",
  'section'     =>  "{$prefix}contact_settings",
  'type' => 'text'
  ),

array(
  'label' => 'Pinterest',
  'desc' => 'Please provide Pinterest username.',
  'id' => "{$prefix}pinterest",
  'section'     =>  "{$prefix}contact_settings",
  'type' => 'text'
  ),

array(
  'label' => 'LinkedIN',
  'desc' => 'Please provide LinkedIN username.',
  'id' => "{$prefix}linkedin",
  'section'     =>  "{$prefix}contact_settings",
  'type' => 'text'
  ),


array(
  'label' => 'Facebook',
  'desc' => 'Please provide full Facebook URL.',
  'id' => "{$prefix}facebook",
  'type' => 'text',
  'section'     =>  "{$prefix}contact_settings"
  ),

array(
  'label' => 'Flicker',
  'desc' => 'Please provide full Flicker URL.',
  'id' => "{$prefix}flicker",
  'type' => 'text',
  'section'     =>  "{$prefix}contact_settings"
  ),

/* =============================================================================
Advance Setting
========================================================================== */

array(
  'label' => 'Usual jQuery Libraries, select  most common use libraries.',
  'desc' => 'Easing',
  'id' => "{$prefix}easing",
  'type' => 'checkbox',
  'choices' => array($bolean),
  'section' =>  "{$prefix}advanced_settings"
  ),

array(
  'label' => '',
  'desc' => 'Mousewheel',
  'id' => "{$prefix}mousewheel",
  'type' => 'checkbox',
  'choices' => array($bolean),
  'section' =>  "{$prefix}advanced_settings"
  ),

array(
  'label' => '',
  'desc' => 'jQueryUI (lastest version)',
  'id' => "{$prefix}jquery-ui-core",
  'type' => 'checkbox',
  'choices' => array($bolean),
  'section'     =>  "{$prefix}advanced_settings"
  ),

array(
  'label' => '',
  'desc' => 'jQueryUI CSS',
  'id' => "{$prefix}jquery-ui-css",
  'type' => 'checkbox',
  'choices' => array($bolean),
  'section'     =>  "{$prefix}advanced_settings"
  ),

array(
  'label' => 'Modernizr Versions',
  'desc' => 'Select Modernizr CDN version.',
  'id' => "{$prefix}modernizrver",
  'type' => 'select',
  'std' => ''.get_template_directory_uri() . '/resources/js/vendor/modernizr.min.js'.'',
  'choices' => $modernizr_versions,
  'section' =>  "{$prefix}advanced_settings"
  ),

array(
  'label' => 'jQuery Versions',
  'desc' => 'Select jQuery GoogleCDN version.<br> jQuery Local Fallback version is: v2.1.1',
  'id' => "{$prefix}jqueryver",
  'type' => 'select',
  'choices' => $jquery_versions,
  'std' => '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
  'section' =>  "{$prefix}advanced_settings"
  ),

array(
  'label' => 'jQueryUI Versions',
  'desc' => 'Select jQuery GoogleCDN version.',
  'id' => "{$prefix}jqueryuiver",
  'type' => 'select',
  'choices' => $jqueryui_versions,
  'std' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js',
  'section'     =>  "{$prefix}advanced_settings"
  ),


array(
  'label' => 'jQueryUI CSS Versions',
  'desc' => 'Select jQuery GoogleCDN version.',
  'id' => "{$prefix}jqueryuicssver",
  'type' => 'select',
  'choices' => $jqueryuicss_versions,
  'std' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css',
  'section'     =>  "{$prefix}advanced_settings"
  ),

array(
  'label' => 'Easing Versions',
  'desc' => 'Select easing CDN version.',
  'id' => "{$prefix}easingver",
  'type' => 'select',
  'std' => '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
  'choices' => $easing_versions,
  'section' => "{$prefix}advanced_settings"
  ),

array(
  'label' => 'Mousewheel Versions',
  'desc' => 'Select Mousewheel CDN version.',
  'id' => "{$prefix}mousewheelver",
  'type' => 'select',
  'std' => '//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.9/jquery.mousewheel.min.js',
  'choices' => $mousewheel_versions,
  'section'     =>  "{$prefix}advanced_settings"
  )

)
);

$custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );

if ( $saved_settings !== $custom_settings ) {
  update_option( 'option_tree_settings', $custom_settings );
}

}

add_action( 'admin_init', 'dreams_custom_theme_options', 1);

//Add Theme Option Filters
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_child_theme_mode', '__return_true' );
?>