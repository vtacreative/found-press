<p font-family:'Courier';>A(nother) Foundation-based starter theme for rapid deployment of responsive WordPress themes. Currently riding on Foundation 5.2.3 with Slick Slider. Install in themes directory and activate to use. http://foundation.zurb.com/</p>

<h1>Use</h1>

<p font-family:'Courier';>The easiest way to build a project with Found-Press is to run the following in your Terminal, within a directory with your desired project name:</p>

<code>mkdir wp && cd wp && wget http://wordpress.org/latest.tar.gz && tar xfvz latest.tar.gz && cd wordpress && mv * ../ && cd ../ && rm -rf wordpress && rm -f latest.tar.gz && rm license.txt && rm readme.html && mv * ../ && cd ../ && rm -rf wp && cd wp-admin && rm install.php && git clone https://gist.github.com/deddb1b5e72d385b9b1f.git && cd deddb1b5e72d385b9b1f && mv fp-install.php install.php && mv install.php ../ && cd ../ && rm -rf deddb1b5e72d385b9b1f && cd ../wp-content/themes && rm -rf twentythirteen && rm -rf twentyfourteen && rm -rf twentytwelve && rm -rf twentyfifteen && git clone https://github.com/CL75/found-press.git && git clone https://gist.github.com/5028400.git && mv 5028400 fp-child && cd fp-child && mv fp-child-head style.css && cd ../../.. && mv wp-config-sample.php wp-config.php</code>

<p font-family:'Courier';>Specifically, running this command from your HTDOCS file or web server should:</p>

<ul>
	
	<li>Make a directory called "wp" in our root folder and change directories</li>
	<li>Install the latest version of WordPress, unzip it and change directories</li>
	<li>Delete license.txt and readme.html in the interest of security</li>
	<li>Move the entire WP directory structure into our root folder</li>
	<li>Clean up after ourselves a little</li>
	<li>Run a custom wp-install.php file to set some WP defaults</li>
	<li>Remove the default WordPress twenty- themes</li>
	<li>Clone a fresh copy of Found-Press into the themes directory</li>
	<li>Create a child theme called fp-child and load it with commonly overridden files and a deprecated style.php file</li>
	
</ul>

<p>After establishing your database credentials you can navigate to wp-config.php and proceed as usual per WP installation.</p>