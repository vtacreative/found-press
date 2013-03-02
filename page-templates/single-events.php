<?php
 /* Template Name: Events */
get_header(); ?>

	<div id="primary">
		<div class="row" role="main">

			<?php
			$mypost = array('post_type' => 'events', );
			$loop = new WP_Query($mypost);	
			while($loop->have_posts()): $loop->the_post();
			?>
			<div class="four columns end">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php echo esc_html(get_post_meta(get_the_ID(), 'event_date', true)); ?>
						<p><?php the_content(); ?></p>
						<a href="<?php echo esc_html(get_post_meta(get_the_ID(), 'link1_url', true)); ?>" target="_blank"><?php echo esc_html(get_post_meta(get_the_ID(), 'link1_text', true)); ?></a>
						<a href="<?php echo esc_html(get_post_meta(get_the_ID(), 'link2_url', true)); ?>" target="_blank"><?php echo esc_html(get_post_meta(get_the_ID(), 'link2_text', true)); ?></a>
					</header>		
				</article>
			</div>
			<?php endwhile; ?>
		</div>
	</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>