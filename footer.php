<?php
/* FOOTER */
?>
	<footer id="footer-container" class="n">
		
		<div class="row full-width k">
			
			<!-- COL1 -->
			<div class="medium-3 large-3 columns d">
				
				<p>found-press is useful for the rapid deployment of responsive WordPress themes. <br><a href="">Learn More &rarr;</a></p>
				
			</div>
			
			
			<!-- COL2 -->
			<div class="medium-3 large-3 columns w">
				
				<h4>Footer Menu</h4>
				
				<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container_class' => 'nav', 'sort_column' => 'menu_order')); ?>
				
			</div>
			
			
			<!-- COL3 -->
			<div class="medium-3 large-3 columns k">
				
				<h4>Fancy Badges Go Here.</h4>
				
			</div>
			
			
			<!-- COL4 -->
			<div class="medium-3 large-3 columns b">
				
				<h4>"Let me tell you about how fantastically awesome this codebase is."</h4>
				
				<p>&mdash;<i>Happy Customer</i></p>
				
			</div>

		</div><!--/.row-->
		
	</footer>

</div>


<!-- COPYRIGHT -->
<div id="copyright" class="row l">
	
	<div class="medium-6 large-6 columns footer-left a">
		
		<p><img src="<?php echo FLAG_DIR . 'Spain.png' ?>"><img src="http://localhost:8888/fp/wp-content/themes/found-press/img/fp-logo-small.jpg"/> By <a href="https://github.com/CL75">CL75</a>. A work in progress...</p>
		
	</div>
	
	<div class="medium-6 large-6 columns footer-right c">
		
		<p>
		
			<a href="https://www.twitter.com/"><i class="social foundicon-twitter"></i></a>
			
			<a href="http://www.instagram.com/"><i class="social foundicon-instagram"></i></a>
			
			<a href="https://www.facebook.com/"><i class="social foundicon-facebook"></i></a>
			
			<a class="scroll" href="#top"><i class="enclosed foundicon-up-arrow"></i></a>
			
			<a href="/"><i class="general foundicon-home"></i></a>
			
		</p>
			
	</div>
	
</div> <!--/.row-->

<?php echo '<script src="' . get_template_directory_uri() .'/js/vendor/jquery.js"></script>'; ?>

<script>
// 	SCROLL TO TOP
$(function() {
    $('a.scroll').bind('click',function(event){
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


//	INITIALIZE FASTCLICK
window.addEventListener('load', function() {
    new FastClick(document.body);
}, false);


//	INITIALIZE FOUNDATION JS
$(document).foundation();
</script>

<?php wp_footer(); ?>
<script>
//	INITIALIZE SLICK SLIDER
$(document).ready(function(){
	$('.single-item').slick({
	  dots: true,
		speed: 500,
		arrows: true,
		autoplay: true
	});
});
</script>
</body>
</html>