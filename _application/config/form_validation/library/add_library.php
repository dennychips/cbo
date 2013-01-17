<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 */

$config['add_library'] = array(
	array(
		'field' => 'title',
		'label' => 'Title',
		'rules' => 'trim|required|xss_clean'
	),
	array(
		'field' => 'type',
		'label' => 'Type',
		'rules' => 'trim|xss_clean|required'
	),
	array(
		'field' => 'author',
		'label' => 'Author',
		'rules' => 'trim|xss_clean'
	),
	array(
		'field' => 'date',
		'label' => 'Date',
		'rules' => 'trim|required|xss_clean'
	),
	array(
		'field' => 'link',
		'label' => 'Link',
		'rules' => 'trim|xss_clean|prep_url'
	),
	array(
		'field' => 'description',
		'label' => 'Description',
		'rules' => 'trim|xss_clean'
	),

);

/* End of file registration_form.php */
/* Location: /application/config/form_validation/register/registration_form.php */