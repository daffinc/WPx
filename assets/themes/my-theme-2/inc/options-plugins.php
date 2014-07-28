<?php
// /* =============================================================================
//    Plugins
//    ========================================================================== */

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using dreams_related_posts(); )
function dreams_related_posts() {
  echo '<ul id="dreams-related-posts">';
  global $post;
  $tags = wp_get_post_tags( $post->ID );
  if($tags) {
    foreach( $tags as $tag ) {
      $tag_arr .= $tag->slug . ',';
    }
    $args = array(
      'tag' => $tag_arr,
      'numberposts' => 5, /* you can change this to show more */
      'post__not_in' => array($post->ID)
    );
    $related_posts = get_posts( $args );
    if($related_posts) {
      foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
        <li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
      <?php endforeach; }
    else { ?>
      <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'dreamstheme' ) . '</li>'; ?>
    <?php }
  }
  wp_reset_postdata();
  echo '</ul>';
} /* end dreams related posts function */


/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function dreams_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
} /* end page navi */


/*********************
COMMENTS
*********************/

// Comment Layout
function dreams_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!



/*********************
Galleries
*********************/

//Set Galleries
function the_image() {
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
  echo $thumb_url[0];
}


/*********************
Inline CSS
*********************/


//Custom Template
function dreams_custom_css() {
 global $themename, $prefix;
 $customcss  = ot_get_option($prefix.'customcss');
 $background = ot_get_option($prefix.'background');
 $color      = $background['background-color'];
 $image      = $background['background-image'];
 $position   = $background['background-position'];
 $attachment = $background['background-attachment'];
 $repeat     = $background['background-repeat'];

 $output = '';

 if ($image) {
  $output .= "body {\n background:$color url($image) $attachment $position $repeat;\n}\n";

} elseif ($color){
  $output .= "body {\n background-color:$color;\n}\n ";
} else {
}

if ($customcss) {
  $output .= "\n$customcss\n";
}

if ($output <> '') {
 $output = "\n<!-- Custom Styling -->\n<style>\n" . $output . "</style>\n";
 echo $output;
}
}



/*********************
Custom Logo
*********************/

function custom_logo(){
  global $themename, $prefix;
  $template_url = get_template_directory_uri();
  $customlogo   =  ot_get_option($prefix.'logo', ''.$template_url.'/resources/img/logo.png');

  echo '<img src="'.$customlogo.'" alt="'.$themename.'"/>';

}



/*********************
Google Analytics
*********************/

function google_analytics(){

  global $themename, $prefix;
  $template_url = get_template_directory_uri();
  $gaCode       = ot_get_option($prefix.'ga');
  $ga           = '';


  if($gaCode){
    $ga .= "
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','$gaCode');ga('send','pageview');
";
}

if ($ga <> '') {
 $ga = "\n<!-- Google Analytics -->\n<script>\n/* <![CDATA[ */" . $ga . "/* ]]> */\n</script>\n";
 echo $ga;
}

}

?>