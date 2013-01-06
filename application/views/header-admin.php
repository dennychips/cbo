<?php  
if( isset( $auth_first_name ) ) {
  $_user_first_name = $auth_first_name;
  $_user_last_name = $auth_last_name;
?>
<?php }?>
<?php if(isset($_user_first_name)) : ?>
<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav" style="padding:0px">
                <li><?php echo anchor('/', 'Visit Website')?></li>
                <li><?php echo secure_anchor('user', 'Dashboard')?></li>
                <li><?php echo secure_anchor('elibrary/add', 'Share Document');?></li>
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