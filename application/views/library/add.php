<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

?>
<?php
	echo form_open_multipart( '', array( 'class' => 'add-docs-form' ) ); 
?>
<div class="row-fluid">

<div class="span8">
<h3 class="short_headline"><span>Add Document</span></h3>
<?php 
if( isset( $validation_errors ) >= 1 )
{
	echo '
		<div class="feedback error_message">
			<p class="feedback_header">
				The following form fields contained errors:
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
if(!isset($validation_passed)){
?>
	<div class="control-group">
		<?php echo form_label('Title *','title',array('class'=>'form_label control-label'));?>
		
		<div class="controls">
		<?php 
			$input_data = array(
				'name'		=> 'title',
				'id'		=> 'title',
				'class'		=> 'form_input span12',
				'value'		=> set_value('title'),
				'maxlength'	=> 255
			);
			echo form_input($input_data);
		?>
		</div>
	</div>
	<div class="control-group">
		<?php echo form_label('Description *','description',array('class'=>'form_label'));?>
		
		<div class="controls">
		<?php 
			$input_data = array(
				'name'		=> 'description',
				'id'		=> 'description',
				'class'		=> 'ckeditor form_input span12',
				'value'		=> set_value('description'),
				'rows'		=> 13
			);
			echo form_textarea($input_data);
		?>
		</div>
	</div>
<?php
	// echo form_label('Document Type *','type',array('class'=>'form_label'));
	// $type = array(
	// 		'1' => 'Report',
	// 		'2' => 'Research',
	// 		'3' => 'Journal'
	// 	);
	// echo form_dropdown('type', $type , set_value('type'), 'id="type" class="span3"');

	// echo form_label('Author *','author',array('class'=>'form_label'));
	// $input_data = array(
	// 	'name'		=> 'author',
	// 	'id'		=> 'author',
	// 	'class'		=> 'form_input span3',
	// 	'value'		=> set_value('user_name'),
	// 	'maxlength'	=> 255
	// );
	// echo form_input($input_data);
	// echo form_label('Link *','link',array('class'=>'form_label'));
	// 		$input_data = array(
	// 			'name'		=> 'link',
	// 			'id'		=> 'link',
	// 			'class'		=> 'form_input span3',
	// 			'value'		=> set_value('user_name'),
	// 			'maxlength'	=> 255
	// 		);
	// echo form_input($input_data);
	// echo form_label('Upload File *','upload',array('class'=>'form_label'));
	// $input_data = array(
	// 	'name'		=> 'upload',
	// 	'id'		=> 'upload',
	// 	'class'		=> 'form_input span3',
	// 	'value'		=> set_value('user_name'),
		
	// );
	// echo form_upload($input_data);


?>
<!-- The fileinput-button span is used to style the file input field as button --> 
		


<input type="hidden" name="user_id" id="user_id" value="<?php echo $auth_user_id; ?>" />
<input type="hidden" id="file_types" value="<?php echo $file_types; ?>" />
<input type="hidden" id="allowed_types" value="<?php echo $uploader_settings['allowed_types']; ?>" />
<input type="hidden" id="update_image_order_url" value="<?php echo secure_site_url('custom_uploader/update_image_order'); ?>" />
<input type="hidden" id="delete_image_url" value="<?php echo secure_site_url('custom_uploader/delete_image'); ?>" />
<input type="hidden" id="upload_library_url" value="<?php echo secure_site_url('uploads_manager/bridge_filesystem/library_uploader'); ?>" />
<input type="submit" value="Publish Document" class="btn btn-block btn-primary btn-large pull-right" />
<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
</div>

<div class="span4">
	<div class="well">
		<h5 class="short_headline"><span>Upload File</span></h5>
		<div class="control-group">
			<?php echo form_label('Upload File *','upload',array('class'=>'control-label form_label')); ?>
			<div class="controls"> 
				<!-- The fileinput-button span is used to style the file input field as button --> 
				<span class="btn btn-primary fileinput-button"> <span><i class="icon-plus icon-white"></i> Upload Document...</span>
				<?php 
					$input_data = array(
					'name'		=> 'upload[]',
					// 'class'		=> 'form_input span3',
					'value'		=> set_value('user_name'),
					);
					echo form_upload($input_data);
				?>
				<!-- <input type="file" name="files[]"> -->
			</div>
				
		</div>
		<br />
		<br />
		<div class="clearfix"></div>
		<?php 
		echo form_label('Document Type *','type',array('class'=>'form_label'));
		
		$type[''] = '-- Select Document Type --';
		foreach ($doc_type as $row) {
			$type[$row->catID] = $row->category_name;
		}
		
		
		echo form_dropdown('type', $type , set_value('type'), 'id="type" class="span12"');
		echo form_label('Author *','author',array('class'=>'form_label'));
		$input_data = array(
			'name'		=> 'author',
			'id'		=> 'author',
			'class'		=> 'form_input span12',
			'value'		=> set_value('author'),
			'maxlength'	=> 255
		);
		echo form_input($input_data);
		echo form_label('Link *','link',array('class'=>'form_label'));
				$input_data = array(
					'name'		=> 'link',
					'id'		=> 'link',
					'class'		=> 'form_input span12',
					'value'		=> set_value('link'),
					'maxlength'	=> 255
				);
		echo form_input($input_data);
		?>

	</div>
</div>
<?php } ?>
</div>
<?php echo form_close();?>