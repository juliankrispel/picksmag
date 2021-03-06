<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package picksmag
 */

  $header_video = get_post_meta(get_the_id(), 'header_video', true);
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="post-header">
    <div class="fade-in">
      <?php
        if (trim($header_video) != '') {
          echo wp_oembed_get($header_video);
        } else {
          the_post_thumbnail('header');
        }
      ?>
    </div>
    <div class="post-header__text">
      <div>
        <?php
        if ( is_single() ) {
          the_title( '<div><div class="swoop-left inline-block padding-small padding-left bg-dark"><h1 class="font-size-normal post-header__title line-height-normal">', '</h1></div></div>' );
          ?>
            <div>
              <div class="inline-block padding bg-dark swoop-left-1">
                <h2 class="line-height-normal no-margin"><?php echo get_nskw_subtitle() ?></h2>
              </div>
            </div>
  <?php
        } else {
          the_title( '<h2 class=""><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          ?><h3><?php echo get_nskw_subtitle() ?></h3><?php
        }
          if ( 'post' === get_post_type() ) : ?>
          <div>
            <div class="margin-left-small margin-top-small">
              <div class="inline-block padding-small bg-dark swoop-left-2">
                <div class="post-header__date line-height-normal">
                  <?php picksmag_posted_on(); ?>
                </div><!-- .entry-meta -->
              </div>
            </div>
          </div>
        <?php ?>
      </div>
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
