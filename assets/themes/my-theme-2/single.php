<?php

/*===== Start Conditionals for Single =====*/

/*
$post = $wp_query->post;


if ( is_single() ) {
  load_template( trailingslashit( get_template_directory() ) . 'layouts/single-#.php' );
} else {
  get_template_part('404');
}*

/*===== End Conditionals for Singles =====*/
get_template_part( 'layouts/format', get_post_format() );


?>