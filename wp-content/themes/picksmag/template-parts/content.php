<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package picksmag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="post-header">
    <?php the_post_thumbnail('header'); ?>
    <div class="post-header__text">
      <?php
      if ( is_single() ) {
        the_title( '<h1 class="post-header__title">', '</h1>' );
        ?><h2><?php echo get_nskw_subtitle() ?></h2><?php
      } else {
        the_title( '<h2 class=""><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        ?><h3><?php echo get_nskw_subtitle() ?></h3><?php
      }
      if ( 'post' === get_post_type() ) : ?>
        <div class="post-header__date">
          <?php picksmag_posted_on(); ?>
        </div><!-- .entry-meta -->
      <?php ?>
    </div>
<?php

    endif; ?>
  </header><!-- .entry-header -->

  <div class="entry-content">

<?php

the_content( sprintf(
  /* translators: %s: Name of current post. */
  wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'picksmag' ), array( 'span' => array( 'class' => array() ) ) ),
  the_title( '<span class="screen-reader-text">"', '"</span>', false )
) );

wp_link_pages( array(
  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'picksmag' ),
  'after'  => '</div>',
) );
?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php picksmag_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
