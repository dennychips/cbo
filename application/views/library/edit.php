<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
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

elseif(isset($validation_passed)) {
	echo '
		<div class="alert alert-success">
			<p>
				Document Updated
			</p>
		</div>
	';
} 
// if(!isset($validation_passed)){
?>
	<div class="control-group">
		<?php echo form_label('Title *','title',array('class'=>'form_label control-label'));?>
		
		<div class="controls">
		<?php 
			$input_data = array(
				'name'		=> 'title',
				'id'		=> 'title',
				'class'		=> 'form_input span12',
				'value'		=> set_value('title', $lib_data->title),
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
				'value'		=> set_value('description', $lib_data->description),
				'rows'		=> 13
			);
			echo form_textarea($input_data);
		?>
		</div>
	</div>
<!-- The fileinput-button span is used to style the file input field as button --> 
		

	<div id="hidden_form">
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $auth_user_id; ?>" />
		<input type="hidden" id="file_types" value="<?php //echo $file_types; ?>" />
		<input type="hidden" id="allowed_types" value="<?php //echo $uploader_settings['allowed_types']; ?>" />
		<!-- <input type="hidden" id="delete_image_url" value="<?php echo secure_site_url('custom_uploader/delete_image'); ?>" /> -->
		<input type="hidden" id="upload_library_url" value="<?php echo secure_site_url('uploads_manager/bridge_filesystem/library_uploader'); ?>" />
		<input type="hidden" id="delete_doc_url" value="<?php echo secure_site_url('elibrary/delete_document/'.$lib_id); ?>" />
		<input type="hidden" id="library_id" value="<?php echo $doc_id ?>" />
		<input type="submit" value="Publish Document" class="btn btn-block btn-primary btn-large pull-right" />
		<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
		<input type="hidden" id="delete_action" value="edits">

	</div>
</div>

<div class="span4">
	<div class="well">
		<h5 class="short_headline"><span>Upload File</span></h5>
		<div class="control-group">
			<?php echo form_label('Upload File *','upload',array('class'=>'control-label form_label')); ?>
			<div class="controls" > 
				<!-- The fileinput-button span is used to style the file input field as button --> 
				<span id="upload-button" class="btn-block btn btn-primary fileinput-button"> <span><i class="icon-plus icon-white"></i> Upload Document...</span>
				<?php 
					$input_data = array(
					'name'		=> 'userfile',
					// 'id' => 'upload-button',
					// 'class'		=> 'form_input span3',
					'value'		=> set_value('user_name'),
					);
					echo form_upload($input_data);
				?>	
				<!-- <input type="file" name="files[]"> -->
				</span>

				<div class="progress progress-striped active" style="display:none">
		    	<div class="bar" style="width: 100%;"></div>
   				</div>
   				
				<ul class="unstyled doc-placeholder">
					<?php if(!empty($lib_data->file_name)) :?>
					<li>
						<a href="#"><?php echo $lib_data->file_name?></a>
						<span class="pull-right"><a href="javascript:void(0)" id="delete-btn" class="btn btn-danger btn-small"><i class="icon-trash icon-white"></i></a></span>
					</li>
					<?php endif?>
				</ul>
			</div>
			
			<!-- <div class="doc-placeholder">
				<ul class="unstyled">
				</ul>
			</div> -->
		</div>
		<div class="clearfix"></div>
		<?php 
		echo form_label('Document Type *','type',array('class'=>'form_label'));
		
		$type[''] = '-- Select Document Type --';
		foreach ($doc_type as $row) {
			$type[$row->catID] = $row->category_name;
		}
		
		
		echo form_dropdown('type', $type , set_value('type', $lib_data->catID), 'id="type" class="span12"');
		echo form_label('Author *','author',array('class'=>'form_label'));
		$input_data = array(
			'name'		=> 'author',
			'id'		=> 'author',
			'class'		=> 'form_input span12',
			'value'		=> set_value('author', $lib_data->author),
			'maxlength'	=> 255
		);
		echo form_input($input_data);
		echo form_label('Link *','link',array('class'=>'form_label'));
				$input_data = array(
					'name'		=> 'link',
					'id'		=> 'link',
					'class'		=> 'form_input span12',
					'value'		=> set_value('link', $lib_data->link),
					'maxlength'	=> 255
				);
		echo form_input($input_data);
		?>

	</div>
</div>

</div>
<?php //} ?>
<?php echo form_close();?>