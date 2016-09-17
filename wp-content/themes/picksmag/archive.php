<?php
/*
Template Name: Archives
*/
get_header(); ?>
<?php 
    $wq = new WP_Query('orderby=date&order=DESC'); // $args are the same as the args for query_posts()
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( $wq->have_posts() ) :
      /* Start the Loop */
      while ( $wq->have_posts() ) : $wq->the_post();

      ?><a class="thumb archive-thumb" href="<?php echo the_permalink(); ?>">
       <?php the_post_thumbnail('wide'); ?>
       <div class="thumb-title">
         <div class="thumb-title__content">
           <h2><?php the_title();?></h2>
           <h3><?php echo get_nskw_subtitle() ?></h3>
         </div>
       </div>
       </a> <?php

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
