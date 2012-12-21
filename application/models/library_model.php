<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Library_model extends MY_Model {

	function get_library_document($user_id) {
		$query = $this->db->get_where( config_item('library_document_table'), array( 'user_id' => $user_id ) );

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
	public function save_document_data( $user_id, $image_data )
	{
		// Check for existing images
		$query = $this->get_library_document( $user_id );

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
				config_item('library_document'), 
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
	public function add_library($data) {

		$this->validation_rules = config_item( 'add_library' );
		if($this->validate())
		{
			$lib =  array(
					'user_id' => $data['user_id'],
					'title' => $data['title'],
					'type' => $data['type'] ,
					'file_path' => '',
					'created'	=> time(),
					'modified' => time(),
					'view_counter' => 0
				);
			print_r($lib);
			$this->db->set($lib)
							->insert('library_data');
			print_r($this->db->last_query());
		}
	}

	public function get_type() {
		$this->db->select('catID, category_name');
		$q = $this->db->get('library_category');
		if($q->num_rows > 0 ){
			return $q->result();
		}
		return false;

	}
	
}