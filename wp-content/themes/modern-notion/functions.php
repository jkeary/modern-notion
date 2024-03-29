<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );
require_once( 'library/cite-featured.php' );
require_once( 'library/cite-homepage-image.php' );
require_once( 'library/cite-photos.php' );
require_once( 'library/homepage-slots.php' );
require_once( 'library/author-twitter-handle.php' );
require_once( 'library/category-meta.php' );



// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
// require_once( 'library/custom-post-type.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 808;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
// thumbnail: 185 x 185
// medium:  391 x 9999
// large:  808 x 455
add_image_size( 'small-square', 82, 82, true );
add_image_size( 'smaller-square', 69, 69, true );
add_image_size( 'medium-square-no-sidebar', 343, 343, true );
add_image_size( 'article-main', 737, 415, true );

add_image_size( 'medium-square', 356, 356, true );
add_image_size( 'medium-rectangle', 356, 200, true );

add_image_size( 'side-square', 318, 318, true );
add_image_size( 'side-rectangle', 318, 178, true );


add_image_size( 'home-hero', 786, 440, true );
add_image_size( 'home-left', 600, 342, true );
add_image_size( 'home-right', 439, 342, true );
add_image_size( 'home-mini', 282, 264, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/


/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
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


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_register_style('googleFontsHomenaje', 'http://fonts.googleapis.com/css?family=Homenaje');
  wp_enqueue_style( 'googleFontsHomenaje');
  wp_register_style('googleFontsOpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
  wp_enqueue_style( 'googleFontsOpenSans');
}

add_action('wp_print_styles', 'bones_fonts');

function rename_post_formats($translation, $text, $context, $domain) {
    $names = array(
        'Audio'  => 'Podcast',
        'Gallery' => 'Slideshow',
        'Aside' => 'List',
        'Image' => 'Feature'
    );
    if ($context == 'Post format') {
        $translation = str_replace(array_keys($names), array_values($names), $text);
    }
    return $translation;
}
add_filter('gettext_with_context', 'rename_post_formats', 10, 4);


function wpse26032_admin_posts_filter( &$query )
{
    if ( 
        is_admin() 
        AND 'edit.php' === $GLOBALS['pagenow']
        AND isset( $_GET['p_format'] )
        AND '-1' != $_GET['p_format']
        )
    {
        $query->query_vars['tax_query'] = array( array(
             'taxonomy' => 'post_format'
            ,'field'    => 'ID'
            ,'terms'    => array( $_GET['p_format'] )
        ) );
    }
}
add_filter( 'parse_query', 'wpse26032_admin_posts_filter' );

function wpse26032_restrict_manage_posts_format()
{
    wp_dropdown_categories( array(
         'taxonomy'         => 'post_format'
        ,'hide_empty'       => 0
        ,'name'             => 'p_format'
        ,'show_option_none' => 'Select Post Format'
    ) );
}
add_action( 'restrict_manage_posts', 'wpse26032_restrict_manage_posts_format' );

function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_the_slug() {
  global $post;
  return $post->post_name;
}
function top_category_slug()  {
  $category = get_the_category();   
  $cat_slug = $category[0]->slug;
  return $cat_slug;
}

function get_responsive_iframe_bottom_pad($source)  {
  preg_match('/< *iframe[^>]*height *= *["\']?([^"\']*)/i', $source, $matches);
  $height = $matches[1];
  preg_match('/< *iframe[^>]*width *= *["\']?([^"\']*)/i', $source, $matches);
  $width = $matches[1];
  if($width == 0)  {
    return 0;
  }
  $bottom_pad_percent = ($height/$width)*100 . '%';
  return $bottom_pad_percent;
}

require_once('library/shortcode-gallery.php');
require_once('library/acf-fields.php');


function new_excerpt_more( $more ) {
  return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter( 'wp_trim_excerpt', 'my_custom_excerpt', 10, 2 );
function my_custom_excerpt($text, $raw_excerpt) {
    if( ! $raw_excerpt ) {
        $content = apply_filters( 'the_content', get_the_content() );
        $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
    }
    return $text;
}

function remove_empty_paragraph_tags($str)  {
  $str = preg_replace('#<p[^>]*>(\s|&nbsp;?)*</p>#', '', $str);
  return $str;
}
add_filter('the_content', 'remove_empty_paragraph_tags' ,99999);

// Add RSS Feed for podcast posts
add_action('init', 'podcastsRSS');
function podcastsRSS(){
  add_feed('podcast-feed', 'podcastsRSSFunc');
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
function podcastsRSSFunc(){
  get_template_part('partials/rss', 'podcasts');
}
function format_frontend($format){
  switch ($format) {
    case 'audio':
      return 'podcast';
      break;    
    case 'aside':
      return 'list';
      break;    
    case 'photo':
      return 'slideshow';
      break;    
    default:
      return $format;
      break;
  }
}
function stripInvalidXml($value)
{
    $ret = "";
    $current;
    if (empty($value)) 
    {
        return $ret;
    }

    $length = strlen($value);
    for ($i=0; $i < $length; $i++)
    {
        $current = ord($value{$i});
        if (($current == 0x9) ||
            ($current == 0xA) ||
            ($current == 0xD) ||
            (($current >= 0x20) && ($current <= 0xD7FF)) ||
            (($current >= 0xE000) && ($current <= 0xFFFD)) ||
            (($current >= 0x10000) && ($current <= 0x10FFFF)))
        {
            $ret .= chr($current);
        }
        else
        {
            $ret .= " ";
        }
    }
    return $ret;
}

function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

/*
 * Display a bigger thumbnail and the excerpt for the first post only, then do the regular output
 *
 * @param   array   $mostpopular
 * @param   array   $instance
 * @return  string
 */
function my_custom_popular_posts_html_list( $mostpopular, $instance ){
    if(is_front_page()) {
      return $mostpopular; 
    }
    $counter = 0;
    $image_size = 'small-square'; 
    $extra_class = 'nopin';

    ob_start(); 
  ?>
      <ul class="sidebar-large-post-list page-block <?php echo $image_size . ' ' . $extra_class; ?>">
  <?php
    foreach( $mostpopular as $popular ) :        
      if(get_the_post_thumbnail($popular->id, $image_size))  {          
        $custom_thumbnail = get_the_post_thumbnail( $popular->id, $image_size, array('alt' => esc_attr($popular->title), 'title' => esc_attr($popular->title)) ); 
      }        
      else  {
        $custom_thumbnail = '';
      }
      global $popular_id;
      $popular_id = $popular->id; 
  ?>
        <li>
          <article <?php post_class('', $popular_id);?>>
            <a href="<?php echo get_permalink($popular_id);?>"><?php echo $custom_thumbnail; ?></a>
            <div class="post-icon-wrapper post-icon-wrapper-medium-large">
              <div class="text-wrapper">
                <?php get_template_part('partials/content', 'article-block-title-and-meta'); ?>
              </div>
            </div>
          </article>
        </li>
  <?php
    endforeach; 

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_filter( 'wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2 );

function homepage_sidebar($mostpopular, $instance) {
  if(!is_front_page()){
    return $mostpopular; 
  }
  $category_meta = get_option('category_meta');
  ob_start(); 
  foreach($mostpopular as $popular) : $cat = get_the_category($popular->id)[0]; ?>
  
    <article>
      <h2><a href="<?php echo get_permalink($popular->id); ?>"><?php echo get_the_title($popular->id); ?></a></h2>
      <p class="meta">
        <a href="<?php echo get_category_link($cat->cat_ID);?>" style="color: <?php echo $category_meta[$cat->cat_ID]['color']; ?>;">
          <?php echo $cat->slug; ?>
        </a> 
        By <a href="<?php echo get_author_posts_url($popular->uid);?>"><?php echo get_the_author_meta('display_name', $popular->uid);?></a>
      <div class="sep"></div>
    </article>

<?php
  endforeach;
  $output = ob_get_contents(); 
  ob_end_clean(); 
  return $output; 
}
add_filter( 'wpp_custom_html', 'homepage_sidebar', 10, 2 );


/* DON'T DELETE THIS CLOSING TAG */ ?>