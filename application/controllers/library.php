<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Library extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->template = 'templates/library_template';
		$data = array(
				'title' => 'CBO - eLibrary',
				'content' => $this->load->view('library/main', '', TRUE)
			);
		$this->load->view($this->template, $data);
	}
}