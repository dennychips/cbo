<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Deni Permana">
	<meta name="google-translate-customization" content="e8620c08ee7037e-9ffa3c972f60fb5f-g34008be059d1a444-12"></meta>
        
    <title><?php echo ( isset( $title ) ) ? $title : WEBSITE_NAME; ?></title>
    <?php
	// Add any keywords
	echo ( isset( $keywords ) ) ? meta('keywords', $keywords) : '';

	// Add a discription
	echo ( isset( $description ) ) ? meta('description', $description) : '';

	// Add a robots exclusion
	echo ( isset( $no_robots ) ) ? meta('robots', 'noindex,nofollow') : '';
	?>
	<link rel="icon" href="<?php echo site_url('assets/images/favicon.ico') ?>" type="image/x-icon" />
	<base href="<?php echo if_secure_base_url(); ?>" />
	<?php 
	echo link_tag( array( 'href' => 'assets/css/bootstrap.min.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	echo link_tag( array( 'href' => 'assets/css/main.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	// echo link_tag( array( 'href' => 'assets/css/media.queires.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	echo link_tag( array( 'href' => 'assets/css/skin.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	echo link_tag( array( 'href' => 'assets/css/bootstrap-select.min.css', 'media' => 'screen', 'rel' => 'stylesheet' ) ) . "\n";
	if( isset( $style_sheets ) )
	{
		foreach( $style_sheets as $href => $media )
		{
			echo link_tag( array( 'href' => $href, 'media' => $media, 'rel' => 'stylesheet' ) ) . "\n";
		}
	}

	// jQuery is always loaded
	echo script_tag( 'assets/js/jquery.min.js' ) . "\n";
	echo script_tag( 'assets/js/modernizr.custom.87724.js' ) . "\n";
	// Add any additional javascript
	if( isset( $javascripts ) )
	{
		for( $x=0; $x<=count( $javascripts )-1; $x++ )
		{
			echo script_tag( $javascripts["$x"] ) . "\n";
		}
	}

	echo script_tag('assets/js/bootstrap.min.js') . "\n";
	echo script_tag('assets/js/superfish/superfish.js') . "\n";
	echo script_tag('assets/js/swipe.js') . "\n";
	echo script_tag('assets/js/bootstrap-select.min.js') . "\n";
	echo script_tag('assets/js/jquery.cycle.all.js') . "\n";
	echo script_tag('assets/js/script.js') . "\n";
	// echo script_tag('assets/js/prettyphoto/js/jquery.prettyPhoto.js') . "\n";

	// echo script_tag('assets/js/jquery.dcjqaccordion.2.7.min.js') . "\n";
	// echo script_tag('assets/js/jquery.easytabs.min.js') . "\n";
	// echo script_tag('assets/js/slide-to-top-accordion-min.js') . "\n";
	// echo script_tag('assets/js/jquery.easing-1.3.min.js') . "\n";
	// echo script_tag('assets/js/jquery.flexslider-min.js') . "\n";
	// echo script_tag('assets/js/responsive-tables.js') . "\n";
	// echo script_tag('assets/js/jquery.fitvid.js') . "\n";
	// echo script_tag('assets/js/scripts.js') . "\n";
	
	// Add any javascript before the closing body tag
	if( isset( $dynamic_extras ) )
	{
		echo '<script>';
		echo $dynamic_extras;
		echo '</script>
		';
	}

	// Add anything else to the head
	echo ( isset( $extra_head ) ) ? $extra_head : '';

	// Add Google Analytics code if available in config
	if( ! empty( $tracking_code ) ) echo $tracking_code;
	?>
</head>


