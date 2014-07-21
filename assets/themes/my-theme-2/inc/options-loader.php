<?php
//Load Styles
function dreams_scripts_and_styles() {
	if (!is_admin()) {
		global $themename, $prefix;

//Versions Variables

		$normalizeVer = '3.0.1';
		$mainVer = '1.0';
		$jQLocal = get_template_directory_uri() . '/resources/js/vendor/jquery.min.js';
		$jQCDN = ot_get_option("{$prefix}jqueryver");

		wp_enqueue_style(
			'normalize',
			get_template_directory_uri() . '/resources/css/normalize.css',
			false,
			''.$normalizeVer.'',
			'all'
			);


		wp_enqueue_style(
			'style',
			get_template_directory_uri() . '/resources/css/main.css',
			false,
			''.$mainVer.'',
			'all'
			);

		styleVer('jquery-ui-css','jquery-ui-smoothess','jqueryuicssver','false');

//Deregister Scripts
		wp_deregister_script('jquery');
		wp_deregister_script('jquery-ui-core');

//Register Scripts

		/* Modernizr */
		libraryVer('modernizr','modernizrver','');

		/* Jquery */
		if (get_transient('google_jquery') == true) {
			libraryVer('jquery','jqueryver','true');
		}
		else {
			$resp = wp_remote_head($jQCDN);
			if (!is_wp_error($resp) && 200 == $resp['response']['code']) {
				set_transient('google_jquery', true, 60 * 5);
				wp_register_script('jquery', $jQLocal, array(), null, true);
			}
			else {
				set_transient('google_jquery', true, 60 * 5);
				libraryVer('jquery','jqueryver','true');
			}
		}

		/* Vendor */
		libraryVer('easing','easingver','true');
		libraryVer('mousewheel','mousewheelver','true');


		/* jQuery-UI */
		libraryVer('jquery-ui-core','jqueryuiver','true');

		/* Plugins.jQuery */
		wp_register_script('plugins', get_template_directory_uri() . '/resources/js/plugins.min.js', array('jquery','modernizr'), '1.0', true);
		wp_register_script('main', get_template_directory_uri() . '/resources/js/main.min.js', array('jquery','modernizr'), '1.0', true);


//Enqueue Scripts
		wp_enqueue_script('modernizr');
		wp_enqueue_script('jquery');
		libraryEnqeue('jquery-ui-core');
		libraryEnqeue('easing');
		libraryEnqeue('mousewheel');
		wp_enqueue_script('plugins');
		wp_enqueue_script('main');

	}
}


?>