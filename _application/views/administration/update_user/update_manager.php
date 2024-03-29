<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Update Manager View
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
<h1>Update Manager Profile</h1>
<hr />
<?php
if( isset( $validation_passed ) )
{
	echo '
		<div class="feedback confirmation" style="margin-bottom:10px;">
			<p class="feedback_header">
				The manager profile was successfully updated.
			</p>
		</div>
	';
}
else if( isset( $validation_errors ) )
{
	echo '
		<div class="feedback error_message" style="margin-bottom:10px;">
			<p class="feedback_header">
				Manager Profile Update Contained The Following Errors:
			</p>
			<ul>
				' . $validation_errors . '
			</ul>
			<p>
				MANAGER PROFILE NOT UPDATED
			</p>
		</div>
	';
}
?>
<div class="well clearfix">
	<div class="profile_image pull-left" style="margin-right:20px;">
		<?php
			// PROFILE IMAGE
			$upload_destination = config_item('profile_image_destination');

			echo img(
				( ! empty( $user_data->profile_image ) ) ? $user_data->profile_image : 'assets/images/Profile-Placeholder.png',
				FALSE,
				( $upload_destination == 'database' && ! empty( $user_data->profile_image ) ) ? TRUE : FALSE
			);
		?>
	</div>
	<div id="user_info">
		<h3><?php echo $user_data->user_name; ?></h3>
		<ul class="std-list unstyled">
			<li>Registration Date: <?php echo date('F j, Y, g:i a',$user_data->user_date); ?></li>
			<li>Last Modified: <?php echo date('F j, Y, g:i a',$user_data->user_modified); ?></li>
			<li>Last Login: <?php echo ($user_data->user_last_login != FALSE)? date('F j, Y, g:i a',$user_data->user_last_login) : '<span class="redfield">NEVER LOGGED IN</span>'; ?></li>
		</ul>
	</div>
</div>
<?php echo form_open( 'administration/update_user/' . $user_data->user_id, array( 'class' => 'std-form' ) ); ?>
	<div class="form-column-left">
		<fieldset>
			<legend>Account Details:</legend>
			<div class="form-row">

				<?php
					// FIRST NAME LABEL AND INPUT ***********************************
					echo form_label('First Name','first_name',array('class'=>'form_label'));

					$input_data = array(
						'name'		=> 'first_name',
						'id'		=> 'first_name',
						'class'		=> 'form_input first_name',
						'value'		=> set_value('first_name', $user_data->first_name),
						'maxlength'	=> '20',
					);

					echo form_input($input_data);

				?>

			</div>
			<div class="form-row">

				<?php
					// LAST NAME LABEL AND INPUT ***********************************
					echo form_label('Last Name','last_name',array('class'=>'form_label'));

					$input_data = array(
						'name'		=> 'last_name',
						'id'		=> 'last_name',
						'class'		=> 'form_input last_name',
						'value'		=> set_value('last_name', $user_data->last_name),
						'maxlength'	=> '20',
					);

					echo form_input($input_data);

				?>

			</div>
			<div class="form-row">

				<?php
					// EMAIL ADDRESS LABEL AND INPUT ******************************
					echo form_label('Email Address','user_email',array('class'=>'form_label'));

					$input_data = array(
						'name'		=> 'user_email',
						'id'		=> 'user_email',
						'class'		=> 'form_input max_chars',
						'value'		=> set_value('user_email', $user_data->user_email),
						'maxlength'	=> '255',
					);

					echo form_input( $input_data );
				?>

			</div>
			<div class="form-row">

				<?php
					// LICENSE NUMBER LABEL AND INPUT ***********************************
					echo form_label('Country *','license_number',array('class'=>'form_label'));

	    			$countries[''] = '-- Select Country --';
	    			foreach ($country as $row) {
	    				$countries[$row->country] = $row->country;	
	    			}
					echo form_dropdown('country', $countries, set_value('country', $user_data->country), 'id ="country" class=""');


				?>

			</div>
			<div class="form-row">

				<?php
					// PHONE NUMBER LABEL AND INPUT ***********************************
					echo form_label('Phone Number','phone_number',array('class'=>'form_label'));

					$input_data = array(
						'name'		=> 'phone_number',
						'id'		=> 'phone_number',
						'class'		=> 'form_input',
						'value'		=> set_value('phone_number', $user_data->phone_number),
						'maxlength'	=> '20',
					);

					echo form_input($input_data);

				?>

			</div>
		</fieldset>
		<fieldset>
			
			<div class="form-row">

				<?php
					// LICENSE NUMBER LABEL AND INPUT ***********************************
					echo form_label('Country','license_number',array('class'=>'form_label'));
					$input_data = array(
						'name'		=> 'license_number',
						'id'		=> 'license_number',
						'class'		=> 'form_input alpha_numeric',
						'value'		=> set_value('license_number', $user_data->country),
						'maxlength'	=> '8',
					);
					echo form_input($input_data);

				?>

			</div>
			<div class="form-row">
				<div class="radio-header">Banned:</div>

				<?php
					// BANNED LABELS AND BUTTONS **************************
					/*
					* GET VALUE OF RADIOS GROUP AND APPLY CHECKED = CHECKED
					*/
					$radio_selection = set_value('user_banned', $user_data->user_banned );

					$radio_checked = array(
						'0' => '',
						'1' => ''
					);

					$radio_checked[$radio_selection] = 'checked';
				?>

				<div class="radio_set">
					<div class="form-row">
						<div class="form_radio_container">
							<label class="radio inline" for="no-banned">
							<?php
								// FIRST RADIO
								$radio_data = array(
									'name'		=> 'user_banned',
									'id'		=> 'no-banned',
									'value'		=> '0',
									'checked'	=> $radio_checked['0'],
									'class'		=> 'form_radio radio inline'
								);

								echo form_radio($radio_data);
							?>
							No
							</label>

						<?php
							//echo form_label('No', 'no-banned', array('class'=>'radio_label radio'));
						?>

							<label class="radio inline">
							<?php
								// SECOND RADIO
								$radio_data = array(
									'name'		=> 'user_banned',
									'id'		=> 'yes-banned',
									'value'		=> '1',
									'checked'	=> $radio_checked['1'],
									'class'		=> 'form_radio radio inline'
								);

								echo form_radio($radio_data);
							?>
							Yes
							</label>
						</div>

						<?php
							//echo form_label('Yes', 'yes-banned', array('class'=>'radio_label'));
						?>

					</div>
				</div>
			</div>
			<br />
			<h3>Leave Blank To Keep Current Password:</h3>
			<hr />
			<div class="form-row">

				<?php
					// NEW PASSWORD LABEL AND INPUT ***********************************************
					echo form_label('Change Password','user_pass',array('class'=>'form_label'));

					echo input_requirement();

					$input_data = array(
						'name'       => 'user_pass',
						'id'         => 'user_pass',
						'class'      => 'form_input password',
						'max_length' => MAX_CHARS_4_PASSWORD
					);

					echo form_password($input_data);
				?>

			</div>
			<div class="form-row">

				<?php
					// CONFIRM PASSWORD LABEL AND INPUT *******************************************
					echo form_label('Confirm New Password','user_pass_confirm',array('class'=>'form_label'));

					echo input_requirement();

					$input_data = array(
						'name'       => 'user_pass_confirm',
						'id'         => 'user_pass_confirm',
						'class'      => 'form_input password',
						'max_length' => MAX_CHARS_4_PASSWORD
					);

					echo form_password($input_data);

				?>

			</div>
			<div class="form-row">
				<label class="checkbox inline" for="show-password">
				<?php
					// SHOW PASSWORD CHECKBOX
					$checkbox_data = array(
						'id' => 'show-password',
						'class' => 'checkbox inline'
					);

					echo form_checkbox( $checkbox_data );
				?>
				Show Password
				</label>
			</div>
		</fieldset>
		<br />
		<div class="form-row">
			<div id="submit_box">

			<?php
				// SUBMIT BUTTON **************************************************************
				$input_data = array(
					'name'		=> 'form_submit',
					'id'		=> 'submit_button',
					'class'		=> 'btn btn-info',
					'value'		=> 'Submit'
				);
				
				echo form_submit($input_data);
			?>

			</div>
		</div>
	</div>
</form>
</div>
<?php

/* End of file update_manager.php */
/* Location: /application/views/update_manager.php */