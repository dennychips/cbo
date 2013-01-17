<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Auto_populate_model Model
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 *
 *
 * Some alternate query examples are shown in the comments above each method.
 * These alternate queries would be used if you were using "keys" in the 
 * config file, and if seperate tables were being used for types, makes, and models.
 */

class Province_autopopulate_model extends CI_Model {

	/**
	 * Method to query database for vehicle types.
	 *
	 * If you were using "keys" in the config file, 
	 * you might use a query like this:
	 *
	 */
	public function get_types()
	{
		$query = $this->db->distinct()
			->select('country')
			->get( config_item('auto_populate_table') );
		print_r($this->db->last_query());
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}

		return FALSE;
	}

	// --------------------------------------------------------------

	/**
	 * Method to query database for vehicle makes.
	 *
	 * If you were using "keys" in the config file,
	 * you might use a query like this:
	 *
	 */
	public function get_province_in_country()
	{
		$country = $this->input->post('country');

		$this->db->distinct();

		$this->db->select('province');

		$this->db->where('country',$country );

		$query = $this->db->get( config_item('auto_populate_table_country') );

		if( $query->num_rows() > 0 )
		{
			return $query->result_array();
		}

		return FALSE;
	}
	// --------------------------------------------------------------
}

/* End of file auto_populate_model.php */
/* Location: /application/models/auto_populate_model.php */