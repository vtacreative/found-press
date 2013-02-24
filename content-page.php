<?php
/* differentiates a page from the post feed, front page, etc. */
?>
	<article class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="twelve columns c">
		<header>
			<h1><?php the_title(); ?></h1>
		</header>

		<div>
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<div' . __('Pages:'), 'after' => '</div>')); ?>
		</div>
		<footer>
			<?php edit_post_link( __('Edit'), '<span>', '</span>'); ?>
		</footer>
		</div>
	</article><!--/.row-->