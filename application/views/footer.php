     <!--begin footer -->
	<footer id="footer" class="clearfix">		
		<!--change this to your stuff-->
		<section class="footerCredits">
			<div class="container">
				<ul class="clearfix">
					<li>&copy; 2012 Your Company Name. All rights reserved.</li>
					<li><a href="sitemap.html">Site Map</a></li>
					<li><a href="privacy.html">Privacy</a></li>
				</ul>
			</div>
			<!--footerCredits container--> 
		</section>
		<!--close section--> 
	</footer>
	<!--/.footer--> 
	
	<span class="backToTop"><a href="#top">back to top</a></span>
</div>
	<!-- close #page--> 
	
<?php
	// Insert any HTML before the closing body tag if desired
	if( isset( $final_html ) )
	{
		echo $final_html;
	}

	// Add the cookie checker
	if( isset( $cookie_checker ) )
	{
		echo $cookie_checker;
	}
	// Add any additional javascript
	if( isset( $javascripts ) )
	{
		for( $x=0; $x<=count( $javascripts )-1; $x++ )
		{
			echo script_tag( $javascripts["$x"] ) . "\n";
		}
	}
	echo script_tag('assets/js/bootstrap.min.js') . "\n";
	echo script_tag('assets/js/ddsmoothmenu-min.js') . "\n";
	echo script_tag('assets/js/jquery.dcjqaccordion.2.7.min.js') . "\n";
	echo script_tag('assets/js/jquery.easytabs.min.js') . "\n";
	echo script_tag('assets/js/slide-to-top-accordion-min.js') . "\n";
	echo script_tag('assets/js/jquery.easing-1.3.min.js') . "\n";
	echo script_tag('assets/js/jquery.flexslider-min.js') . "\n";
	echo script_tag('assets/js/responsive-tables.js') . "\n";
	echo script_tag('assets/js/jquery.fitvid.js') . "\n";
	echo script_tag('assets/js/scripts.js') . "\n";
	// Add any javascript before the closing body tag
	if( isset( $dynamic_extras ) )
	{
		echo '<script>
		';
		echo $dynamic_extras;
		echo '</script>
		';
	}
?>
</body>
</html>