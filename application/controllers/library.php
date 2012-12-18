<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Library extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->is_logged_in();
	}

	public function index() {
		$this->template = 'templates/library_template';
		$data = array(
				'title' => 'CBO - eLibrary',
				'content' => $this->load->view('library/main', '', TRUE)
			);
		$this->load->view($this->template, $data);
	}

	function view($id) {
		$this->template = 'templates/single';
		$data = array(
				'title' 	=> 'CBO - eLibrary',
				
				'content' 	=> $this->load->view('library/detail', '', TRUE)
			);
		$this->load->view($this->template, $data);	
	}
	public function add() {
		if( $this->require_min_level(1) )
		{
			$this->template = 'templates/single';
			$data = array(
					'title' 	=> 'CBO - eLibrary',
					
					'content' 	=> $this->load->view('library/add', '', TRUE)
				);
			$this->load->view($this->template, $data);	
		}
	}
}