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

			$lib =  array(
					'id' => $this->_generate_lib_id(),
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description') ,
					'type' => $this->input->post('type'),
					'author' => $this->input->post('author'),
					'link' => $this->input->post('link'),
					'libfile_id' => $this->input->post('libid'),
					'date' => strtotime($this->input->post('date')),
					'created'	=> time(),
					'modified' => time(),
				);

			if($this->auth_role != 'customer') {
				$lib['user_id'] = $this->input->post('user');
			} else {
				$lib['user_id'] = $this->input->post('user_id');
			}
			
			if($this->input->post('link')!== '' && $this->input->post('format') == ''){
				$lib['format'] = 'Link';
			} else if($this->input->post('link') !== '' && $this->input->post('format') !== ''){
				$lib['format'] = $this->input->post('format');
			}
			
			if($this->db->set($lib)->insert('library_data')){
				if($this->_move_file_tmp($this->input->post('libid')) !== FALSE){
					$this->db->insert('library_file', $this->insert_data);
				}
				$this->db->delete('library_file_tmp', array('id' => $this->input->post('libid')));
			}

			return true;
			
		}
		return false;
	}
	public function update_library($data, $id) {
		$this->config->load( 'form_validation/library/add_library' );
		$this->validation_rules = config_item( 'add_library' );
		if($this->validate())
		{			
			
			$insert_data = array(
					'title' => $data['title'],
					'description' => $data['description'],
					'type' => $data['type'],
					'author' => $data['author'],
					'link' => $data['link'],
					'modified' => time(),
					'libfile_id' => $this->input->post('libid')
				);
			if($this->auth_role != 'customer') {
				$insert_data['user_id'] = $this->input->post('user');
			} else {
				$insert_data['user_id'] = $this->input->post('user_id');
			}

			if($this->input->post('link')!== '' && $this->input->post('format') == ''){
				$insert_data['format'] = 'Link';
			} else if($this->input->post('link') !== '' && $this->input->post('format') !== ''){
				$insert_data['format'] = $this->input->post('format');
			}

			
			if($this->db->set($insert_data)->where('id', $id)->update('library_data')){
				if($this->_move_file_tmp($this->input->post('libid')) !== FALSE){
					$this->db->insert('library_file', $this->insert_data);
				}
				$this->db->delete('library_file_tmp', array('id' => $this->input->post('libid')));
			}
			return true;
		}
		return false;
	}
	public function get_format($id) {
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
			// $doctype = str_replace('.', '', ($result->file_ext));
			$this->insert_data = array(
					'lib_id' => $id,
					'file_name' => $result->file_name,
					'file_path' => $result->file_path,
					'file_size' => $result->file_size,
					'doctype' => $result->doctype
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

	public function insert_lib_doc($data) {
		// $data = $this->input->post();
		//print_r($data['image_data']);
		$insert_data = array(
				'id' => $this->_generate_lib_id(),
				'file_name' => $data['file_name'],
				'file_path' => $data['file_path'],
				'file_size' => $data['file_size'],
				'doctype' => $data['file_type']
			);
		$entry = $this->db->insert('library_file_tmp', $insert_data);
		if($entry){
			$response['id'] = $insert_data['id'];
			$response['doctype'] = $insert_data['doctype'];
			return $response;
		} else {
			return FALSE;
		}
		
	}
	public function get_document($id) {
		$this->db->select('library_data.user_id, title, link, library_data.description, doctype, author, customer_profile.organization, library_data.date, library_category.category_name, library_data.view_counter, library_file.file_size, library_file.counter, library_file.lib_id');
		$this->db->join('library_category', 'library_data.type = library_category.catID', 'right');
		$this->db->join('library_file', 'library_data.libfile_id = library_file.lib_id', 'left');
		$this->db->join('customer_profile', 'customer_profile.user_id = library_data.user_id', 'left');
		$q = $this->db->get_where('library_data', array('library_data.id' => $id));
		// echo $this->db->last_query();
		if($q->num_rows() != 0 ){
			return $q->row();
		}
		return false;
	}
	public function dl_path($id){
		$this->db->select('file_path, file_name')
		->where('lib_id', $id);
		$q = $this->db->get('library_file');
		return $q->row_array();
	}

	private function _generate_lib_id(){
		$random_unique_int = mt_rand(1200,999999999);

		return $random_unique_int;
	}
	public function getdocumentcounter($id) {
		$this->db->select('view_counter');
		$q = $this->db->get_where('library_data', array('id' => $id));
		return $q->row_array();
	}
	public function update_doc_counter($id, $counter){
		$data = array('view_counter' => $counter);
		$this->db->where('id',$id)->update('library_data', $data);
	}
	public function get_dl_counter($id) {
		$q = $this->db->get_where('library_file', array('lib_id' => $id));
		return $q->row_array();
	}
	public function update_dl_counter($id, $counter){
		$data = array('counter' => $counter);
		$this->db->where('lib_id',$id)->update('library_file', $data);
	}
	
	public function getdata($column, $table){
		$q = $this->db->distinct()->select($column)->get($table);

		return $q->result_array();
	}
	public function get_recent_uploads($user_id) {

		$q = $this->db->get_where('library_data', array('user_id' => $user_id));

		return $q->result();
	}
	public function get_recent_item($table, $limit = '') {
		$this->db->order_by("modified", "desc"); 
		$q = $this->db->get($table, $limit);
		return $q->result();
	}
	public function get_data_by_id($data_id) {
		$this->db->join('library_category', 'library_data.type = library_category.catID');
		$this->db->join('library_file', 'library_data.libfile_id = library_file.lib_id', 'left');
		$q = $this->db->get_where('library_data', array('library_data.id' => $data_id));
		// echo $this->db->last_query();
		return $q->row();
	}
	public function getlibfile($id){
		$q = $this->db->get_where('library_file', array('lib_id' => $id));
		return $q->row_array();
	}
	public function delete_lib_file($fileid, $libid) {
		$user_dir = $this->auth_user_id . '-' . md5( config_item('encryption_key') . $this->auth_user_id );
		$file = $this->getlibfile($fileid);
		// print_r($file);die();
		if(strpos( $file['file_path'], $user_dir ) !== FALSE) {
			$uploaded_file = FCPATH . str_replace( base_url(), '', $file['file_path'] );
			unlink($uploaded_file);
			$q = $this->db->delete('library_file', array('lib_id' => $fileid));
		} 
		if($q) {
			$data = array('libfile_id' => '0', 'format' => 'Link');
			$this->db->where('id', $libid);
			$this->db->set($data)->update('library_data');
			return true;
		} 
		return false;
	} 
	public function delete_library($id){
		$get_lib = $this->db->get_where('library_data', array('id' => $id));
		$res = $get_lib->row_array();
		if($id !== '') {
			if($res['libfile_id'] != '0'){
				$d = $this->db->get_where('library_file', array('lib_id' => $res['libfile_id']));
				$doc = $d->row_array();
				$uploaded_file = FCPATH . str_replace( base_url(), '', $doc['file_path'] );
				unlink($uploaded_file);
				$this->db->delete('library_file', array('lib_id' => $doc['lib_id']));
			}
			$del = $this->db->delete('library_data', array('id' => $id));
		} 
		if($del){
			return true;
		}
		return false;

	}
	public function delete_temp_lib_file($id) {
		$get_temp = $this->db->get_where('library_file_tmp', array('id' => $id));
		$res = $get_temp->row_array();
		if($get_temp->num_rows() == 1 ){
			$uploaded_file = FCPATH . str_replace( base_url(), '', $res['file_path'] );
			unlink($uploaded_file);
			$del = $this->db->delete('library_file_tmp', array('id' => $id));
		}
		if($del) {
			return true;
		}
		return false;
	}
	public function count_library() {
		$count = $this->db->count_all('library_data');
		return $count;
	}
	public function related_document($id) {
		$type = $this->get_data_by_id($id);
		$this->db->where('type', $type->catID);
		$this->db->where('id !='.$id);
		$q = $this->db->get_where('library_data');
		
		return $q->result();
	}
	public function get_manager_country($uid) {
		$this->db->select('country')->where('user_id', $uid);
		$q = $this->db->get('manager_profiles');
		$country = $q->row_array();
		return $country;
	}
	public function get_publisher_country() {
		$this->db->distinct();
		$this->db->select('country');
		$this->db->join('library_data', 'library_data.user_id = customer_profile.user_id');
		$q = $this->db->get('customer_profile');
		// echo $this->db->last_query();
		$country = $q->result_array();
		return $country;
	}
	public function get_publisher() {
		$this->db->distinct();
		$this->db->select('organization');
		$this->db->join('library_data', 'library_data.user_id = customer_profile.user_id');
		$q = $this->db->get('customer_profile');
		$publisher = $q->result_array();
		return $publisher;
	}
	public function get_author($slug) {
		$this->db->distinct();
		$this->db->select('author');
		$this->db->join('library_data', 'library_data.user_id = customer_profile.user_id');
		$this->db->join('library_category', 'library_category.catID = library_data.type');
		$this->db->where('library_category.slug', $slug);
		$q = $this->db->get('customer_profile');
		$author = $q->result_array();
		return $author;	
	}
	public function get_type_lib($slug) {
		$this->db->distinct();
		$this->db->select('category_name');
		$this->db->join('library_data', 'library_data.user_id = customer_profile.user_id');
		$this->db->join('library_category', 'library_category.catID = library_data.type');
		$this->db->where('library_category.slug', $slug);
		$q = $this->db->get('customer_profile');
		$type = $q->result_array();
		return $type;	
	}
	public function get_format_lib($slug) {

		$this->db->distinct();
		$this->db->select('format');
		$this->db->join('library_data', 'library_data.user_id = customer_profile.user_id');
		$this->db->join('library_category', 'library_category.catID = library_data.type');
		$this->db->where('library_category.slug', $slug);
		$q = $this->db->get('customer_profile');
		$format = $q->result_array();
		
		return $format;	
	}
	public function get_user($uid, $role) {
		if($role == 'admin') {
			$this->db->select('organization, users.user_id, customer_profile.country');
			$this->db->join('users', 'users.user_id = customer_profile.user_id');
			$u = $this->db->get('customer_profile');
			$q = $u->result();
		} elseif($role == 'manager') {
			$country = $this->get_manager_country($uid);
			$this->db->select('organization, user_id');
			$this->db->where('customer_profile.country = "'.$country['country'].'"');
			$u = $this->db->get('customer_profile');
			$q = $u->result();
			
		} else {
			$q = false;
		}

		return $q;
	}
}