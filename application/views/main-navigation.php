<?php 
if( isset( $auth_first_name ) )	{
	$_user_first_name = $auth_first_name;
}
?>
<div class="navbar-wrapper">
  <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
  <div class="container">

    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <?php echo anchor('/', 'CBO eLibrary', 'class="brand"')?>
        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><?php echo anchor('/', 'Home') ?></li>							
            <li><?php echo anchor('about', 'About') ?></li>
            <li><?php echo anchor('cbodirectory', 'CBO Directory') ?></li>
            <li><?php echo anchor('library', 'Library') ?></li>
            <li><?php echo anchor('links', 'Links') ?></li>
            <li><?php echo anchor('contact', 'Contact') ?></li>
          </ul>
          <ul class="nav pull-right">
            <?php if(isset($_user_first_name)) : ?>
            	<li><a href="#">Welcome <?php echo $_user_first_name?></a></li>
            	<li><?php echo secure_anchor('user','User') ?></li>
            	<li><?php echo secure_anchor('user/logout','Logout') ?></li>
            <?php else : ?>
	            <li><?php echo secure_anchor('register','Register')?></li>
	            <li><?php echo secure_anchor('user','Login');?></li>
	        <?php endif ?>
            </ul>
        </div><!--/.nav-collapse -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->

  </div> <!-- /.container -->
</div><!-- /.navbar-wrapper -->