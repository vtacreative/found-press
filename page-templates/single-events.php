<?php
 /* Template Name: Events Template */
get_header(); ?>

	<div id="primary">
		<div class="row a" role="main">

			<?php
			$mypost = array('post_type' => 'events', );
			$loop = new WP_Query($mypost);	
			while($loop->have_posts()): $loop->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<?php the_post_thumbnail(array(100, 100)); ?>
					<strong>Name: </strong><?php the_title(); ?><br />
					<strong>Desc: </strong>
					<?php echo esc_html(get_post_meta(get_the_ID(), 'event_desc', true)); ?>
				</header>

				<!-- Display movie review contents -->
				<div><?php the_content(); ?></div>
			</article>
			<?php endwhile; ?>
		</div>
</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>