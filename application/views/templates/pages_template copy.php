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
<?php $this->load->view('head')?>
</head>
<body id="<?php echo $this->router->fetch_class() . '-' . $this->router->fetch_method(); ?>" class="<?php echo $this->router->fetch_class(); ?>-controller <?php echo $this->router->fetch_method(); ?>-method">
<!-- NAVBAR
    ================================================== -->
<?php $this->load->view('header')?>
<div id="page">
	<div class="container clearfix" id="main-content">
		<?php echo ( isset( $content ) ) ? $content : ''; ?>
	</div>
</div>
	<!--close .container id="main-content" --> 
<?php $this->load->view('footer')?>
<?php

/* End of file main_template.php */
/* Location: /application/views/templates/main_template.php */