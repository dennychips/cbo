<div id="accordion2" class="accordion">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"> Change Account Details </a>
		</div>
		<div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
			<div class="accordion-inner">
				<h4 class="short_headline"><span>Contact Information</span></h4>
				<hr />
				<fieldset>
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

			    			if( isset( $province ) ){
								// Default option
								$country_province[''] = '-- Select --';
								// Options from query
								foreach( $province as $row ){
									$country_province[$row['province']] = $row['province'];
								}
							}
							
							echo form_dropdown('province', $country_province, set_value('province', $user_data->province), 'id="province" class="span12"');
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
				</fieldset>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"> Change Password </a>
		</div>
		<div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
			<div class="accordion-inner">
				<h3 class="short_headline"><span>Leave Blank To Keep Current Password:</span></h3>
				<hr />
				<fieldset>
					<div class="control-group">
						<?php echo form_label('Change Password','user_pass',array('class'=>'form_label')); ?>
						<div class="controls">
							<?php
								// PASSWORD LABEL AND INPUT ********************************
								$input_data = array(
									'name'       => 'user_pass',
									'id'         => 'user_pass',
									'class'      => 'form_input password',
									'max_length' => MAX_CHARS_4_PASSWORD
								);

								echo form_password($input_data);
							?>
						</div>
					</div>

					<div class="control-group">
						<?php echo form_label('Confirm New Password','user_pass_confirm',array('class'=>'form_label')); ?>
						<div class="controls">
							<?php
								// PASSWORD LABEL AND INPUT ********************************
								$input_data = array(
									'name'       => 'user_pass',
									'id'         => 'user_pass',
									'class'      => 'form_input password',
									'max_length' => MAX_CHARS_4_PASSWORD
								);

								echo form_password($input_data);
							?>
						</div>
						<label class="form_label checkbox">
							<input type="checkbox" id="show-password" /> Show Password
						</label>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"> Change Profile Picture </a>
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


	<h3 class="short_headline">
		<span>Upload Document</span>
	</h3>
	<hr />
	<div class="upload-wrapper clearfix">

		<div id="upload-doc-button" class="fileupload fileupload-new" data-provides="fileupload">
			<span class="btn btn-file btn-info"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" /></span>
			<span class="fileupload-preview"></span>
			<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
		</div>
		</span>
			<div class="progress progress-striped active" style="display:none">
				<div class="bar" style="width: 100%;"></div>
			</div>
		
		</div>
		<br />
		<?php 
		// var_dump(!empty($documents));
			
		?>
	<table id="doc_table" class="table">
		<thead>
			<th>File Name</th>
			<th width="20%">Action</th>
		</thead>
		<tbody>
			<?php 
				if(!empty($documents)){
					foreach($documents as $row ){
						echo '<tr id="'.$row->id.'">';
						echo '<td>'.$row->file_name.'</td>';
						// echo '<td><a href="user/delete_doc_profile/'.$row->id.'"">delete</a></td>';
						echo '<td><a href="javascript:void(0)" onclick="deleteDoc('.$row->id.')" class="btn btn-danger btn-small"><i class="icon-white icon-trash"></i> Delete</a></td>';
						echo '</tr>';
					}
					
				}
			?>
		</tbody>
	</table>

	<?php 
		$upload_config_profile_doc = config_item('upload_configuration_doc_profile');
	?>
	<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_data->user_id; ?>" />
	<input type="hidden" id="allowed_types" value="<?php echo $upload_config['allowed_types']; ?>" />
	<input type="hidden" id="allowed_types_doc_profile" value="<?php echo $upload_config_profile_doc['allowed_types']; ?>" />

	<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
	<input type="hidden" id="upload_url" value="<?php echo secure_site_url('uploads_manager/bridge_' . $upload_destination . '/profile_image'); ?>" />
	<input type="hidden" id="upload_doc_profile_url" value="<?php echo secure_site_url('uploads_manager/bridge_filesystem/doc_profile'); ?>" />
	<input type="hidden" id="delete_doc_profile" value="<?php echo secure_site_url('user/delete_doc_profile'); ?>" />
	<input type="hidden" id="delete_url" value="<?php echo secure_site_url('user/delete_profile_image'); ?>" />
	<div class="modal fade hide" id="myModal">
    	<div class="modal-header">
	    <a class="close" data-dismiss="modal">×</a>
	      <h3>Confirmation</h3>
	    </div>
	    <div class="modal-body">
	      <p>Are your sure want to delete this document ? <br /><small><i>this action cannot be undo.</i></small></p>
	    </div>
	    <div class="modal-footer">
	      <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
	      <a href="javascript:void(0)" id="confirmation" class="btn btn-danger">Delete</a>
	    </div>
  	</div>
	

<?php
	// SUBMIT BUTTON ***********************
	$input_data = array(
		'name'		=> 'submit',
		'class'		=> 'btn btn-primary ',
		'id'		=> 'submit_button',
		'value'		=> 'Update'
	);

	echo form_submit($input_data);
?>