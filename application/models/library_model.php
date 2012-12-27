<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Library_model extends MY_Model {

	private $insert_data = array();

	function get_library_document($user_id) {
		$query = $this->db->get_where( config_item('library_document_table'), array( 'user_id' => $user_id ) );

		if( $query->num_rows() == 1 )
		{
			return $query->row();
		}

		return FALSE;
	}
	public function get_all_lib_data(){
		$q = $this->db->get('library_data');
		if($q->num_rows() > 0 ) {
			return $q->result();

		}
		return FALSE;

	}
	public function add_library() {
		$this->config->load( 'form_validation/library/add_library' );
		$this->validation_rules = config_item( 'add_library' );
		if($this->validate())
		{
			//print_r($this->input->post());
			$lib =  array(
					'id' => $this->_generate_lib_id(),
					'user_id' => $this->input->post('user_id'),
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description') ,
					'type' => $this->input->post('type'),
					'author' => $this->input->post('author'),
					'link' => $this->input->post('link'),
					'format' => $this->input->post('libid'),
					'libfile_id' => $this->input->post('libid'),
					'created'	=> time(),
					'modified' => time(),
				);
			// if($this->input->post('link') !== ''){
			// 	$format = array( 0 => 'Link');
			// 	$lib['format'] = serialize($format);
			// } elseif($this->input->post('link') !== '' && $this->input->post('libid') !== ''){
			// 	$getformat = $this->getformat($this->input->post('libid'));
				
			// 	print_r($getformat);
			// 	echo '<hr />';
			// }
			// print_r($lib);die();

			
			if($this->db->set($lib)->insert('library_data')){
				if($this->_move_file_tmp($this->input->post('libid')) !== FALSE){
					$this->db->insert('library_file', $this->insert_data);
				}
				$this->db->delete('library_file_tmp', array('id' => $this->input->post('libid')));
			}
			
		}
	}
	function get_format($id) {
		$q = $this->db->get_where('library_file_tmp', array('id' => $id));

		if($q->num_rows() > 0){
			$result = $q->row_array();
			return $result;
		}

	}
	private function _move_file_tmp($id) {
		$q = $this->db->get_where('library_file_tmp', array('id' => $id));
		if($q->num_rows() == 1 ) {
			$result = $q->row();
			$doctype = str_replace('.', '', ($result->file_ext));
			$this->insert_data = array(
					'lib_id' => $id,
					'file_path' => $result->file_path,
					'file_size' => $result->file_size,
					'file_ext' => $result->file_ext,
					'doctype' => strtoupper($doctype)
				);
			return $result->id;
		}
		return FALSE;
	}
	public function get_type() {
		$this->db->select('catID, category_name');
		$q = $this->db->get('library_category');
		if($q->num_rows > 0 ){
			return $q->result();
		}
		return false;

	}

	public function insert_lib_doc() {
		
		$data = $this->input->post();
		//print_r($data['image_data']);
		$insert_data = array(
				'id' => $this->_generate_lib_id(),
				'file_path' => $data['image_data']['file_path'],
				'file_size' => $data['image_data']['file_size'],
				'file_ext' => $data['image_data']['file_ext']
			);
		$entry = $this->db->insert('library_file_tmp', $insert_data);
		if($entry){
			$response['id'] = $insert_data['id'];
			$response['file_ext'] = $insert_data['file_ext'];
			return $response;
		} else {
			return FALSE;
		}
		
	}

	private function _generate_lib_id(){
		$random_unique_int = mt_rand(1200,999999999);

		return $random_unique_int;
	}
	
}