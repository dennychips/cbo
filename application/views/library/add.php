<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
?>

<div class="span8">
<h3>Add Document</h3>
<hr />

<?php
	echo form_open( '', array( 'class' => 'add-docs-form' ) ); 
	// USERNAME LABEL AND INPUT ***********************************************
	echo form_label('Title *','title',array('class'=>'form_label'));
	$input_data = array(
		'name'		=> 'title',
		'id'		=> 'title',
		'class'		=> 'form_input span8',
		'value'		=> set_value('user_name'),
		'maxlength'	=> 255
	);
	echo form_input($input_data);

	echo form_label('Description *','description',array('class'=>'form_label'));
	$input_data = array(
		'name'		=> 'description',
		'id'		=> 'description',
		'class'		=> 'form_input span8',
		'value'		=> set_value('user_name'),
		'rows'		=> 8
	);
	echo form_textarea($input_data);

	echo form_label('Document Type *','type',array('class'=>'form_label'));
	$type = array(
			'1' => 'Report',
			'2' => 'Research',
			'3' => 'Journal'
		);
	echo form_dropdown('type', $type , set_value('type'), 'id="type" class="span3"');

	echo form_label('Author *','author',array('class'=>'form_label'));
	$input_data = array(
		'name'		=> 'author',
		'id'		=> 'author',
		'class'		=> 'form_input span3',
		'value'		=> set_value('user_name'),
		'maxlength'	=> 255
	);
	echo form_input($input_data);
	echo form_label('Link *','link',array('class'=>'form_label'));
			$input_data = array(
				'name'		=> 'link',
				'id'		=> 'link',
				'class'		=> 'form_input span3',
				'value'		=> set_value('user_name'),
				'maxlength'	=> 255
			);
	echo form_input($input_data);
	echo form_label('Upload File *','upload',array('class'=>'form_label'));
	$input_data = array(
		'name'		=> 'upload',
		'id'		=> 'upload',
		'class'		=> 'form_input span3',
		'value'		=> set_value('user_name'),
		
	);
	echo form_upload($input_data);

?>
<hr />
<input type="submit" value="Publish" class="btn btn-primary btn-small" />
<input type="hidden" id="ci_csrf_token_name" value="<?php echo config_item('csrf_token_name'); ?>" />
<?php echo form_close();?>
</div>

<div class="span4">
	<div class="well">
		<h5>Upload File</h5>
		<hr>

	</div>
</div>

