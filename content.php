<?php
/**
 * @package wds_portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wds_portfolio_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>

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
