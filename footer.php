<?php
/**
 * footer content and the closing of the
 * #main and #page div elements.
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<footer class="row" role="contentinfo">
		<div class="twelve columns panel">
			<?php do_action( 'twentytwelve_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
		</div>
	</footer><!--/.row-->
</div><!--/#page-->

<?php wp_footer(); ?>
</body>
</html>