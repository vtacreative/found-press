<?php
 /* Template Name: Testimonials */
get_header(); ?>

	<div id="primary">
		<div class="row" role="main">

			<?php
			$mypost = array('post_type' => 'testimonials', );
			$loop = new WP_Query($mypost);	
			while($loop->have_posts()): $loop->the_post();
			?>
			<div class="four columns panel end c">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php the_post_thumbnail(array(100, 100)); ?>
						<h4><?php the_content(); ?></h4>
						<p>&mdash;<?php the_title(); ?></p>
					</header>		
				</article>
			</div>
			<?php endwhile; ?>
		</div>
	</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>