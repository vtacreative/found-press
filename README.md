<p font-family:'Courier';>A(nother) Foundation-based starter theme for rapid deployment of responsive WordPress themes. Currently riding on Foundation 5.2.3 with Slick Slider. Install in themes directory and activate to use. http://foundation.zurb.com/</p>

<h1>Use</h1>

<p font-family:'Courier';>The easiest way to build a project with Found-Press is to run the following in your Terminal:</p>

<code>
	
	mkdir wp && cd wp && wget http://wordpress.org/latest.tar.gz && tar xfvz latest.tar.gz && cd wordpress && mv * ../ && cd ../ && rm -rf wordpress && rm -f latest.tar.gz && rm license.txt && rm readme.html && mv * ../ && cd ../ && rm -rf wp && cd wp-admin && rm install.php && git clone https://gist.github.com/deddb1b5e72d385b9b1f.git && cd deddb1b5e72d385b9b1f && mv fp-install.php install.php && mv install.php ../ && cd ../ && rm -rf deddb1b5e72d385b9b1f && cd ../wp-content/themes && rm -rf twentythirteen && rm -rf twentyfourteen && rm -rf twentytwelve && rm -rf twentyfifteen && git clone https://github.com/CL75/found-press.git && git clone https://gist.github.com/5028400.git && mv 5028400 fp-child && cd fp-child && mv fp-child-head style.css && git clone https://gist.github.com/b6b216c84d59f37c8e7f.git && cd b6b216c84d59f37c8e7f && mv style.php ../ && cd ../ && rm -rf b6b216c84d59f37c8e7f && cd ../../.. && mv wp-config-sample.php wp-config.php && mate .
	
	
</code>