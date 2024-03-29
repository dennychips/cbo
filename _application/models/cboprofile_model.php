<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');


class Cboprofile_model extends CI_Model {
	public function getallcbo(){
		$q = $this->db->get(config_item('customer_profiles_table'));
		if($q->num_rows() > 0 ) {
			return $q->result();
		}
		return FALSE;
	}

	public function getprofile($id) {
		$q = $this->db->where('user_id', $id)->
			get(config_item('customer_profiles_table'));
		if($q->num_rows() > 0){
			return $q->row_array();
		}
		return FALSE;
	}
	public function update_counter($ip, $id){
		$data = array(
			'profile_id' => $id,
			'ip_address' => $ip
		);
		$this->db->insert('profile_counter', $data);
	}
	public function get_counter($id) {
		// $q = $this->db->distinct()->select('ip_address')->where('profile_id', $id)
		// ->get('profile_counter');
		// not unique
		$q = $this->db->select('counter')->where('user_id', $id)
		->get('customer_profile');
		
		return $q->row_array();
	}
	public function getprofilecounter($id) {
		$q = $this->db->select('counter')->where('user_id', $id)->get('customer_profile');
		return $q->row_array();
	}
	public function updatecounter($id, $data) {
		$data = array('counter' => $data);
		$this->db->where('user_id',$id)->update('customer_profile', $data);
	}
	public function dl_path($id) {
		
		$this->db->select('file_path, file_name')
		->where('id', $id);
		$q = $this->db->get('customer_profile_file');
		echo $this->db->last_query();
		return $q->row_array();
	}
	public function count_profile() {
		$count = $this->db->count_all('customer_profile');
		return $count;
	}
	public function get_province_by_country($name){
		$this->db->select('province');
		$q = $this->db->get_where('country_province', array('country' => $name));

		return $q->result_array();
	}
	public function get_city($name){
		$this->db->distinct();
		$this->db->select('city');
		$this->db->where('country', $name);
		$q = $this->db->get('customer_profile');
		
		return $q->result_array();

	}
	public function get_recent_item($table, $limit = '') {
		$this->db->join('users', 'users.user_id = customer_profile.user_id', 'left');
		$this->db->where('users.user_level', 1);
		$this->db->order_by('user_date', 'desc');
		$q = $this->db->get($table, $limit);
		return $q->result();
	}
}