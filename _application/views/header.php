<?php  
if( isset( $auth_first_name ) ) {
  $_user_first_name = $auth_first_name;
  $_user_last_name = $auth_last_name;
?>
<div style="padding-top:20px;">&nbsp;</div>
<?php }?>
<!-- begin accesibility skip to nav skip content -->
<ul class="visuallyhidden" id="top">
  <li><a href="#nav" title="Skip to navigation" accesskey="n">Skip to navigation</a></li>
  <li><a href="#page" title="Skip to content" accesskey="c">Skip to content</a></li>
</ul>
<!-- end /.visuallyhidden accesibility--> 
<?php if(isset($_user_first_name)) : ?>
<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav" style="padding:0px">

                <li><?php echo secure_anchor('user', 'Dashboard')?></li>
                <?php if(isset($auth_level) && $auth_level == 1) : ?>
                <li><?php echo secure_anchor('elibrary/add', 'Share Document');?></li>
                <?php endif;?>
                <?php if(isset($auth_level) && $auth_level > 1) : ?>
                <li><?php echo secure_anchor('elibrary/manage', 'Manage Document');?></li>
                <?php endif;?>
                <li><?php echo secure_anchor('user/self_update', 'My Profile') ?></li> 
                 <?php if( isset( $auth_level ) && $auth_level >= 6 ) : ?>
              
                <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Admin Menu <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <?php echo  secure_anchor('administration/create_user', 'Create User');?>
                    </li> 
                    <li>
                      <?php echo secure_anchor('administration/manage_users', 'Manage Users');?>
                    </li>
                    <li>
                        <?php echo secure_anchor('register/pending_registrations', 'Pending Registrations');?>
                    </li> 
                    <?php if( isset( $auth_level ) && $auth_level == 9 ): ?>
                    <li>
                        <?php echo secure_anchor('register/settings', 'Registration Mode')?>
                    </li> 
                    <li>
                        <?php echo secure_anchor('administration/deny_access', 'Deny Access');?>
                    </li>
                    <?php endif?>
                </ul>
                </li>
                <?php endif;?>
            </ul>
            <ul class="nav pull-right">
                <li><?php echo secure_anchor('user', 'Welcome, '.$_user_first_name.' '. $_user_last_name )?></li>
                <li><?php echo secure_anchor('user/logout','Logout') ?></li>
            </ul>
        </div>
    </div>
</div>
<?php endif;?>
<!-- header start -->
    <header class="clearfix">
        <div class="header_bottom">
            <div class="header_top">
                <div class="row">
                    <div class="logo grid_6">

                        <h1> 
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo site_url('assets/images/logo-isean.png')?>" alt="ISEAN">
                                <span class="hidden">ISEAN</span>
                            </a>
                        </h1>
                    </div>

                    <div class="grid_6">
                        <div class="loginlink pull-right">
                            <?php if(!isset($_user_first_name)):?>
                            <?php echo secure_anchor('register','<i class="icon-user"></i> Register', 'class="btn btn-small"')?>
                            <?php echo secure_anchor('/user', '<i class="icon-user"></i> Login', 'class="btn btn-small"') ?>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php if($this->uri->segment(1)) : ?>
 <section id="color_header" class="clearfix">

            <div class="mainmenu ">
            <div class="mainmenu_inner">
                <div class="row clearfix">
                    <div class="grid_12">
                        <div class="sublogo">CBO e-Library</div>
                        <?php $this->load->view('nav')?>
                    </div>
                </div>
            </div>
        </div>

        <p>&nbsp;</p>
        <div id="breadcrumbs" class="clearfix">
            <div class="row">
                <div class="grid_12">
                    <span xmlns:v="http://rdf.data-vocabulary.org/#">
                        <span typeof="v:Breadcrumb">
                            <?php echo $this->breadcrumb->output();?>
                        </span>
                    </span></span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>

<?php endif;?>
<?php /*
<!-- mobile navigation trigger-->
<h5 class="mobile_nav"><a href="javascript:void(0)">&nbsp;<span></span></a></h5>
<!--end mobile navigation trigger-->

<section class="container preheader"> 
  
  <!--this is the login for the user-->
  <?php if(!isset($_user_first_name)) : ?>
        <nav class="user clearfix"><?php echo secure_anchor('register','Register')?></nav>
        <nav class="user clearfix"><?php echo secure_anchor('/user', 'Login') ?></nav>
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

*/ ?>