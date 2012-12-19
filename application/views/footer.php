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
?>
</body>
</html>