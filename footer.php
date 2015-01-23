<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wds_portfolio
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wds_portfolio' ) ); ?>"><?php printf( __( 'Proudly powered by %s.', 'wds_portfolio' ), 'WordPress' ); ?></a>
			
			<?php printf( __( '%1$s by %2$s.', 'wds portfolio' ), 'wds_portfolio', '<a href="http://wds-portfolio.themeindex.net" rel="designer">Theme Index</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
