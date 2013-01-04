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
		$names = str_replace('-', ' ', $name);
		$this->template = 'templates/library_template';
		$view_data = array(
				'provinces' => $this->profile->get_province_by_country($names),
				'country_name' => $name
			);
		$data = array(
				'title' => 'CBO - eLibrary',
				'content' => $this->load->view('directory/country', $view_data, TRUE),
				'javascripts' => array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/by-country.js',
					),
				'style_sheets' => array(
						'assets/css/jquery.dataTables.css' => 'screen',
					),
			);
		$this->load->view($this->template, $data);	
	}
	public function download($id = ''){
		if($id == ''){
			show_404();
		} else {
			$this->load->helper('download');
			$dl = $this->profile->dl_path($id);
			print_r($dl);
			$data = file_get_contents($dl['file_path']);
			force_download($dl['file_name'], $data);
		}
	}
	public function view($id) {
		//$ip = $this->input->ip_address();
		$this->load->model('user_model');
		$this->load->model('library_model');
		$count = $this->profile->getprofilecounter($id);
		$counter= $count['counter'] + 1;
		$this->profile->updatecounter($id, $counter);
		$view_data = array(
				'profile' => $this->profile->getprofile($id),
				'counter' => $this->profile->get_counter($id),
				'documents' => $this->user_model->get_profile_document($id),
				'recents' => $this->library_model->get_recent_uploads($id),
				'profile_id' => $id
			);
		$this->template = 'templates/single';
		$data = array(
				'title' 	=> 'CBO - eLibrary',
				'content' 	=> $this->load->view('directory/detail', $view_data, TRUE),
				'javascripts'	=> array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/recent-uploads.js',
					),
				'style_sheets' => array(
						'assets/css/jquery.dataTables.css' => 'screen',
					),
			);
		$this->load->view($this->template, $data);
	}
	public function process_request() {
		if( $this->input->is_ajax_request())
		 {
	        $this->load->library('Datatables');
	        
	    	$this->datatables->select('organization, country, province , focus_area, user_id');
	    	$org = $this->input->post('organization');
			$this->datatables->from('customer_profile');
	    	$this->datatables->unset_column('user_id');
	    	
	    	if(isset($org) && $org !== ''){
	    		// $this->datatables->where('organization', $_POST['organization']);
	    		$this->datatables->filter('organization LIKE "%' . $_POST['organization'] .'%"');
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
			$this->datatables->add_column('edit', '<a href="'.base_url().'cbodirectory/view/$1" class="btn btn-small btn-primary">View Profile</a>', 'user_id');

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
		  	// print_r($this->db->last_query());
		  	echo json_encode($a);	  	
		  	
    	}

	}
	public function profile_by_country($name) {
		if($this->input->is_ajax_request()){
			$name = str_replace('-', ' ', $name);
			$this->load->library('datatables');
	    	$this->datatables->select('organization, country, province , focus_area, user_id');
	    	$this->datatables->where('country = "' . $name .'"');
			$this->datatables->from('customer_profile');
	    	$this->datatables->unset_column('user_id');
	    	$org = $this->input->post('organization');
	    	
	    	if(isset($org) && $org !== ''){
	    		// $this->datatables->where('organization', $_POST['organization']);
	    		$this->datatables->filter('organization LIKE "%' . $_POST['organization'] .'%"');
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
			$this->datatables->add_column('edit', '<a href="'.base_url().'cbodirectory/view/$1" class="btn btn-small btn-primary">View Profile</a>', 'user_id');

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
		  	// print_r($this->db->last_query());
		  	echo json_encode($a);
		}
	}
	public function profile_recent_uploads($id){
		if($this->input->is_ajax_request()){
			$this->load->library('datatables');

			$this->datatables->select('library_data.id, title, author, created, type, format, library_category.category_name');
			$this->datatables->from('library_data');
			$this->datatables->join('library_category', 'library_category.catID = library_data.type');
			$this->datatables->where('library_data.user_id = '.$id  );
			$this->datatables->unset_column('library_data.id');
			$this->datatables->unset_column('type');
			$this->datatables->edit_column('title', '<a href="elibrary/view/$1">$2</a>', 'library_data.id, title');
			$this->datatables->add_column('view', '<a href="elibrary/view/$1" class="btn btn-success btn-small"><i class="icon-share-alt icon-white"></i> Detail</a>', 'library_data.id');
			
			$data = $this->datatables->generate();
			$decode = json_decode($data);
			// print_r($decode->aaData);
			foreach($decode->aaData as $k => $v ){
				$time = date('Y', $v[2]);
				
				$decode->aaData[$k][2] = $time;
			}
			echo json_encode($decode);
		}
	}
}