<!-- begin #main_menu -->
<nav id="main_menu">
  <ul class="accordmobile">
    <li><?php echo anchor('/', 'Home') ?></li>
    <li><?php echo anchor('about', 'About') ?></li>
    <li class="parent"><a href="#">CBO Directory<i></i></a>
      <ul>
        <li><?php echo anchor('cbodirectory', 'Indonesia')?></li>
        <li><?php echo anchor('cbodirectory', 'Malaysia') ?></li>
        <li><?php echo anchor('cbodirectory', 'Philiphines') ?></li>
        <li><?php echo anchor('cbodirectory', 'Singapore') ?></li>
        <li><?php echo anchor('cbodirectory', 'Timor Leste') ?></li>
        <li><?php echo anchor('cbodirectory', 'Brunei Darussalam') ?></li>
      </ul>
    </li>
    <li class="parent"><a href="#">Library<i></i></a>
      <ul class="dropdown-menu" id="menu2">
        <li><?php echo anchor('library', 'Report')?></li>
        <li><?php echo anchor('library', 'Research') ?></li>
        <li><?php echo anchor('library', 'Guideline') ?></li>
        <li><?php echo anchor('library', 'Best Practice') ?></li>
        <li><?php echo anchor('library', 'Journal') ?></li>
      </ul>
    </li>
    <li><?php echo anchor('links', 'Links') ?></li>
    <li><?php echo anchor('contact', 'Contact') ?></li>
    <?php if( isset( $auth_level ) && $auth_level == 1 ) : ?>
      <li><?php echo secure_anchor('library/add', 'Share Document');?></li>
      <li><?php echo secure_anchor('user/self_update', 'My Profile') ?></li> 
  <?php endif;?>
  <?php if( isset( $auth_level ) && $auth_level >= 6 ) : ?>
      <li><?php echo secure_anchor('library/add', 'Share Document');?></li>
      <li class="parent">
          <a href="#">Admin <i></i></b></a>
          <ul class="dropdown-menu">
            <li><?php echo secure_anchor('user/self_update', 'My Profile') ?></li> 
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
          <?php endif;?>
          </ul>
      </li>
  <?php endif;?>
  </ul>
</nav>
<!-- close / #main_menu --> 
<?php 
/*
if( isset( $auth_first_name ) ) {
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
            <!-- <li><?php echo anchor('cbodirectory', 'CBO Directory') ?></li> -->
            <li class="dropdown">
              <?php echo anchor('cbodirectory', 'CBO Directory <b class="caret"></b>', ' data-toggle="dropdown" class="dropdown-toggle"') ?>
              <ul class="dropdown-menu" id="menu1">
                <li><?php echo anchor('cbodirectory', 'Indonesia')?></li>
                <li><?php echo anchor('cbodirectory', 'Philiphines') ?></li>
                <li><?php echo anchor('cbodirectory', 'Singapore') ?></li>
                <li><?php echo anchor('cbodirectory', 'Timor Leste') ?></li>
              </ul>
            </li>
            <li class="dropdown"><?php echo anchor('library', 'Library <b class="caret"></b>', ' data-toggle="dropdown" class="dropdown-toggle"') ?>
              <ul class="dropdown-menu" id="menu2">
                <li><?php echo anchor('library', 'Report')?></li>
                <li><?php echo anchor('library', 'Research') ?></li>
                <li><?php echo anchor('library', 'Guideline') ?></li>
                <li><?php echo anchor('library', 'Best Practice') ?></li>
                <li><?php echo anchor('library', 'Journal') ?></li>
              </ul>

            </li>
            <li><?php echo anchor('links', 'Links') ?></li>
            <li><?php echo anchor('contact', 'Contact') ?></li>
          </ul>
          <ul class="nav pull-right">
            <?php if(isset($_user_first_name)) : ?>
            <?php if( isset( $auth_level ) && $auth_level >= 1 ) : ?>
              <li><?php echo secure_anchor('library/add', 'Share Document');?></li>
              <!-- <li><a href="#">Welcome <?php echo $_user_first_name?></a></li> -->
              <!-- <li><?php echo secure_anchor('user','User') ?></li> -->
              <li class="dropdown">
                <?php echo secure_anchor('user/self_update', 'My Profile') ?>
              </li> 
            <?php endif;?>
              <?php if( isset( $auth_level ) && $auth_level >= 6 ) : ?>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
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
                      <?php endif;?>
                      </ul>
                  </li>
              <?php endif;?>
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
*/ ?>