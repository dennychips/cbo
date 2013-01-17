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
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('head-admin')?>
<body id="<?php echo $this->router->fetch_class() . '-' . $this->router->fetch_method(); ?>" class="<?php echo $this->router->fetch_class(); ?>-controller <?php echo $this->router->fetch_method(); ?>-method">
<?php $this->load->view('header-admin')?>

<div class="container">
<div class="row-fluid">
	<div class="span12">
		<div class="page-header-top">
			<div class="container">
				<h1>Dashboard</h1>
			</div>
		</div>
		<div class="page-header">
			<h3>Dashboard</h3>
		</div>
		<div class="row-fluid">
			<div class="span3">
				<?php $this->load->view('nav-admin')?>								
			</div>
			<div class="span9">
				<?php echo ( isset( $content ) ) ? $content : ''; ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer-admin')?>
