<?php
/* FOOTER */
?>
	<footer class="footer-container">
		<div class="row">
			
			<!-- COL1 -->
			<div class="large-3 columns">
				<p>For rapid deployment of WordPress themes. <br><a href="">Learn More &rarr;</a></p>
			</div>
			<!-- COL2 -->
			<div class="large-2 columns">
				<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container_class' => 'nav', 'sort_column' => 'menu_order')); ?>
			</div>
			<!-- COL3 -->
			<div class="large-2 columns">
				<ul class="no-bullet">
					<li>Client</li>
					<li><a href="">About</a></li>
					<li><a href="">Map</a></li>
					<li><a href="">Blog</a></li>
					<li><a href="">Privacy</a></li>
					<li><a href="">Terms</a></li>
				</ul>
			</div>
			<!-- COL4 -->
			<div class="large-2 columns">
				<img src="http://www.placehold.it/150x40"><br><br>
				<img src="http://www.placehold.it/150x40"><br><br>
				<img src="http://www.placehold.it/150x40">
			</div>
			<!-- COL5 -->
			<div class="large-3 columns">
				<h4>"Let me tell you about how fantastically awesome this business is."</h4>
				<p>&mdash;<i>Happy Customer</i></p>
			</div>

		</div>
	</footer>

</div>

<!-- COPYRIGHT -->
<div class="row">
	<div class="large-12 columns">
		<p class="copyright">By <a href="https://github.com/CL75">CL75</a>. A work in progress... <span style="font-size:24px;" class="scroll right"><a href="#top"><i class="enclosed foundicon-up-arrow"></i></a></span></p>
	</div>
</div> 

<?php echo '<script src="' . get_theme_root_uri() .'/found-press/js/jquery.js"></script>'; ?>

<script>
$(function() {
    $('span.scroll a').bind('click',function(event){
        var $anchor = $(this);
 
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000);
        /*
        if you don't want to use the easing effects:
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000);
        */
        event.preventDefault();
    });
});
</script>
<?php wp_footer(); ?>
</body>
</html>