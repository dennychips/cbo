<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Update Customer View
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
<h1>Update CBO Profile</h1>
<hr />
<?php
if( isset( $validation_passed ) )
{
	echo '
		<div class="feedback alert alert-success confirmation" style="margin-bottom:10px;">
			
				The customer profile was successfully updated.
			
		</div>
	';
}
else if( isset( $validation_errors ) )
{
	echo '
		<div class="feedback alert alert-danger error_message" style="margin-bottom:10px;">
			<p class="feedback_header">
				Customer Profile Update Contained The Following Errors:
			</p>
			<ul>
				' . $validation_errors . '
			</ul>
			<p>
				CUSTOMER PROFILE NOT UPDATED
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
		<h5 class="short_headline"><span>Contact Information</span></h5>
		<hr />
		<div class="control-group">
			<?php echo form_label('First Name *','first_name',array('class'=>'required control-label form_label')); ?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'first_name',
						'id'		=> 'first_name',
						'class'		=> 'form_input first_name span12',
						'value'		=> set_value('first_name', $user_data->first_name),
						'maxlength'	=> '20',
					);
					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Last Name *','last_name',array('class'=>'required control-label form_label'));?>
			<!-- <label for="LastNameRegister" class="required control-label">Last Name <span class="required">*</span></label> -->
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'last_name',
						'id'		=> 'last_name',
						'class'		=> 'form_input last_name span12',
						'value'		=> set_value('last_name', $user_data->last_name),
						'maxlength'	=> '20',
					);


					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
		<?php echo form_label('Email Address *','user_email',array('class'=>'required control-label form_label'));?>
		<div class="controls">
			<?php 	
			    $input_data = array(
					'name'		=> 'user_email',
					'id'		=> 'user_email',
					'class'		=> 'form_input max_chars span12',
					'value'		=> set_value('user_email', $user_data->user_email),
					'maxlength'	=> '255',
				);
				echo form_input($input_data);
			?>
		</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Organization Name *','organization',array('class'=>'required control-label form_label'));?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'organization',
						'id'		=> 'organization',
						'class'		=> 'form_input span12',
						'value'		=> set_value('organization', $user_data->organization),
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Organization Email *','organization_email',array('class'=>'required control-label form_label'));?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'organization_email',
						'id'		=> 'organization_email',
						'class'		=> 'form_input span12',
						'value'		=> set_value('organization_email', $user_data->organization_email),
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Description *','description',array('class'=>'required control-label form_label')); ?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'description',
						'id'		=> 'description',
						'class'		=> 'form_input first_name span12 ckeditor',
						'value'		=> set_value('description', $user_data->description),
						'rows'	=> '10',
					);

					echo form_textarea($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Country *','country',array('class'=>'required control-label form_label')); ?>
			<div class="controls">
				<?php 
	    			$countries[''] = '-- Select Country --';
	    			foreach ($country as $row) {
	    				$countries[$row->country] = $row->country;	
	    			}
					echo form_dropdown('country', $countries, set_value('country', $user_data->country), 'id ="country" class="span12"');
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Province *','province',array('class'=>'required control-label form_label'));?>
			
			<div class="controls">
				<?php 
	    			//echo form_label('Province *','province',array('class'=>'form_label'));
	    			if( isset( $provinces ) ){
						// Default option
						$country_province[''] = '-- Select --';
						// Options from query
						foreach( $provinces as $row ){
							$country_province[$row['province']] = $row['province'];
						}
					} else {
						// Default option if not POST request
						$country_province[''] = '-- Select Country --';
					}
					echo form_dropdown('province', $country_province, set_value('province', $user_data->province), 'id="province" class="span12"');
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('City *','city',array('class'=>'required control-label form_label')); ?>

			<div class="controls">
				<?php 

					$input_data = array(
						'name'		=> 'city',
						'id'		=> 'city',
						'class'		=> 'form_input span12',
						'value'		=> set_value('city', $user_data->city),
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Street Address *','street_address',array('class'=>'required control-label form_label')); ?>

			<div class="controls">
				<?php 

					$input_data = array(
						'name'		=> 'street_address',
						'id'		=> 'street_address',
						'class'		=> 'form_input max_chars span12',
						'value'		=> set_value('street_address', $user_data->street_address),
						'maxlength'	=> '60',
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Phone Number *','phone_number', array('class'=>'control-label required form_label'));?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'phone_number',
						'id'		=> 'phone_number',
						'class'		=> 'form_input max_chars span12',
						'value'		=> set_value('phone_number', $user_data->phone_number),
						'maxlength'	=> '60',
					);
					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Focus Area *','focus_area',array('class'=>'required control-label form_label'));?>
			<div class="controls">
				<?php 
					$options = array(
	                  'MSM'  => 'MSM',
	                  'Transgender'    => 'Transgender',
	                  'HIV/AIDS'   => 'HIV/AIDS',
	                  'General Population' => 'General Population',
	                  'IDU' => 'IDU',
	                  'Sex Worker' => 'Sex Worker',
	                  'Youth' => 'Youth',
	                  'Other' => 'Other'
	                );
					echo form_dropdown('focus_area[]', $options, set_value('focus_area', unserialize($user_data->focus_area)), 'class="span12" multiple="multiple"');
				?>
			</div>
		</div>
		<div class="control-group">
			
		</div>
		<div class="control-group">
			<?php echo form_label('Official Website URL','website',array('class'=>'control-label required form_label'));?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'website',
						'id'		=> 'website',
						'class'		=> 'form_input max_chars span12',
						'value'		=> set_value('website', $user_data->website),
						
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Blog URL','blog',array('class'=>'control-label required form_label'));?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'blog',
						'id'		=> 'blog',
						'class'		=> 'form_input max_chars span12',
						'value'		=> set_value('blog', $user_data->blog),
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Facebook URL','facebook',array('class'=>'control-label required form_label'));?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'facebook',
						'id'		=> 'facebook',
						'class'		=> 'form_input max_chars span12',
						'value'		=> set_value('facebook', $user_data->facebook),
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Twitter URL','twitter',array('class'=>'control-label required form_label'));?>
			<div class="controls">
				<?php 
					$input_data = array(
						'name'		=> 'twitter',
						'id'		=> 'twitter',
						'class'		=> 'form_input max_chars span12',
						'value'		=> set_value('twitter', $user_data->twitter),
					);

					echo form_input($input_data);
				?>
			</div>
		</div>
		<div class="">
			<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
			<input type="hidden" id="ajax_url" value="<?php echo if_secure_site_url('autopopulate_country/process_request/country'); ?>" />
			<!-- <input class="btn btn-primary btn-large" type="submit" name="register" value="Register"> -->
		</div>
	</fieldset>
		<fieldset>
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
					'value'		=> 'Submit',
					'class'		=> 'btn btn-primary'
				);
				
				echo form_submit($input_data);
			?>

			</div>
		</div>
	</div>
</form>
</div>
<?php

/* End of file update_customer.php */
/* Location: /application/views/update_user.update_customer.php */