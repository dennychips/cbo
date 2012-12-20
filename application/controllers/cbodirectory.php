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
		$view_data = array(
				'profiles' => $this->profile->getallcbo(),
				'recent' => 'recent'
			);
		
		$this->template = 'templates/library_template';
		$data = array(
				'title' => 'CBO - eLibrary',
				'content' => $this->load->view('directory/main', $view_data, TRUE),
				'javascripts'	=> array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/directory.js'
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
		if( $this->input->is_ajax_request())
			{
				echo 'hello';
			}
	}
}