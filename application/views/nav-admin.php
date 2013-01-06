<ul class="nav nav-tabs nav-stacked">
	<li><?php echo secure_anchor('user', 'Dashboard')?></li>
	<li><?php echo secure_anchor('elibrary/add', 'Share Document');?></li>
	<li><?php echo secure_anchor('user/self_update', 'My Profile') ?></li> 
</ul>
<?php if( isset( $auth_level ) && $auth_level >= 6 ) : ?>
<ul class="nav nav-tabs nav-stacked">
<li><?php echo  secure_anchor('administration/create_user', 'Create User');?></li> 
<li><?php echo secure_anchor('administration/manage_users', 'Manage Users');?></li>
<li><?php echo secure_anchor('register/pending_registrations', 'Pending Registrations');?></li> 
<?php if( isset( $auth_level ) && $auth_level == 9 ): ?>
	<li><?php echo secure_anchor('register/settings', 'Registration Mode')?></li> 
	<li><?php echo secure_anchor('administration/deny_access', 'Deny Access');?></li>
<?php endif?>
</ul>
<?php endif;?>