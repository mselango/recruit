<?php

/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Recruitment
 * @since Recruitment V 1.0
 */
/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('recruitment_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own recruitment_setup() function to override in a child theme.
     *
     * @since Recruitment V 1.0
     */
    function recruitment_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Sixteen, use a find and replace
         * to change 'recruitment' to the name of your theme in all the template files
         */
        load_theme_textdomain('recruitment', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 0, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'recruitment'),
            'social' => __('Social Links Menu', 'recruitment'),
            'footer1' => __('Footer Menu 1', 'recruitment'),
            'footer2' => __('Footer Menu 2', 'recruitment'),
            'footer3' => __('Footer Menu 3', 'recruitment'),
            'footer4' => __('Footer Menu 4', 'recruitment'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', recruitment_fonts_url()));
    }

endif; // recruitment_setup
add_action('after_setup_theme', 'recruitment_setup');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Recruitment V 1.0
 */
function recruitment_content_width() {
    $GLOBALS['content_width'] = apply_filters('recruitment_content_width', 840);
}

add_action('after_setup_theme', 'recruitment_content_width', 0);

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Recruitment V 1.0
 */
function recruitment_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'recruitment'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'recruitment'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 1', 'recruitment'),
        'id' => 'sidebar-2',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'recruitment'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Newsletter', 'recruitment'),
        'id' => 'sidebar-3',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'recruitment'),
        'before_widget' => '<div  class="col-md-2">',
        'after_widget' => '</div>',
        'before_title' => '<h4 >',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Right Siderbar', 'recruitment'),
        'id' => 'right-sidebar',
        'description' => __('Appears at the right side of the content on posts and pages.', 'recruitment'),
        'before_widget' => '<div class="single-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'recruitment_widgets_init');

if (!function_exists('recruitment_fonts_url')) :

    /**
     * Register Google fonts for Twenty Sixteen.
     *
     * Create your own recruitment_fonts_url() function to override in a child theme.
     *
     * @since Recruitment V 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function recruitment_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Merriweather font: on or off', 'recruitment')) {
            $fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
        }

        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'recruitment')) {
            $fonts[] = 'Montserrat:400,700';
        }

        /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'recruitment')) {
            $fonts[] = 'Inconsolata:400';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Recruitment V 1.0
 */
function recruitment_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'recruitment_javascript_detection', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Recruitment V 1.0
 */
function remove_core_scripts() {

    // wp_deregister_script('jquery'); 
}

add_action('init', 'remove_core_scripts'); // Add Custom Scripts 

function recruitment_scripts() {


    // Theme stylesheet.
    wp_enqueue_style('recruitment-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array('recruitment-style'));
    wp_enqueue_style('carousel', get_template_directory_uri() . '/css/carousel.css', array('bootstrap'));
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array('carousel'));
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array('style'));
    wp_enqueue_style('fontello', get_template_directory_uri() . '/css/fontello.css', array('responsive'));
    wp_enqueue_style('carousel1', get_template_directory_uri() . '/css/owl.carousel.css', array('fontello'));
    wp_enqueue_style('theme', get_template_directory_uri() . '/css/owl.theme.css', array('carousel1'));
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array('theme'));
    wp_enqueue_style('animations', get_template_directory_uri() . '/css/animations.css', array('animate'));
    wp_enqueue_style('viewport', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css', array('animations'));
     wp_enqueue_style('hover', get_template_directory_uri() . '/css/hover.css', array('viewport'));
      wp_enqueue_style('customcss', get_template_directory_uri() . '/css/custom.css', array('hover'));
    //  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array('font-awesome') );
    // Load the html5 shiv.

    wp_enqueue_script('emulation', get_template_directory_uri() . '/js/ie-emulation-modes-warning.js');
    //  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.2.0.js','',TRUE );
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('emulation'), '', TRUE);
    wp_enqueue_script('holder', get_template_directory_uri() . '/js/vendor/holder.min.js', array('bootstrapjs'), '', TRUE);
    wp_enqueue_script('workaround', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('holder'), '', TRUE);
    wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('workaround'), '', TRUE);
    wp_enqueue_script('easing', get_template_directory_uri() . '/js/easing.js', array('owl.carousel', '', TRUE));
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('easing', '', TRUE));
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('modernizr', '', TRUE));
    wp_enqueue_script('smoothwheel.smoothwheel', get_template_directory_uri() . '/js/jquery.smoothwheel.js', array('smoothwheel', '', TRUE));
    
  

}

add_action('wp_enqueue_scripts', 'recruitment_scripts');

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item) {
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}
require get_template_directory() . '/testimonial_widget.php';
require get_template_directory() . '/social_widget.php';
require get_template_directory() . '/links_widget.php';
require  get_template_directory() . '/icon-with-address.php';

//require  get_template_directory() . '/mywidget.php';
