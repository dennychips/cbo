<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Elibrary extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->is_logged_in();
		$this->load->library('csrf', 'upload');
		$this->load->model('library_model', 'lib');
		$this->config->load('uploads_manager');
		$this->force_ssl();
	}

	public function index() {
		$this->template = 'templates/library_template';
		$data = array(
				'title' 		=> 'CBO - eLibrary',
				'content' 		=> $this->load->view('library/main', '', TRUE),
				'javascripts'	=> array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/library.js'
					),
				'style_sheets' => array(
						'assets/css/jquery.dataTables.css' => 'screen',
					),
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
		if( $this->require_min_level(1))
		{
			$this->config->load( 'form_validation/library/add_library' );
			
			if($this->csrf->token_match){
				$libdata = $this->input->post();
				$this->lib->add_library($libdata);
			}
			$view_data['uploader_settings'] = config_item('upload_configuration_libary_document');

			// Create a more human friendly version of the allowed_types
			$view_data['file_types'] = str_replace( '|', ' &bull; ', $view_data['uploader_settings']['allowed_types'] );
			$view_data['images'] = $this->lib->get_library_document( $this->auth_user_id );
			$view_data['doc_type'] = $this->lib->get_type();
			$this->template = 'templates/single';
			$data = array(
					'title' 	=> 'CBO - eLibrary',
					'content' 	=> $this->load->view('library/add', $view_data, TRUE),
					'javascripts' => array(
							'assets/js/ckeditor/ckeditor.js',
							// 'js/ajaxupload.js',
							// 'assets/js/document-uploader-controls.js',
						),
					'style_sheets' => array(

						)
				);
			$this->load->view($this->template, $data);	
			
		}
	}
	public function process_request() {
		
	}
}