<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo ( isset( $title ) ) ? $title : WEBSITE_NAME; ?></title>
<meta name="google-translate-customization" content="4f4b5c22f4813d3-5f9d6ce7d7db9f36-gbb1c7e842aba78a7-14"></meta>
<?php
	// Add any keywords
	echo ( isset( $keywords ) ) ? meta('keywords', $keywords) : '';

	// Add a discription
	echo ( isset( $description ) ) ? meta('description', $description) : '';

	// Add a robots exclusion
	echo ( isset( $no_robots ) ) ? meta('robots', 'noindex,nofollow') : '';
?>
<base href="<?php echo if_secure_base_url(); ?>" />
<?php
	// Always add the main stylesheet
	echo link_tag( array( 'href' => 'css/bootstrap.min.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	echo link_tag( array( 'href' => 'css/bootstrap-responsive.min.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	echo link_tag( array( 'href' => 'css/style.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	
	// Add any additional stylesheets
	if( isset( $style_sheets ) )
	{
		foreach( $style_sheets as $href => $media )
		{
			echo link_tag( array( 'href' => $href, 'media' => $media, 'rel' => 'stylesheet' ) ) . "\n";
		}
	}

	// jQuery is always loaded
	echo script_tag( 'js/jquery.min.js' ) . "\n";
	echo script_tag( 'js/bootstrap.min.js' ) . "\n";

	// Add any additional javascript
	if( isset( $javascripts ) )
	{
		for( $x=0; $x<=count( $javascripts )-1; $x++ )
		{
			echo script_tag( $javascripts["$x"] ) . "\n";
		}
	}

	// Add anything else to the head
	echo ( isset( $extra_head ) ) ? $extra_head : '';

	// Add Google Analytics code if available in config
	if( ! empty( $tracking_code ) ) echo $tracking_code; 
?>