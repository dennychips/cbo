<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Self Update View
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
<div class="well">
<div class="row-fluid">
	<div class="span12">
		<?php 
			if( isset( $validation_errors ) )
			{
				echo '
					<div class="alert alert-danger">
						<p class="feedback_header">
							Profile Update Contained The Following Errors:
						</p>
						<ul class="unstyled">
							' . $validation_errors . '
						</ul>
						<p>
							PROFILE NOT UPDATED
						</p>
					</div>
				';
			}
			else if( isset( $validation_passed ) )
			{
				echo '
					<div class="alert alert-success">
						Your profile has been successfully updated.
					</div>
				';
			}

			if( $user_data !== FALSE )
			{
		?>
		
		<h3 class="short_headline"><span>My Profile</span></h3>

		<div class="well">
			<h3>Welcome, <?php echo $user_data->user_name; ?></h3>
			<ul class="std-list">
				<li>
					Registration Date: <?php echo date('F j, Y, g:i a',$user_data->user_date); ?>
				</li>
				<li>
					Last Modified: <?php echo  date('F j, Y, g:i a',$user_data->user_modified); ?>
				</li>
				<li>
					Last Login: <?php echo ($user_data->user_last_login != FALSE)? date('F j, Y, g:i a',$user_data->user_last_login) : '<span class="redfield">NEVER LOGGED IN</span>'; ?>
				</li>
			</ul>
		</div>
		<?php 

			echo form_open_multipart( 'user/self_update', array( 'class' => 'std-form' ) ); 

			echo $role_specific_form;

			echo form_close();

			}
			else
			{
				echo 'Error: No user data available.';
			}
		?>
	</div>
	<!-- <div class="span4">
		<h5 class="short_headline"><span>Profile Preview</span></h5>
		<table style="font-size:11px" class="table-bordered table">
			<tr>
				<td colspan="2" align="center">
					<div class="profile_image">
					<?php
						// PROFILE IMAGE
						echo img(
							( ! empty( $user_data->profile_image ) ) ? $user_data->profile_image : 'assets/images/Profile-Placeholder.png',
							FALSE,
							( $upload_destination == 'database' && ! empty( $user_data->profile_image ) ) ? TRUE : FALSE
						);
					?>
					</div>
				</td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><?php echo $user_data->first_name ?></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><?php echo $user_data->last_name ?></td>
			</tr>
			<tr>
				<td>Email Name</td>
				<td><?php echo $user_data->user_email ?></td>
			</tr>
			<?php if( isset( $auth_level ) && $auth_level == 1 ) : ?>
			<tr>
				<td>Organization</td>
				<td><?php echo $user_data->organization ?></td>
			</tr>
			<tr>
				<td>Focus Area</td>
				<td>
					<ul class="unstyled">
					<?php 
						
						$area = unserialize($user_data->focus_area);
						foreach($area as $row){
							echo '<li>'.$row.'</li>';
						};
					?>
					</ul>
				</td>
			</tr>
			<tr>
				<td>Street Address</td>
				<td><?php echo $user_data->street_address ?></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><?php echo $user_data->phone_number ?></td>
			</tr>
			<tr>
				<td>Website</td>
				<td><?php echo $user_data->website ?></td>
			</tr>
			<tr>
				<td>Blog</td>
				<td><?php echo $user_data->blog ?></td>
			</tr>
			<tr>
				<td>Facebook URL</td>
				<td><?php echo $user_data->facebook ?></td>
			</tr>
			<tr>
				<td>Twitter URL</td>
				<td><?php echo $user_data->twitter ?></td>
			</tr>
			<?php endif?>
		</table>
	
	</div> -->
</div>
</div>
<?php 
/* End of file self_update.php */
/* Location: /application/views/self_update.php */