<?php

show_admin_bar(false);
/**
 * picksmag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package picksmag
 */

if ( ! function_exists( 'picksmag_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function picksmag_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on picksmag, use a find and replace
     * to change 'picksmag' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'picksmag', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary' => esc_html__( 'Primary', 'picksmag' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    /*
     * Enable support for Post Formats.
     * See https://developer.wordpress.org/themes/functionality/post-formats/
     */
    add_theme_support( 'post-formats', array(
      'aside',
      'image',
      'video',
      'quote',
      'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'picksmag_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );
  }
endif;
add_action( 'after_setup_theme', 'picksmag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_height
 */

function picksmag_content_height() {
  $GLOBALS['content_height'] = apply_filters( 'picksmag_content_height', 640 );
}
add_action( 'after_setup_theme', 'picksmag_content_height', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function picksmag_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'picksmag' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'picksmag' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'picksmag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function picksmag_scripts() {
  wp_enqueue_style( 'picksmag-style', get_stylesheet_uri(), array(), '1.1.3', 'all' );

  wp_enqueue_script( 'picksmag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'picksmag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'picksmag_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

add_filter( 'rwmb_meta_boxes', 'thumbnail_settings' );
add_filter( 'rwmb_meta_boxes', 'header_video' );

function thumbnail_settings( $meta_boxes ) {
  $meta_boxes[] = array(
    'title'  => __( 'Thumbnail Settings', 'thumb_height' ),
    'fields' => array(
      array(
        'name'        => __( 'Thumb Height', 'thumb_height' ),
        'id'          => 'thumb_height',
        'type'        => 'select_advanced',
        // Array of 'value' => 'Label' pairs for select box
        'options'     => array(
          'one' => __( 'One Row', 'one' ),
          'two' => __( 'Two Rows', 'two' ),
        ),
        // Select multiple values, optional. Default is false.
        'multiple'    => false,
        'std'         => 'one', // Default value, optional
        'placeholder' => __( 'Select a height', 'thumb_height' ),
      ),
    )
  );
  return $meta_boxes;
}

function header_video( $meta_boxes ) {
  $meta_boxes[] = array(
    'title'  => __( 'Header Video', 'header_video' ),
    'fields' => array(
      array(
        'name'        => __( 'Header Video', 'header_video' ),
        'id'          => 'header_video',
        'type'        => 'oembed',
        // Array of 'value' => 'Label' pairs for select box
        // Select multiple values, optional. Default is false.
        'multiple'    => false,
        'placeholder' => __( 'Embed a Video for the top section', 'header_video' ),
      ),
    )
  );
  return $meta_boxes;
}

function imp_custom_youtube_querystring( $html, $url, $args ) {
  if(strpos($html, 'youtube')!= FALSE) {
    $args = [
      'rel' => 0,
      'controls' => 0,
      'showinfo' => 0,
      'modestbranding' => 1,
    ];
    $params = '?feature=oembed&';
    foreach($args as $arg => $value){
      $params .= $arg;
      $params .= '=';
      $params .= $value;
      $params .= '&';
    }
    $result = str_replace( '?feature=oembed', $params, $html );
  }
  return $result;
}
add_filter('oembed_result', 'imp_custom_youtube_querystring', 10, 3);

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * Shortcodes
 */

function column($column_height, $content, $atts) {
  $classes = array($column_height);
  if (isset($atts['background'])) {
    array_push($classes, 'bg-' . $atts['background']);
  }
  return '<div class="' . join(' ', $classes) . '">' . $content . '</div>';
}

function half( $atts, $content ){
  return column('half', do_shortcode($content), $atts);
}

function three( $atts, $content ){
  return column('three', do_shortcode($content), $atts);
}

function two( $atts, $content ){
  return column('two', do_shortcode($content), $atts);
}

function one( $atts, $content ){
  return column('one', do_shortcode($content), $atts);
}

function section( $atts, $content ){
  return '<div class="section">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'three', 'three' );
add_shortcode( 'half', 'half' );
add_shortcode( 'one', 'one' );
add_shortcode( 'two', 'two' );
add_shortcode( 'section', 'section' );

/* 
 *  Featured image sizes
 */

add_image_size( 'header', 1200, 650, array('center', 'top'));
add_image_size( 'two-row', 800, 600, array('center', 'top', true));
add_image_size( 'one-row', 800, 300, array('center', 'top', true));
add_image_size( 'wide', 1000, 250, array('center', 'top'));
