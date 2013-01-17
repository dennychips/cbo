<div id="accordion2" class="accordion">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"> Change Account Details </a>
		</div>
		<div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
			<div class="accordion-inner">
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
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"> Change Password </a>
		</div>
		<div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
			<div class="accordion-inner">
				<div class="form-row">
			<h3>Leave Blank To Keep Current Password:</h3>

			<?php
				// PASSWORD LABEL AND INPUT ********************************
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
				// CONFIRM PASSWORD LABEL AND INPUT ******************************
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
			<label for="show-password" class="checkbox inline">
			<?php
				// SHOW PASSWORD CHECKBOX
				// echo form_label('Show Passwords','show-password',array('class'=>'form_label'));

				$checkbox_data = array(
					'id' => 'show-password'
				);

				echo form_checkbox( $checkbox_data );
			?>
			Show Password
			</label>

		</div>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"> Change Account Details </a>
		</div>
		<div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
			<div class="accordion-inner">
				<fieldset>
				<legend>Profile Image</legend>
				<div class="profile_image">
					<?php
						// PROFILE IMAGE
						echo img(
							( ! empty( $user_data->profile_image ) ) ? $user_data->profile_image : 'assets/images/Profile-Placeholder.png',
							FALSE,
							( $upload_destination == 'database' && ! empty( $user_data->profile_image ) ) ? TRUE : FALSE
						);

						// DELETE PROFILE IMAGE LINK
						$attrs['id'] = 'delete-profile-image';

						// If there is no profile image uploaded, hide the delete link
						if( empty( $user_data->profile_image ) )
						{
							$attrs['style'] = 'display:none;';
						}

						echo '<br />' . secure_anchor('user/delete_profile_image','Delete Profile Image', $attrs);

						// Get upload config array for display to user
						$upload_config = config_item('upload_configuration_profile_image');
					?>
				</div>
				<div id="upload_details">
					<table class="simple_table table">
						<caption>Upload Requirements</caption>
						<tbody>
							<tr>
								<td>Max Image File Size</td>
								<td class="align-right"><?php echo $upload_config['max_size']; ?> kb</td>
							</tr>
							<tr>
								<td>Max Image Width</td>
								<td class="align-right"><?php echo $upload_config['max_width']; ?> px</td>
							</tr>
							<tr>
								<td>Max Image Height</td>
								<td class="align-right"><?php echo $upload_config['max_height']; ?>px</td>
							</tr>
							<tr>
								<td>Allowed File Types</td>
								<td class="align-right"><?php echo str_replace('|',' &bull; ', $upload_config['allowed_types'] ); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="form-row">
					<div class="profile-upload-controls">
						<div class="uploader-button">
							<div id="profile_image_uploader" class="fileupload fileupload-new" data-provides="fileupload">
								<span class="btn btn-file btn-info"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="userfile" /></span>
							</div>
							<?php
								// PROFILE IMAGE UPLOAD BUTTON
								$button_data = array(
									// 'id'   => 'file-input',
									'class' => 'btn btn-info',
									'name' => 'userfile'
								);

								//echo form_upload( $button_data );
							?>
						</div>
						<div class="uploader-activity-container">
							<img id="uploader-activity" style="display:none" src="assets/images/network_activity.gif" />
						</div>
					</div>
				</div>
			</fieldset>
			</div>
		</div>
	</div>
</div>
<div class="form-column-left">
	<fieldset>
		
		
	</fieldset>
	<fieldset>
		
		<div class="form-row">
			<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_data->user_id; ?>" />
			<input type="hidden" id="allowed_types" value="<?php echo $upload_config['allowed_types']; ?>" />
			<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
			<input type="hidden" id="upload_url" value="<?php echo secure_site_url('uploads_manager/bridge_' . $upload_destination . '/profile_image'); ?>" />
			<input type="hidden" id="delete_url" value="<?php echo secure_site_url('user/delete_profile_image'); ?>" />
		</div>
	</fieldset>
	<div class="form-row">
		<div id="submit_box">

			<?php
				// SUBMIT BUTTON ***********************
				$input_data = array(
					'name'		=> 'submit',
					'id'		=> 'submit_button',
					'value'		=> 'Update'
				);

				echo form_submit($input_data);
			?>

		</div>
	</div>
</div>