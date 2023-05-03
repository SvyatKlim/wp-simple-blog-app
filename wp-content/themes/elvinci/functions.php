<?php
/**
 * elvinci functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elvinci
 */


if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}


if (!defined('_STARTER_THEME_URI')) {
    define('_STARTER_THEME_URI', get_template_directory_uri());
}

if (!function_exists('starter_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function starter_theme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on elvinci, use a find and replace
         * to change 'elvinci' to the name of your theme in all the template files.
         */
        // @TODO
        // load_theme_textdomain( 'elvinci', get_template_directory() . '/languages' );

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
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary-menu' => esc_html__('Primary', 'elvinci'),
                'footer-menu' => esc_html__('Footer', 'elvinci'),
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );

    }
endif;
add_action('after_setup_theme', 'starter_theme_setup');

/**
 * Enqueue scripts and styles.
 */
function starter_theme_scripts()
{

    wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/assets/fonts/stylesheet.css');
    wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/assets/styles/normalize.css');
    wp_enqueue_style('swiper-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.4/swiper-bundle.min.css', array(), _S_VERSION);
    wp_enqueue_style('starter_theme-style', _STARTER_THEME_URI . '/assets/styles/styles.css', array(), _S_VERSION);

    wp_add_inline_script('jquery', 'var $ = jQuery.noConflict();');
    wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.4/swiper-bundle.min.js', array(), _S_VERSION, true);
    wp_register_script('starter_theme-main-js', _STARTER_THEME_URI . '/assets/js/scripts.js',
        array(
            'jquery',
        ), _S_VERSION, $in_footer = true);

    wp_enqueue_script('starter_theme-main-js');
}

add_action('wp_enqueue_scripts', 'starter_theme_scripts');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}
/**
 * ACG + Guttenberg Blocks.
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Helpers.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Menus Customizations.
 */
require get_template_directory() . '/inc/menus.php';


