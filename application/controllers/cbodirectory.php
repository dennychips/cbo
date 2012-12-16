<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Cbodirectory extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->template = 'templates/library_template';
		$data = array(
				'title' => 'CBO - eLibrary',
				'content' => $this->load->view('directory/main', '', TRUE)
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
		$this->template = 'templates/single';
		$data = array(
				'title' 	=> 'CBO - eLibrary',
				
				'content' 	=> $this->load->view('directory/detail', '', TRUE)
			);
		$this->load->view($this->template, $data);
	}
}