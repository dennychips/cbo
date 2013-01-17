<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Pagination Config for User Management
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

$config['manage_users_pagination_settings'] = array(

	'base_url' => secure_site_url( 'administration/manage_users' ),
	'per_page' => 3,
	'use_page_numbers' => TRUE,
	'cur_tag_open' => '<li class="active"><a href="#">',
	'cur_tag_close' => '</a></li>',
	'num_links' => 3,
	'num_tag_open' => '<li>',
	'num_tag_close' => '</li>'
);

$config['manage_users_search_options'] = array(
	'u.user_name' => 'username',
	'u.user_email' => 'email address'
);

/* End of file manage_users_pagination.php */
/* Location: /application/config/pagination/administration/manage_users_pagination.php */