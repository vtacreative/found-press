<?php
/*
 * Template Name: Front Page Template
 * Description: A page template that provides a crafted introductory page. 
 * A page content area for adding text, images, video, etc. 
 * followed by front-page-only widgets in one or two columns.
 */
get_header(); ?>
	<div class="row">
		<div class="twelve columns panel">
			<div class="six columns" role="main">
				<?php while(have_posts()): the_post(); ?>
					<?php if(has_post_thumbnail()): ?>
						<div>
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>
					<?php get_template_part('content', 'page'); ?>
				<?php endwhile; ?>
			</div>
			<div class="six columns">
				<h1>And Much More</h1>
				<p>This is a sample front page. It has lorem ipsum text, like this: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum. Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue. Aliquam vehicula mi at mauris. Maecenas placerat, nisl at consequat rhoncus, sem nunc gravida justo, quis eleifend arcu velit quis lacus. Morbi magna magna, tincidunt a, mattis non, imperdiet vitae, tellus. Sed odio est, auctor ac, sollicitudin in, consequat vitae, orci. Fusce id felis. Vivamus sollicitudin metus eget eros.

	Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In posuere felis nec tortor. Pellentesque faucibus. Ut accumsan ultricies elit. Maecenas at justo id velit placerat molestie. Donec dictum lectus non odio. Cras a ante vitae enim iaculis aliquam. Mauris nunc quam, venenatis nec, euismod sit amet, egestas placerat, est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras id elit. Integer quis urna. Ut ante enim, dapibus malesuada, fringilla eu, condimentum quis, tellus. Aenean porttitor eros vel dolor. Donec convallis pede venenatis nibh. Duis quam. Nam eget lacus. Aliquam erat volutpat. Quisque dignissim congue leo.</p>
			</div>
		</div>
	</div><!--/.row-->

<?php get_sidebar('front'); ?>
<?php get_footer(); ?>