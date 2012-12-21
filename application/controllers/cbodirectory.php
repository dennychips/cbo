<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Cbodirectory extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->is_logged_in();
		$this->load->library('csrf');
		$this->load->model('cboprofile_model', 'profile');
		$this->load->model('library_model', 'lib');
	}

	public function index() {
		$this->load->model('registration_model');
		$this->load->model( 'province_autopopulate_model', 'autopop' );
		$view_data = array(
				'profiles' => $this->profile->getallcbo(),
				'recent' => 'recent'
			);
		$view_data ['country'] =  $this->registration_model->get_country();

			if( $this->csrf->token_match )
			{
				if( $this->input->post('type') )
				{
					$view_data['province'] = $this->autopop->get_province_in_country();

				}
			}
		
		
		$this->template = 'templates/library_template';
		$data = array(
				'title' => 'CBO - eLibrary',
				'content' => $this->load->view('directory/main', $view_data, TRUE),
				'javascripts'	=> array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/directory.js',
						'js/autopopulate_country.js'
					),
				'style_sheets' => array(
						'assets/css/jquery.dataTables.css' => 'screen',
					),
			);
		$this->load->view($this->template, $data);
	}
	public function country($name) {
		$this->template = 'templates/library_template';
		$data = array(
				'title' => 'CBO - eLibrary',
				'content' => $this->load->view('directory/country', '', TRUE)
			);
		$this->load->view($this->template, $data);	
	}
	public function view($id) {
		//$ip = $this->input->ip_address();
		$count = $this->profile->getprofilecounter($id);
		$counter= $count['counter'] + 1;
		$this->profile->updatecounter($id, $counter);
		$view_data = array(
				'profile' => $this->profile->getprofile($id),
				'counter' => $this->profile->get_counter($id),

			);
		$this->template = 'templates/single';
		$data = array(
				'title' 	=> 'CBO - eLibrary',
				'content' 	=> $this->load->view('directory/detail', $view_data, TRUE)
			);
		$this->load->view($this->template, $data);
	}
	public function process_request() {
		// if( $this->input->is_ajax_request())
		// {
	        $this->load->library('Datatables');
	        
	    	$this->datatables->select('organization, country, province , focus_area, user_id');
	    	$org = $this->input->post('organization');
			$this->datatables->from('customer_profile');
	    	$this->datatables->unset_column('user_id');
	    	
	    	if(isset($org) && $org !== ''){
	    		// $this->datatables->where('organization', $_POST['organization']);
	    		$this->datatables->filter('organization >=', $_POST['organization']);
	    	} 
	    	if(isset($_POST['country']) && $_POST['country'] !== ''){
	    		$this->datatables->filter('country', $_POST['country']);
	    	}
	    	if(isset($_POST['province']) && $_POST['province'] !==''){
	    		$this->datatables->where('province', $_POST['province']);
	    	}
	    	if(isset($_POST['focus_area']) && $_POST['focus_area'] !=''){
	    		$this->datatables->where('focus_area LIKE "%' . $_POST['focus_area'] .'%"');
	    	}
			$this->datatables->add_column('edit', '<a href="view/$1" class="btn btn-primary">View Profile</a>', 'user_id');

		  	$data = $this->datatables->generate();
		  	$a =  json_decode($data);
		  	foreach($a->aaData as $k => $row){
		  			$j = unserialize($row[3]);
		  			$return = '';
		  			foreach($j as $i => $m) {
		  				$return .= ($i>0) ? ", " . $m : $m;
		  			}
		  			$a->aaData[$k][3] = $return;		
		  	}
		  	print_r($this->db->last_query());
		  	echo json_encode($a);
		  	//print_r(unserialize($a->aaData[0][3])) ;
		  	
		  	//echo $data;
    	//}

	}
}