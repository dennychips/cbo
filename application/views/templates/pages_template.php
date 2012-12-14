<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Template Content View
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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
</head>
<body id="<?php echo $this->router->fetch_class() . '-' . $this->router->fetch_method(); ?>" class="<?php echo $this->router->fetch_class(); ?>-controller <?php echo $this->router->fetch_method(); ?>-method">
<!-- NAVBAR
    ================================================== -->
    <?php $this->load->view('main-navigation.php')?>
	<div class="container static-pages">
		<div class="row">
			<div class="span9">
				<?php echo ( isset( $content ) ) ? $content : ''; ?>
			</div>
			<div class="span3">
				<div class="well sidebar-nav">
	            <ul class="nav nav-list">
	              <li class="nav-header">Sidebar</li>
	              <li class="active"><a href="#">Link</a></li>
	              <li><a href="#">Link</a></li>
	              <li><a href="#">Link</a></li>
	              <li><a href="#">Link</a></li>
	            </ul>
	          </div>
			</div>
		</div>
		
	
     <hr />
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2012 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div>

    
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
<?php

/* End of file main_template.php */
/* Location: /application/views/templates/main_template.php */