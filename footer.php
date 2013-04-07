<?php
/* footer content */
?>
	<div class="footer-container">
		<footer class="row" role="contentinfo">
			<div class="large-3 columns">
				<ul class="no-bullet">
					<li class="footer-subhead">Short bios are in</li>
				</ul>
				<small>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.<small>
				<form class="cntrd" role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
					<input class="r10" type="text" value="Search" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="go" />
				</form>
			</div>
			<div class="large-3 columns">
				<ul class="links no-bullet">
					<li class="footer-subhead">Client</li>
					<li><a href="">About</a></li>
					<li><a href="">Map</a></li>
					<li><a href="">Blog</a></li>
					<li><a href="">Privacy</a></li>
					<li><a href="">Terms</a></li>
				</ul>
			</div>
			<div class="large-3 columns">
				<ul class="no-bullet">
					<li class="footer-subhead">Fancy Badges</li>
					<li><img src="http://www.placehold.it/150x40"></li>
					<li><img src="http://www.placehold.it/150x40"></li>
					<li><img src="http://www.placehold.it/150x40"></li>
				</ul>
			</div>
			<div class="large-3 columns">
				<h2 class="footer-callout">"Let me tell you about how fantastically awesome I am."</h2>
				<p class="">&mdash;<i>Owner</i></p>
			</div>
		</footer><!--/.row-->
	
		<div class="row">
			<div class="large-12 columns">
				<p class="copyright">&copy; <?php echo date('Y'); ?> Awesome Client<span class="back-to-top right"><a href="#">Back to Top &#8593;</a></span></p>
			</div>
		</div>
	</div><!--.footer-container-->
</div><!--/#page-->
<?php wp_footer(); ?>
</body>
</html>