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

  <div class="main-navigation">
    <nav id="site-navigation" role="navigation">
      <a class="grid-link icon-grid-view" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
      <a class="archive-link icon-list-view" href="<?php echo esc_url( home_url( '/archive' ) ); ?>"></a>
    </nav><!-- #site-navigation -->

    <header id="masthead" role="banner">
      <div>
        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri(); ?>/logo.png"/>
        </a>
      </div>
    </header><!-- #masthead -->
  </div>

  <div id="content" class="site-content">
