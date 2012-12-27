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
		$view_data = array(
				'profiles' => $this->lib->get_all_lib_data(),
			);
		$this->template = 'templates/library_template';
		$data = array(
				'title' 		=> 'CBO - eLibrary',
				'content' 		=> $this->load->view('library/main', $view_data, TRUE),
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
			if($this->csrf->token_match){
				$this->lib->add_library($this->input->post());
			}
			$view_data['uploader_settings'] = config_item('upload_configuration_library');

			// Create a more human friendly version of the allowed_types
			$view_data['file_types'] = str_replace( '|', ' &bull; ', $view_data['uploader_settings']['allowed_types'] );
			// $view_data['images'] = $this->lib->get_library_document( $this->auth_user_id );
			$view_data['doc_type'] = $this->lib->get_type();
			$this->template = 'templates/single';
			$data = array(
					'title' 	=> 'CBO - eLibrary',
					'content' 	=> $this->load->view('library/add', $view_data, TRUE),
					'javascripts' => array(
							'assets/js/ckeditor/ckeditor.js',
							'js/ajaxupload.js',
							'assets/js/document-uploader-controls.js',
						),
					'style_sheets' => array(
 							// 'assets/js/fineuploader/fineuploader.css' => 'screen'
						)
				);
			$this->load->view($this->template, $data);	
			
		}
	}
	public function insert_lib_data() {
		 if($this->csrf->token_match){
		 	$data = $this->input->post();
		 	
		 	$insert_data = array(
		 			'file_path' => $data['image_data']['file_url'],
		 			'file_size' => $data['image_data']['file_size'],
		 			'file_ext' 	=> $data['image_data']['file_ext']
		 		);
		 	if($res = $this->lib->insert_lib_doc($insert_data)) {
		 		
		 		$response['id'] = $res['id'];
		 		$response['file_ext'] = $res['file_ext'];
		 		$response['file_name'] = $data['image_data']['file_name'];
				$response['token']         = $this->csrf->token;
				$response['ci_csrf_token'] = $this->security->get_csrf_hash();
			}
			echo json_encode($response);
		 }

	}
	public function process_request() {
		$this->load->library('Datatables');
		$this->datatables->select('library_data.id, title, author, created, type, library_category.category_name, library_file.doctype');
		$this->datatables->from('library_data');
		$this->datatables->join('library_category', 'library_category.catID = library_data.type');
		$this->datatables->join('library_file', 'library_file.lib_id = library_data.libfile_id');
		$this->datatables->unset_column('library_data.id');
		$this->datatables->unset_column('type');
		$data = $this->datatables->generate();
		// print_r($this->db->last_query());
		$decode = json_decode($data);
		// print_r($decode->aaData);
		foreach($decode->aaData as $k => $v ){
			$time = date('Y', $v[2]);
			
			$decode->aaData[$k][2] = $time;
		}
		echo json_encode($decode);

	}
}