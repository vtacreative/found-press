<?php
/* The default template for displaying content. 
   Used for both single and index/archive/search. */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="row">

			<div class="medium-4 columns">

				<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-circle attachment-post-thumbnail")); ?>

			</div><!--/medium-4 columns-->

			<div class="medium-8 columns">
		
				<div class="content-body">

					<?php the_content(); ?>

				</div><!--/.content-body-->

			</div><!--/.medium-8 columns-->

		</div><!--/.row-->
		
	</article>