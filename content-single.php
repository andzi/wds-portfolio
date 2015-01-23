<?php
/**
 * @package wds_portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php wds_portfolio_posted_on(); ?>
		</div><!-- .entry-meta -->
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php  if ( '' != get_the_post_thumbnail() ) : ?>
			<div class="single-thumbnail-wrapper">
				<?php the_post_thumbnail( 'wds-portfolio-single-img' ); ?>
			</div><!-- .post-thumbnail-wrapper -->
		<?php endif; ?>
		
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wds_portfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wds_portfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
