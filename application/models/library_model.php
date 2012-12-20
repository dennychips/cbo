<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Library_model extends CI_Model {

	function get_library_document($user_id) {
		$query = $this->db->get_where( config_item('library_document'), array( 'user_id' => $user_id ) );

		if( $query->num_rows() == 1 )
		{
			return $query->row();
		}

		return FALSE;
	}
	
	// --------------------------------------------------------------

	/**
	 * Save images data
	 */
	public function save_image_data( $user_id, $image_data )
	{
		// Check for existing images
		$query = $this->get_custom_uploader_images( $user_id );

		// If there is no existing record
		if( $query === FALSE )
		{
			$query = $this->db->insert( 
				config_item('custom_uploader_table'), 
				array(
					'user_id' => $user_id,
					'images_data' => $image_data
				)
			);
		}

		// If there is an existing record
		else
		{
			$query = $this->db->update( 
				config_item('custom_uploader_table'), 
				array('images_data' => $image_data), 
				array( 'user_id' => $user_id ) 
			);
		}

		if( $this->db->affected_rows() == 1 )
		{
			return TRUE;
		}

		return FALSE;
	}
	
}