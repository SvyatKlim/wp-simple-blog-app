<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until first section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elvinci
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="main-wrapper">
    <header class="header">
        <div class="header__container js-header-wrapper">
            <a class="header__logo" href="/">
                <picture>
<!--                    <source srcset="--><?//= build_webp_path(get_custom_logo_url()); ?><!--" type="image/webp">-->
                    <img src="<?= esc_attr(get_custom_logo_url()); ?>"
                         alt="<?= the_title() ?>">
                </picture>
            </a>
            <div class="header__burger js-nav-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header-nav__overlay"></div>
            <nav class="header-nav js-nav">
                <?php
                $args = array(
                    'walker' => new Basic_Walker(),
                    'container' => false,
                    'menu_class' => 'header-nav__container',
                    'theme_location' => 'primary-menu',
                    'fallback_cb' => false
                );
                wp_nav_menu($args);
                ?>
            </nav>
        </div>
    </header>
    <main class="main">