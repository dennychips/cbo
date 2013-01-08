<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('head')?>
<body id="<?php echo $this->router->fetch_class() . '-' . $this->router->fetch_method(); ?>" class="<?php echo $this->router->fetch_class(); ?>-controller <?php echo $this->router->fetch_method(); ?>-method apps">
<?php $this->load->view('header')?>    
<?php echo ( isset( $content ) ) ? $content : ''; ?>
<?php $this->load->view('footer');?>