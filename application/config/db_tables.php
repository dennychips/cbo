<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Database Tables Config
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

// USER RELATED TABLES
$config['user_table']                   = 'users';
$config['customer_profiles_table']      = 'customer_profile';
$config['manager_profiles_table']       = 'manager_profiles';
$config['admin_profiles_table']         = 'admin_profiles';

// LOGIN ERROR RELATED TABLES
$config['errors_table']                 = 'login_errors';
$config['IP_hold_table']                = 'ips_on_hold';
$config['username_or_email_hold_table'] = 'username_or_email_on_hold';
$config['denied_access_table']          = 'denied_access';

// REGISTRATION RELATED TABLES
$config['registration_table']           = 'registration';
$config['temp_reg_data_table']          = 'temp_registration';

// MISC TABLES
$config['custom_uploader_table']        = 'custom_uploader_table';
$config['profile_document_table']        = 'profile_document';
$config['library_document_table']        = 'library_data';
$config['auto_populate_table']          = 'auto_populate';
$config['category_menu_table']          = 'category_menu';
$config['auto_populate_table_country']  = 'country_province';

/* End of file db_tables.php */
/* Location: /application/config/db_tables.php */