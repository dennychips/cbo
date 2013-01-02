<?php 
if( isset( $auth_first_name ) ) {
  $_user_first_name = $auth_first_name;
  $_user_last_name = $auth_last_name;
}
?>
<!-- begin accesibility skip to nav skip content -->
<ul class="visuallyhidden" id="top">
  <li><a href="#nav" title="Skip to navigation" accesskey="n">Skip to navigation</a></li>
  <li><a href="#page" title="Skip to content" accesskey="c">Skip to content</a></li>
</ul>
<!-- end /.visuallyhidden accesibility--> 

<!-- mobile navigation trigger-->
<h5 class="mobile_nav"><a href="javascript:void(0)">&nbsp;<span></span></a></h5>
<!--end mobile navigation trigger-->

<section class="container preheader"> 
  
  <!--this is the login for the user-->
  <?php if(isset($_user_first_name)) : ?>
        <nav class="user clearfix"><?php echo secure_anchor('user', 'Welcome, '.$_user_first_name.' '. $_user_last_name )?></nav>
         <nav class="user clearfix"><?php echo secure_anchor('user/logout','Logout') ?></nav>
  <?php else :?>
  <nav class="user clearfix"><?php echo secure_anchor('register','<i class="icon-user"></i> Register')?></nav>
  <nav class="user clearfix"><?php echo secure_anchor('/user', '<i class="icon-signin"></i> Login') ?></nav>
  <!--close user nav-->

  <?php endif?>
  
  <!--
<div class="search-wrapper">
    <form class="search" method="post" action="someaction.php">
      <div id="search-trigger">Search:</div>
      <input id="search-box" type="text" placeholder="search + enter">
    </form>
  </div>
-->
  <div class="phone">Translate</div>
  <ul class="social">
    <li><a class="socicon small facebook" href="#" data-placement="bottom" title="Follow us on Facebook"></a></li>
    <li><a class="socicon small twitterbird" href="#" data-placement="bottom" title="Follow us on Twitter"></a></li>
  </ul>
</section>

<!-- begin .header-->
<header class="header clearfix"> <!-- <img src="assets/images/print-logo.png" class="print logo" alt="name of company" /> -->
  <div class="container"> 
    
    <?php $this->load->view('nav')?>
    <!-- begin #logo -->
    <h5 id="textlogo" class="brand"><a href="">CBO E-Library</a> </h5>
    <!-- end #logo --> 
    
  </div>
  <!-- close / .container--> 
</header>
<!-- close /.header --> 

