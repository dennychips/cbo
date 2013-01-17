<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Form Validation Rules for Customer Creation
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

$config['customer_creation_rules'] = array(
	array(
		'field' => 'user_name',
		'label' => 'Username',
		'rules' => 'trim|required|alpha_numeric|max_length['. MAX_CHARS_4_USERNAME .']|min_length['. MIN_CHARS_4_USERNAME .']|external_callbacks[model,formval_callbacks,_username_check]'
	),
	array(
		'field' => 'user_pass',
		'label' => 'Password',
		'rules' => 'trim|required|external_callbacks[model,formval_callbacks,_check_password_strength,TRUE]'
	),
	array(
		'field' => 'user_email',
		'label' => 'EMAIL ADDRESS',
		'rules' => 'trim|required|max_length[255]|valid_email|external_callbacks[model,formval_callbacks,_email_exists_check]'
	),
	array(
		'field' => 'first_name',
		'label' => 'First Name',
		'rules' => 'trim|required|max_length[20]|xss_clean'
	),
	array(
		'field' => 'last_name',
		'label' => 'Last Name',
		'rules' => 'trim|required|max_length[20]|xss_clean'
	),
	array(
		'field' => 'street_address',
		'label' => 'Street Address',
		'rules' => 'trim|required|xss_clean'
	),
	array(
		'field' => 'organization',
		'label' => 'Organization',
		'rules' => 'trim|required|xss_clean'
	),
	array(
		'field' => 'organization_email',
		'label' => 'Organization Email Address',
		'rules' => 'trim|required|max_length[255]|valid_email'
	),
	array(
		'field' => 'city',
		'label' => 'City',
		'rules' => 'trim|required|xss_clean'
	),
	array(
		'field' => 'description',
		'label' => 'Description',
		'rules' => 'trim|xss_clean'
	),
	array(
		'field' => 'country',
		'label' => 'Country',
		'rules' => 'trim|required|xss_clean'
	),
	array(
		'field' => 'province',
		'label' => 'Province',
		'rules' => 'trim|required|xss_clean'
	),
	array(
		'field' => 'phone_number',
		'label' => 'Phone Number',
		'rules' => 'trim|xss_clean'
	),
	array(
		'field' => 'focus_area',
		'label' => 'Focus Area',
		'rules' => 'required'
	),
	array(
		'field' => 'website',
		'label' => 'Website',
		'rules' => 'trim|xss_clean|prep_url'
	),
	array(
		'field' => 'blog',
		'label' => 'Blog',
		'rules' => 'trim|xss_clean|prep_url'
	),

	array(
		'field' => 'facebook',
		'label' => 'Facebook',
		'rules' => 'trim|xss_clean|prep_url'
	),
	array(
		'field' => 'twitter',
		'label' => 'Twitter',
		'rules' => 'trim|xss_clean|prep_url'
	),
);

/* End of file create_customer.php */
/* Location: /application/config/form_validation/administration/create_user/create_customer.php */