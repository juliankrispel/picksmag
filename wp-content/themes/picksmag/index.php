<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package picksmag
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

      $left_stack = 0;
      $right_stack = 0;
      $index = 0;

      /* Start the Loop */
      while ( have_posts() ) : the_post();
        $thumb_height = get_post_meta(get_the_id(), 'thumb_height', true);
        $thumb_class = '';

        // if we're on the right side of the stack
        if ($left_stack > $right_stack) {
          $right_stack++;
          $thumb_class.= ' right';
          if ($thumb_height == 'two') {
            $right_stack++;
          }
        } else {
          $left_stack++;
          if ($thumb_height == 'two') {
            $left_stack++;
          }
        }

      ?><a
          class="thumb <?php echo $thumb_class; ?>"
          href="<?php echo the_permalink(); ?>">
       <?php the_post_thumbnail($thumb_height . '-row'); ?>
       <div class="thumb-title">
         <h2><?php the_title();?></h2>
       </div>
       </a> <?php
      $index++;
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
