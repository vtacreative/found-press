<?php
 /* Template Name: Events Template */
get_header(); ?>

	<div id="primary">
		<div class="row" role="main">

			<?php
			$mypost = array('post_type' => 'events', );
			$loop = new WP_Query($mypost);	
			while($loop->have_posts()): $loop->the_post();
			?>
			<div class="four columns panel end">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php the_post_thumbnail(array(100, 100)); ?>
						<strong>Name: </strong>
						<?php echo esc_html(get_post_meta(get_the_ID(), 'event_name', true)); ?>
						<strong>Desc: </strong>
						<?php echo esc_html(get_post_meta(get_the_ID(), 'event_desc', true)); ?>
					</header>
					<?php the_title(); ?>
					<?php the_content(); ?>
				</article>
			</div>
			<?php endwhile; ?>
		</div>
	</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>