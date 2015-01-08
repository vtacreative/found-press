<?php
/* Displays content when nothing more specific matches a query.
   http://codex.wordpress.org/Template_Hierarchy */
get_header(); ?>

	<?php if(is_home()): ?>
			
		<div id="birthfit" class="row full-width">
		
			<div class="medium-4 medium-offset-6 columns">

			  <h3 style="color:white;padding-top:14px;">Brianna Battles, MS, CSCS</h3>
	
				<p>Brianna is a strength, conditioning and wellness coach who specializes in women's health and fitness.  She facilitates an empowering, supportive environment that educates and provides all-encompassing lifestyle wellness.</p>
	
				<img width="110" src="/wp-content/themes/fp-child/img/birthfit-logo.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<a class="button tiny" href="/coaching-services/">Learn More &rarr;</a>
				
			</div>
			
		</div>

	<?php endif; ?>

	<?php if(have_posts()): // start loop if posts exist ?>
		
		<?php while(have_posts()): the_post(); ?>
			
			<?php get_template_part('content', get_post_format()); ?>
			
		<?php endwhile; ?>
		
		<div id="page-navigation" class="row">
		
			<div class="medium-12 large-12 columns">
			
				<h6><?php posts_nav_link( '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;' , '&larr; Newer Posts' , 'Older Posts &rarr;' ); ?></h6>
				
				</div>
			
		</div>
		
	<?php endif; ?><!--/have_posts()-->
		
<?php get_footer(); ?>