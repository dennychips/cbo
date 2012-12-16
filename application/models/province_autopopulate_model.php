<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Province_autopopulate_model extends CI_Model {
	public function get_country() {
		
		$q = $this->db->distinct()->select('country')->get('country_province');

		if( $q->num_rows() > 0 )
		{
			return $q->result();
		}

		return FALSE;
		
	}
}