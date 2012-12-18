<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title><?php echo ( isset( $title ) ) ? $title : WEBSITE_NAME; ?></title>
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
	echo link_tag( array( 'href' => 'assets/css/bootstrap.min.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	echo link_tag( array( 'href' => 'assets/css/style.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	echo link_tag( array( 'href' => 'assets/css/header-1.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
		
	// Add any additional stylesheets
	if( isset( $style_sheets ) )
	{
		foreach( $style_sheets as $href => $media )
		{
			echo link_tag( array( 'href' => $href, 'media' => $media, 'rel' => 'stylesheet' ) ) . "\n";
		}
	}

	// jQuery is always loaded
	echo script_tag( 'assets/js/jquery.min.js' ) . "\n";
	echo script_tag( 'js/assets/js/modernizr.custom.87724.js' ) . "\n";


	// Add anything else to the head
	echo ( isset( $extra_head ) ) ? $extra_head : '';

	// Add Google Analytics code if available in config
	if( ! empty( $tracking_code ) ) echo $tracking_code; 
?>