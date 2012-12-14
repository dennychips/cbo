<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
?>
<h1>CBO eLibrary Registration Field</h1>

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
					USER NOT REGISTERED
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
			<div class="alert alert-info">
				<p>
					Thank you for registering. You may now ' . secure_anchor('user', 'login') . '.
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
		?>
		<?php echo form_open( '', array( 'class' => 'reg-form' ) ); ?>
			
    		<h4>Login Information</h4>
    		<hr />
    		<?php
				// USERNAME LABEL AND INPUT ***********************************************
				echo form_label('Username *','user_name',array('class'=>'form_label'));				
				$input_data = array(
					'name'		=> 'user_name',
					'id'		=> 'user_name',
					'class'		=> 'form_input alpha_numeric span4',
					'value'		=> set_value('user_name'),
					'maxlength'	=> MAX_CHARS_4_USERNAME
				);
				
				echo form_input($input_data);

			?>
		    <?php echo form_label('Email Address *','user_email',array('class'=>'form_label'));
		    $input_data = array(
							'name'		=> 'user_email',
							'id'		=> 'user_email',
							'class'		=> 'form_input max_chars span4',
							'value'		=> set_value('user_email'),
							'maxlength'	=> '255',
						);
						echo form_input($input_data);
			?>
			<?php
				// PASSWORD LABEL AND INPUT ***********************************************
				echo form_label('Password *','user_pass',array('class'=>'form_label'));
				$input_data = array(
					'name'		=> 'user_pass',
					'id'		=> 'user_pass',
					'class'		=> 'form_input password span4',
					'value'		=> set_value('user_pass'),
					'maxlength'	=> MAX_CHARS_4_PASSWORD
				);

				echo form_password($input_data);
			?>
			<label class="checkbox">
                  <input type="checkbox"> Show Password
            </label>	


		    <h4>Contact Information</h4>
    		<hr />
    		<?php 
    			echo form_label('Organization Name *','organization',array('class'=>'form_label'));
				$input_data = array(
					'name'		=> 'organization',
					'id'		=> 'organization',
					'class'		=> 'form_input password span4',
					'value'		=> set_value('organization'),
				);

				echo form_input($input_data);
    		?>
    		<?php 
    			echo form_label('Country *','country',array('class'=>'form_label'));
    			$countries[] = '-- Select Country --';
    			
    			foreach ($country as $row) {
    				$countries[$row->country] = $row->country;	
    			}

				echo form_dropdown('country', $countries, 'large', 'class="span4"');
    		?>
    		<?php 
    			echo form_label('Province *','province',array('class'=>'form_label'));
    			$province[] = '-- Select Province --';
    			
    			

				echo form_dropdown('province', $province, 'large', 'class="span4"');
    		?>
    		<?php
				// STREET ADDRESS LABEL AND INPUT ***********************************
				echo form_label('Street Address','street_address',array('class'=>'form_label'));

				$input_data = array(
					'name'		=> 'street_address',
					'id'		=> 'street_address',
					'class'		=> 'form_input max_chars span4',
					'value'		=> set_value('street_address'),
					'maxlength'	=> '60',
				);

				echo form_input($input_data);

			?>

			<?php
				// STREET ADDRESS LABEL AND INPUT ***********************************
				echo form_label('Phone Number','phone_number',array('class'=>'form_label'));

				$input_data = array(
					'name'		=> 'phone_number',
					'id'		=> 'phone_number',
					'class'		=> 'form_input max_chars span4',
					'value'		=> set_value('phone_number'),
					'maxlength'	=> '60',
				);

				echo form_input($input_data);

			?>
			<?php 
				echo form_label('Focus Area','focus_area',array('class'=>'form_label'));
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
				echo form_dropdown('focus_area[]', $options, 'large', 'class="span4" multiple="multiple"');
			?>
			
    		<?php
				// STREET ADDRESS LABEL AND INPUT ***********************************
				echo form_label('Official Website URL','website',array('class'=>'form_label'));

				$input_data = array(
					'name'		=> 'website',
					'id'		=> 'website',
					'class'		=> 'form_input max_chars span4',
					'value'		=> set_value('website'),
					
				);

				echo form_input($input_data);
			?>
			<?php
				// STREET ADDRESS LABEL AND INPUT ***********************************
				echo form_label('Blog URL','blog',array('class'=>'form_label'));

				$input_data = array(
					'name'		=> 'blog',
					'id'		=> 'blog',
					'class'		=> 'form_input max_chars span4',
					'value'		=> set_value('blog'),
				);

				echo form_input($input_data);
			?>
			<?php
				// STREET ADDRESS LABEL AND INPUT ***********************************
				echo form_label('Facebook URL','facebook',array('class'=>'form_label'));

				$input_data = array(
					'name'		=> 'facebook',
					'id'		=> 'facebook',
					'class'		=> 'form_input max_chars span4',
					'value'		=> set_value('facebook'),
				);

				echo form_input($input_data);
			?>
			<?php
				// STREET ADDRESS LABEL AND INPUT ***********************************
				echo form_label('Twitter URL','twitter',array('class'=>'form_label'));

				$input_data = array(
					'name'		=> 'twitter',
					'id'		=> 'twitter',
					'class'		=> 'form_input max_chars span4',
					'value'		=> set_value('twitter'),
				);

				echo form_input($input_data);
			?>
			
		    
		    <div class="clearfix"></div>

		    <input type="submit" value="Sign up" class="btn btn-primary pull-left">
		    <div class="clearfix"></div>
	    <?php echo form_close();?>
<?php 		
	}

}
