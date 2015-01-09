<?php
/*  The Template for displaying all single posts
 	Changes made here only apply to "singular" views */

get_header(); ?>

<div id="page">

	<div class="row" role="main">
	
		<div class="large-12 columns">
		
			<?php while(have_posts()): the_post(); ?>
			
			<?php get_template_part('content', get_post_format()); ?>
			
			<?php fp_meta(); ?>

			<?php comments_template('', true); ?>
			
		<?php endwhile; ?>
		
		</div>
		
	</div><!--/.row -->
	
</div><!-- /#page -->

<?php get_footer(); ?>