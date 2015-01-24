<?php
/*
 * Template Name: Homepage Template
 *
 * @package wds_portfolio
*/

get_header();
?>

<div id="page" class="hfeed site">
<div id="main" class="site-main">
	
		<?php if ( ! get_theme_mod( 'wds_portfolio_hide_portfolio_page_content' ) ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_title( '<header class="page-header"><h1 class="page-title">', '</h1></header>' ); ?>

				<div class="page-content">
					<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wds_portfolio' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .page-content -->

			<?php endwhile; // end of the loop. ?>
		<?php endif; ?>

		<div class="portfolio-filter">
			<ul>
				<li id="filter--all" class="filter active" data-filter="*"><?php _e( 'View All' ) ?></li>
				<?php 
					// list terms in a given taxonomy
					$taxonomy = 'jetpack-portfolio-type';
					$tax_terms = get_terms( $taxonomy );

					foreach ( $tax_terms as $tax_term ) {
					echo '<li class="filter" data-filter=".'. $tax_term->name.'">' . $tax_term->name .'</li>';
					}
				?>
			</ul>
		</div>

		<div class="portfolio">
			<?php
				if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = -1;
				endif;

				$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '-1' );

				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'paged'          => $paged,
					'posts_per_page' => $posts_per_page,
				);

				$project_query = new WP_Query ( $args );

				if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

					while ( $project_query -> have_posts() ) : $project_query -> the_post();

						get_template_part( 'content', 'portfolio' );

					endwhile;

					wds_portfolio_paging_nav( $project_query->max_num_pages );

					wp_reset_postdata();

				else :
			?>

				<section class="no-results not-found">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'No Project Found', 'wds_portfolio' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<?php if ( current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'wds_portfolio' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

						<?php else : ?>

							<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wds_portfolio' ); ?></p>

						<?php endif; ?>
					</div><!-- .page-content -->
				</section><!-- .no-results -->
			<?php endif; ?>
			</div><!-- .portfolio -->

<?php get_footer(); ?>