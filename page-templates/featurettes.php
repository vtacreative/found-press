<?php
/* Template Name: Featurettes */
get_header(); ?>



<!-- SLICK SLIDER
 			Something about the slider causes horizontal scrolling on 320 portrait -->
<section>
	<div class="slider single-item">
	  <div><img src="http://placehold.it/1400x450&amp;text={under-construction}"></div>
	  <div><img src="http://placehold.it/1400x450&amp;text={a-work-in-progress}"></div>
	  <div><img src="http://placehold.it/1400x450&amp;text={code-in-development}"></div>
	</div>
</section>

<section>
	
<!--  Why does this output a perfectly center list while the wp_get_nav doesn't??
	<div class="row">
		<div class="large-12 columns h">
			<div class="nav table">
				<ul id="menu-header-menu" class="no-bullet menu">
					<li><a href="">Home</a></li>
					<li><a href="">Features</a></li>
					<li><a href="">Snippets</a></li>
					<li><a href="">Docs</a></li>
				</ul>
			</div>
		</div>
	</div>-->

	
</section>

<!-- 3-UP MARKETING SECTION -->
<section class="three-up">
	<div class="row">
		<div class="large-4 columns text-center">
			<h1>Fast.</h1>
			<p>found-press helps developers with rapid deployment of responsive WordPress themes. Use it to build quick prototypes or as full-on production code.</p>
			<a href="#" class="small button success round">Download</a>
		</div>
		<div class="large-4 columns text-center">
			<h1>Flexible.</h1>
			<p>found-press generally avoids assumptions about things like typography and color. Don't like the defaults? Roll your own styles.</p>
			<a href="#" class="small button success round">Customize</a>
		</div>
		<div class="large-4 columns text-center">
			<h1>Free.</h1>
			<p>found-press is open source. You can grab the code off GitHub and are more than welcomed to submit pull requests, fix bugs or give feedback.</p>
			<a href="https://github.com/CL75/found-press" target="blank" class="small button success round">GitHub</a>
		</div>
	</div>
</section>

<section>
	<div>
		<div class="large-12 columns">
			<h4>3 Key Deployment!</h4>
			<p>Open up Terminal, type "edbsh" and add the following line:</p>
			<p>
				alias nfp='mkdir wp && cd wp && wget http://wordpress.org/latest.tar.gz && tar xfvz latest.tar.gz && cd wordpress && mv * ../ && cd ../ && rm -rf wordpress && rm -f latest.tar.gz && rm license.txt && rm readme.html && mv * ../ && cd ../ && rm -rf wp && cd wp-content/themes && rm -rf twentythirteen && git clone https://github.com/CL75/found-press.git && git clone https://gist.github.com/5028400.git && mv 5028400 fp-child && cd fp-child && mv fp-child-head style.css && cd ../../.. && mv wp-config-sample.php wp-config.php && mate .'
			</p>
			<p>We're making a directory called "wp", installing the latest version of WordPress, cleaning up after ourselves by deleting temporary directories, tightening security a little by deleting the license and readme, deleting the default themes, cloning a fresh copy of found-press into the themes directory, creating a child theme called fp-child, renaming the sample to wp-config.php and opening the project in TextMate. You might want to alter that to the IDE of your choice. Also be sure to run this inside a directory with the desired project name else you'll end up with a big mess.</p>
		</div>
	</div>
</section>

<section>
	<div class="row">
		<div class="small-2 columns c">
			<h6>S</h6>
		</div>
		
		<div class="small-10 columns d">
			<h6>Some Heading</h6>
		</div>
	
		<div class="small-4 columns b">
			<h6>S</h6>
		</div>
		
		<div class="small-8 columns a">
			<h6>Some Heading</h6>
		</div>
	
		<div class="small-6 columns r">
			<h6>S</h6>
		</div>
		
		<div class="small-6 columns v">
			<h6>Some Heading</h6>
		</div>
	</div>
</section>

<!-- SECONDARY MARKETING -->
<section class="secondary dark-wall">
	
	<!-- ROW1 -->
	<div class="row">
		<div class="small-4 large-2 columns a">
			<a href="https://github.com/CL75/found-press" target="blank"><i class="social foundicon-github"></i></a>
		</div>
		<div class="small-8 large-4 columns c">
			<p><span class="secondary-head">Rapid Deployment</span><br>Fork the code off Github and get your project up and running quickly <a href="https://github.com/CL75/found-press" target="blank">&rarr;</a></p>
		</div>



		<div class="small-4 large-2 columns a">
			<a href=""><i class="accessibility foundicon-w3c"></i></a>
		</div>
		<div class="small-8 large-4 columns c">
			<p><span class="secondary-head">Tested Code</span><br>Thousands of hours of tested code gives your project instant maturity <a href="">&rarr;</a></p>
		</div>
	</div>

	<!-- ROW2 -->
	<div class="row">
		<div class="large-2 columns a">
			<a href=""><i class="general foundicon-website"></i></a>
		</div>
		<div class="large-4 columns c">
			<p><span class="secondary-head">Responsive Design</span><br>Responsive templates keep your project future-proof <a href="">&rarr;</a></p>
		</div>
		<div class="large-2 columns a">
			<a href=""><i class="general foundicon-tools"></i></a>
		</div>
		<div class="large-4 columns c">
			<p><span class="secondary-head">Options Galore</span><br>Snippets, background patterns, icons, custom post types and more <a href="">&rarr;</a></p>
		</div>
	</div>

	<!-- ROW3 -->
	<div class="row">
		<div class="large-2 columns a">
			<a href=""><i class="general foundicon-idea"></i></a>
		</div>
		<div class="large-4 columns c">
			<p><span class="secondary-head">Mobile First</span><br>Build for small devices first, then add complexity for larger devices <a href="">&rarr;</a></p>
		</div>
		<div class="large-2 columns a" role="main">
			<a href=""><i class="general foundicon-inbox"></i></a>
		</div>
		<div class="large-4 columns c">
			<p><span class="secondary-head">Easy to Use</span><br>Just unpack the contents into your themes folder <a href="">&rarr;</a></p>
		</div>
	</div>
</section>
<!-- END SECONDARY MARKETING -->


				
<?php get_footer(); ?>