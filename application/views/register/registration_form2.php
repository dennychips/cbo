<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>
<h1 class="short_headline"><span>CBO eLibrary Registration Field</span></h1>
<div class="container clearfix" id="main-content">
		<div class="row-fluid">
			<div class="span7">
			<?php 
			if($reg_mode == 0 ) {
				echo '
					<div class="alert alert-info">
					  Registrations are not allowed at this time.
					</div>
				';
			} else {
				// CONFIRMATION MESSAGE - TYPE 1 *********************
				if( isset( $validation_errors ) >= 1 )
				{
					echo '
						<div class="feedback error_message">
							<p class="feedback_header">
								The following user registration form fields contained errors:
							</p>
							<ul class="unstyled">
								' . $validation_errors . '
							</ul>
							<p>
								Please Fix The Error Below
							</p>
						</div>
					';
				}

				if(isset($validation_passed) && $reg_mode == 1) {
					echo '
						<div class="alert alert-success">
							<p>
								Thank you for registering. You may now ' . secure_anchor('user', 'login') . '.
							</p>
						</div>
					';
				}

				if(isset($validation_passed) && $reg_mode == 2) {
					echo '
						<div class="alert alert-success">
							<p>
								Please check your email to confirm your account.<br />
								Click the link contained in the email.
							</p>
						</div>
					';
				}
				if( isset( $validation_passed ) && $reg_mode == 3 )
				{
					echo '
						<div class="alert alert-info">
							<p>
								Your registration is pending review.<br />
								Please be patient while we process your application.
							</p>
						</div>
					';
				}

				if(!isset($validation_passed)){
				
					echo form_open( '', array( 'class' => 'reg-form' ) ); ?>
					<fieldset>
						<h5 class="short_headline"><span>Login Information</span></h5>
						
						<div class="control-group">
							<?php echo form_label('Username *','user_name',array('class'=>'required control-label form_label')); ?>
							
							<div class="controls">
							<?php $input_data = array(
									'name'		=> 'user_name',
									'id'		=> 'user_name',
									'class'		=> 'form_input alpha_numeric span12',
									'value'		=> set_value('user_name'),
									'maxlength'	=> MAX_CHARS_4_USERNAME
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
									'value'		=> set_value('user_email'),
									'maxlength'	=> '255',
								);
								echo form_input($input_data);
							?>
						</div>
						</div>
						<div class="control-group">
							<?php echo form_label('Password *','user_pass',array('class'=>'form_label control-label required')); ?>
							
							<div class="controls">
								<?php $input_data = array(
									'name'		=> 'user_pass',
									'id'		=> 'user_pass',
									'class'		=> 'form_input password span12',
									'value'		=> set_value('user_pass'),
									'maxlength'	=> MAX_CHARS_4_PASSWORD
								);?>

								<?php echo form_password($input_data); ?>
							</div>
						</div>
						<div class="controls"><!--watch the white space in IOS!-->
							<label class="checkbox form_label">
				                  <input type="checkbox" id="show-password"> Show Password
				            </label>
						</div>
						<br />
						<h5 class="short_headline"><span>Contact Information</span></h5>
						<div class="control-group">
							<?php echo form_label('First Name *','first_name',array('class'=>'required control-label form_label')); ?>
							<div class="controls">
								<?php 
									$input_data = array(
										'name'		=> 'first_name',
										'id'		=> 'first_name',
										'class'		=> 'form_input first_name span12',
										'value'		=> set_value('first_name'),
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
										'value'		=> set_value('last_name'),
										'maxlength'	=> '20',
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
										'value'		=> set_value('organization'),
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
									echo form_dropdown('country', $countries, set_value('country'), 'id ="country" class="span12"');
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
									echo form_dropdown('province', $country_province, set_value('province'), 'id="province" class="span12"');
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
										'value'		=> set_value('street_address'),
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
										'value'		=> set_value('phone_number'),
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

									foreach($options as $k => $v ){

										 echo '<label class="checkbox">'. form_checkbox('focus_area[]', $k, set_checkbox('focus_area', $k) , false) . $v .'</label>';
									}
									//echo form_dropdown('focus_area[]', $options, set_value('focus_area'), 'class="span12" multiple="multiple"');
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
										'value'		=> set_value('website'),
										
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
										'value'		=> set_value('blog'),
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
										'value'		=> set_value('facebook'),
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
										'value'		=> set_value('twitter'),
									);

									echo form_input($input_data);
								?>
							</div>
						</div>
						<div class="">
							<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
		    				<input type="hidden" id="ajax_url" value="<?php echo if_secure_site_url('autopopulate_country/process_request/country'); ?>" />
							<!-- <input class="btn btn-primary btn-large" type="submit" name="register" value="Register"> -->
							<input type="submit" value="Register" name="submit" class="btn btn-primary pull-left">
						</div>
					</fieldset>
				<?php form_close()?>
				<!-- end registration form--> 
				<?php 		
	}

}
?>
				
			</div>
			<!--close .span7-->
			
			<div class="span4 offset1" id="why-join">
				<h3 class="short_headline"><span>Why Join?</span></h3>
				<p>Fill this up with information on why they should join, or photos, or something...</p>
			</div>
			<!--close span4 offset1--> 
		</div>
		<!-- close row-fluid--> 
	</div>

