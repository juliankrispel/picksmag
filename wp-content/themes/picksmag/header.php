<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package picksmag
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,900italic|Open+Sans:400,700,600,800italic' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'picksmag' ); ?></a>
  <?php if (!is_front_page() && !is_page()) { ?>
    <div class="main-navigation bg-dark">
      <header id="masthead" role="banner">
          <nav class="text-center flex flex-column full-height absolute" id="site-navigation" role="navigation">
            <a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <img class="full-width" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri(); ?>/logo.svg"/>
            </a>
            <span class="nav-divider"></span>
            <a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/grid-view.png" alt="Grid View Icon"/>
            </a>
            <a class="nav-link" href="<?php echo esc_url( home_url( '/archive' ) ); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/list-view.png" alt="List View Icon"/>
            </a>
            <span class="nav-divider"></span>
            <a class="nav-link" href=""><em class="text-white fa fa-instagram"></em></a>
            <a class="nav-link" href=""><em class="text-white fa fa-twitter"></em></a>
            <a class="nav-link" href=""><em class="text-white fa fa-facebook"></em></a>
            <a class="nav-link" href=""><em class="text-white fa fa-paypal"></em></a>
          </nav><!-- #site-navigation -->
      </header><!-- #masthead -->
    </div>
  <?php } else { ?>
    <header id="masthead" role="banner">
        <nav class="text-center flex flex-row full-width max-height-50" role="navigation">
          <a class="horizontal-nav-link nav-link " href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img class="full-height width-auto" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri(); ?>/logo.svg"/>
          </a>
          <span class="horizontal-nav-divider nav-divider"></span>
          <a class="horizontal-nav-link nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img class="full-height width-auto" src="<?php echo get_template_directory_uri(); ?>/grid-view.png" alt="Grid View Icon"/>
          </a>
          <a class="horizontal-nav-link nav-link" href="<?php echo esc_url( home_url( '/archive' ) ); ?>">
            <img class="full-height width-auto" src="<?php echo get_template_directory_uri(); ?>/list-view.png" alt="List View Icon"/>
          </a>
          <span class="horizontal-nav-divider nav-divider"></span>
          <a class="horizontal-nav-link nav-link" href=""><em class="text-white fa fa-instagram"></em></a>
          <a class="horizontal-nav-link nav-link" href=""><em class="text-white fa fa-twitter"></em></a>
          <a class="horizontal-nav-link nav-link" href=""><em class="text-white fa fa-facebook"></em></a>
          <a class="horizontal-nav-link nav-link" href=""><em class="text-white fa fa-paypal"></em></a>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
  <?php } ?>

  <div id="content" class="site-content">
