<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Table Content for User Management
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

if( $users_data !== FALSE )
{
	/**
	 * Current page var allows delete method to redirect back here. 
	 * This only applies if javascript is disabled.
	 */
	$current_page = ( $this->uri->segment(3) ) ? '/' . $this->uri->segment(3) : '';

	$i = 0;

	foreach( $users_data as $user )
	{
		if( $i % 2 != 0 )
		{
			$class = 'odd';
		}
		else
		{
			$class = 'even';
		}

		echo '
			<tr id="' . $user->user_id . '" class="' . $class . '">
				<td>' 
					. $user->user_name . 
				'</td>
				<td>' 
					. $user->user_email . 
				'</td>
				<td>' 
					. $roles[$user->user_level] . 
				'</td>
				<td class="delete-column">
					' . secure_anchor( 
							'administration/delete_user/' . $user->user_id . $current_page , 
							'<i class="icon-trash icon-white"></i>',
							array( 'class' => 'delete-img btn btn-danger btn-small' )
						 ) . '
					' . secure_anchor( 
							'administration/update_user/' . $user->user_id, 
							'<i class="icon-pencil icon-white"></i>',
							array( 'class' => 'edit-img btn btn-info btn-small' )
						 ) . '
				</td>
			</tr>
		';

		$i++;
	}
}

/* End of file manage_users_table_content.php */
/* Location: /application/views/administration/manage_users_table_content.php */