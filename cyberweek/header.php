<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CyberWeek
 */

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@400;600&display=swap" rel="stylesheet" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
    <title><?php bloginfo( 'name' ); ?> <?php bloginfo( 'description' ); ?></title>
</head>

<body class="custom-background wp-custom-logo customize-support">
    <div class="wrapper">
        <header class="header">
            <div class="header__container">
                <div class="header__logo">
                    <?php echo get_custom_logo(); ?>
                </div>
                <nav class="header__nav">
                    <?php get_search_form(); ?>
                    <?php wp_nav_menu( [
                        'theme_location'  => 'header_nav',
                        'container'       => null,
                        'menu_class'    => 'header__nav-list'
                    ] );?>
                </nav>
                <div class="header__login">
                    <?php wp_loginout( $_SERVER['REQUEST_URI']); ?>
                </div>
                <div class="header__burger">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17px"
                        height="16px">
                        <path fill-rule="evenodd" fill="rgb(230, 231, 242)"
                            d="M-0.000,-0.000 L17.000,-0.000 L17.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z" />
                        <path fill-rule="evenodd" fill="rgb(230, 231, 242)"
                            d="M-0.000,7.000 L17.000,7.000 L17.000,9.000 L-0.000,9.000 L-0.000,7.000 Z" />
                        <path fill-rule="evenodd" fill="rgb(230, 231, 242)"
                            d="M-0.000,14.000 L17.000,14.000 L17.000,16.000 L-0.000,16.000 L-0.000,14.000 Z" />
                    </svg>
                </div>
            </div>
        </header>