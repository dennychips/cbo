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
		$this->breadcrumb->append_crumb('Home', base_url());
		$this->breadcrumb->append_crumb('elibrary', base_url().'elibrary');

		$view_data = array(
				'profiles' => $this->lib->get_all_lib_data(),
				'author' => $this->lib->getdata('author', 'library_data'),
				'publisher' => $this->lib->get_publisher(),
				'format' => $this->lib->getdata('format', 'library_data'),
				'doctype' => $this->lib->getdata('category_name', 'library_category'),
				'country' => $this->lib->get_publisher_country()
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
	public function manage() {
		if( $this->require_role('admin,manager')){
			$data = array(
				'title' 		=> 'Manage Document',
				'content'		=> $this->load->view('library/manage', '', TRUE),
				'javascripts'	=> array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/manage-doc.js'
					),
				'style_sheets' => array(
						'assets/css/jquery.dataTables.css' => 'screen',
					),
			);
			$this->template = 'templates/administration_template';
			$this->load->view($this->template, $data);	
		}		
	}
	function view($id ='') {
		$doc_data = $this->lib->get_document($id);
		if($doc_data && $id != ''){
			$count = $this->lib->getdocumentcounter($id);
			$counter= $count['view_counter'] + 1;
			$this->lib->update_doc_counter($id, $counter);
			$this->breadcrumb->append_crumb('Home', base_url());
			$this->breadcrumb->append_crumb('elibrary', base_url().'elibrary');		
			$this->breadcrumb->append_crumb($doc_data->title, base_url().'tutorials/spring-tutorials');	

			$this->load->helper('bytes_helper');
			$this->template = 'templates/single';
			$view_data = array(
					'document' => $doc_data,
					'related' => $this->lib->related_document($id)
				);
			$data = array(
					'title' 	=> 'CBO - eLibrary',
					'content' 	=> $this->load->view('library/detail', $view_data, TRUE)
				);
			$this->load->view($this->template, $data);
		} else {
			show_404();
		}
	}
	public function add() {

		if( $this->require_min_level(1))
		{			
			if($this->csrf->token_match){
				$add = $this->lib->add_library($this->input->post());
				if($add){
					$this->session->set_flashdata('message', 'Document Published');
					redirect('user');
				}
			}

			$view_data['uploader_settings'] = config_item('upload_configuration_library_uploader');

			// Create a more human friendly version of the allowed_types
			$view_data['file_types'] = str_replace( '|', ' &bull; ', $view_data['uploader_settings']['allowed_types'] );
			// $view_data['images'] = $this->lib->get_library_document( $this->auth_user_id );
			$view_data['doc_type'] = $this->lib->get_type();
			$view_data['user_list'] = $this->lib->get_user($this->auth_user_id, $this->auth_role);
			// $this->template = 'templates/single';
			$data = array(
					'title' 	=> 'CBO - eLibrary',
					'content' 	=> $this->load->view('library/add', $view_data, TRUE),
					'javascripts' => array(
							'assets/js/ckeditor/ckeditor.js',
							'js/ajaxupload.js',
							'assets/js/jquery-ui-1.9.2.custom.js',
							'assets/js/document-uploader-controls.js'
						),
					'style_sheets' => array(
 							'assets/css/smoothness/jquery-ui-1.9.2.custom.css' => 'screen'
						),
					'dynamic_extras' => '
						$(document).ready(function(){
							$( "#date" ).datepicker({
									"dateFormat": "DD, d MM, yy"
								});
						});
					'
					
				);
			$this->template = 'templates/administration_template';
			$this->load->view($this->template, $data);	
			
		}
	}
	public function edit($id) {
		if( $this->require_min_level(1))
		{
			if($this->csrf->token_match){
				
				$this->lib->update_library($this->input->post(), $id);
			}

			// $view_data = array();

			$view_data['lib_data'] = $this->lib->get_data_by_id($id);
			$view_data['doc_type'] = $this->lib->get_type();
			// $view_data['file'] = $this->lib->get_lib_file();
			$view_data['doc_id'] = $view_data['lib_data']->lib_id;
			$view_data['lib_id'] = $id;
			$view_data['user_list'] = $this->lib->get_user($this->auth_user_id, $this->auth_role);
			$data = array(
					'title' 	=> 'CBO - Edit eLibrary',
					'content' 	=> $this->load->view('library/edit', $view_data, TRUE),
					'javascripts' => array(
							'assets/js/ckeditor/ckeditor.js',
							'js/ajaxupload.js',
							'assets/js/jquery-ui-1.9.2.custom.js',
							'assets/js/document-uploader-controls.js'
						),
					'style_sheets' => array(
 							'assets/css/smoothness/jquery-ui-1.9.2.custom.css' => 'screen'
						),
					'dynamic_extras' => '
						$(document).ready(function(){
							$( "#date" ).datepicker({
									"dateFormat": "DD, d MM, yy"
								});
						});
					'
				);
			$this->template = 'templates/administration_template';
			$this->load->view($this->template, $data);
		}
	}
	public function delete() {
		if($this->input->is_ajax_request()){
			if($delete = $this->lib->delete_library($this->input->post('id'))){
				$response['status'] = 'success';
			} else {
				$response['status'] = 'error';
			}

			echo json_encode($response);
		}
	}
	public function download($id ='') {
		if( $this->uri->segment(2) == ''){
			show_404();
		} else {
			$this->load->helper('download');
			$dl = $this->lib->dl_path($id);
			$data = file_get_contents($dl['file_path']);
			$count = $this->lib->get_dl_counter($id);
			$counter = $count['counter'] + 1;
			$this->lib->update_dl_counter($id, $counter);
			force_download($dl['file_name'], $data);
			
		}
	}
	public function insert_lib_data() {
		 if($this->csrf->token_match){
		 	if( $this->input->is_ajax_request())
		 	{
			 	$data = $this->input->post();

			 	$doc_type = (str_replace('.', '', $data['doc_data']['file_ext']));
			 	
			 	$insert_data = array(
			 			'file_name' => $data['doc_data']['file_name'],
			 			'file_path' => $data['doc_data']['file_url'],
			 			'file_size' => $data['doc_data']['file_size'],
			 			'file_type' => $doc_type
			 		);
			 	if($res = $this->lib->insert_lib_doc($insert_data)) {
			 		
			 		$response['id'] = $res['id'];
			 		$response['doctype'] = $res['doctype'];
			 		$response['file_name'] = $data['doc_data']['file_name'];
					$response['token']         = $this->csrf->token;
					$response['ci_csrf_token'] = $this->security->get_csrf_hash();
				}
				echo json_encode($response);
			}
		 }

	}
	public function process_request() {
		$this->load->library('Datatables');
		$this->datatables->select('library_data.id, title, customer_profile.organization, country, author, created, type, format, library_category.category_name');
		$this->datatables->from('library_data');
		$this->datatables->join('library_category', 'library_category.catID = library_data.type');
		$this->datatables->join('customer_profile', 'customer_profile.user_id = library_data.user_id');
		$this->datatables->unset_column('library_data.id');
		$this->datatables->unset_column('type');
		$this->datatables->edit_column('title', '<a href="elibrary/view/$1">$2</a>', 'library_data.id, title');
		$this->datatables->add_column('view', '<a href="elibrary/view/$1" class="btn btn-success btn-mini"><i class="icon-share-alt icon-white"></i></a>', 'library_data.id');
		if(isset($_POST['author']) && $_POST['author'] !== ''){
    		$this->datatables->filter('author', $_POST['author']);
	    }
	    if(isset($_POST['format']) && $_POST['format'] !==''){
	    	$this->datatables->where('format', $_POST['format']);
	    }
	    if(isset($_POST['doctype']) && $_POST['doctype'] !==''){
	    	$this->datatables->where('library_category.category_name', $_POST['doctype']);
	    }
	    if(isset($_POST['title']) && $_POST['title'] !==''){
	    	$this->datatables->where('title LIKE "%' . $_POST['title'] .'%"');
	    }
	    if(isset($_POST['country']) && $_POST['country'] !==''){
	    	$this->datatables->where('country LIKE "%' . $_POST['country'] .'%"');
	    }
	    if(isset($_POST['publisher']) && $_POST['publisher'] !==''){
	    	$this->datatables->where('organization LIKE "%' . $_POST['publisher'] .'%"');
	    }
		$data = $this->datatables->generate();
		// echo $this->db->last_query();
		$decode = json_decode($data);
		// print_r($decode->aaData);
		foreach($decode->aaData as $k => $v ){
			$time = date('Y', $v[4]);
			
			$decode->aaData[$k][4] = $time;
		}

		echo json_encode($decode);

	}

	public function category($slug) {
		$category_name = str_replace('-', ' ', $slug);
		$this->breadcrumb->append_crumb('Home', base_url());
		$this->breadcrumb->append_crumb('elibrary', base_url().'elibrary');
		$this->breadcrumb->append_crumb('Category', base_url().'elibrary');
		$this->breadcrumb->append_crumb(ucwords($category_name), base_url().'category/'.$slug);
		$view_data = array(
				'profiles' => $this->lib->get_all_lib_data(),
				'author' => $this->lib->get_author($slug),
				'format' => $this->lib->get_format_lib($slug),
				'doctype' => $this->lib->get_type_lib($slug),
				'publisher' => $this->lib->get_publisher(),
				'country' => $this->lib->get_publisher_country(),
				'slug' => $slug
			);
		$this->template = 'templates/library_template';
		$data = array(
				'title' 		=> 'CBO - eLibrary',
				'content' 		=> $this->load->view('library/category', $view_data, TRUE),
				'javascripts'	=> array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/category.js'
					),
				'style_sheets' => array(
						'assets/css/jquery.dataTables.css' => 'screen',
					),
			);
		$this->load->view($this->template, $data);
	}
	public function library_by_category($slug){
		if($this->input->is_ajax_request()){
			$this->load->library('datatables');
			$this->datatables->select('library_data.id, title, organization, country, author, created, type, format, library_category.category_name, library_category.slug');
			$this->datatables->from('library_data');
			$this->datatables->join('library_category', 'library_category.catID = library_data.type');
			$this->datatables->where('library_category.slug', $slug);
			$this->datatables->join('customer_profile', 'customer_profile.user_id = library_data.user_id');
			$this->datatables->unset_column('library_data.id');
			$this->datatables->unset_column('type');
			$this->datatables->unset_column('library_category.slug');
			$this->datatables->edit_column('title', '<a href="elibrary/view/$1">$2</a>', 'library_data.id, title');
			$this->datatables->add_column('view', '<a href="elibrary/view/$1" class="btn btn-success btn-small"><i class="icon-share-alt icon-white"></i> Detail</a>', 'library_data.id');
			if(isset($_POST['author']) && $_POST['author'] !== ''){
	    		$this->datatables->filter('author', $_POST['author']);
		    }
		    if(isset($_POST['format']) && $_POST['format'] !==''){
		    	$this->datatables->where('format', $_POST['format']);
		    }
		    if(isset($_POST['doctype']) && $_POST['doctype'] !==''){
		    	$this->datatables->where('library_category.category_name', $_POST['doctype']);
		    }
		    if(isset($_POST['title']) && $_POST['title'] !==''){
		    	$this->datatables->where('title LIKE "%' . $_POST['title'] .'%"');

		    }
			$data = $this->datatables->generate();
			// print_r($this->db->last_query());
			$decode = json_decode($data);
			// print_r($decode->aaData);
			foreach($decode->aaData as $k => $v ){
				$time = date('Y', $v[4]);
				$decode->aaData[$k][4] = $time;
			}
			echo json_encode($decode);	
		}
	}
	public function delete_document($id = ''){	
		
		if($this->input->post('temp') == true){
			
			$del = $this->lib->delete_temp_lib_file($this->input->post('libid'), $id);
			if($del){
				$response = array(
						'success' => 'success',
						'token' => $this->csrf->token
					);
			} else {
				$response['success'] = 'Error';
			}

		} else {
			$del = $this->lib->delete_lib_file($this->input->post('libid'), $id);
			if($del){
			$response = array(
					'success' => 'success',
					'token' => $this->csrf->token
				);
			} else {
				$response['success'] = 'Error';
			}
		}
		echo json_encode($response);
	}
	public function publisher() {
		$uid = $this->uri->uri_to_assoc(2);
		$this->breadcrumb->append_crumb('Home', base_url());
		$this->breadcrumb->append_crumb('elibrary', base_url().'elibrary');
		$this->breadcrumb->append_crumb('Publisher', '#');
		$this->breadcrumb->append_crumb('name', base_url().'elibrary');
		$view_data = array();
		$this->template = 'templates/library_template';
		$data = array(
				'title' 		=> 'CBO - eLibrary',
				'content' 		=> $this->load->view('library/publisher', $view_data, TRUE),
				'javascripts'	=> array(
						'assets/js/jquery.dataTables.min.js',
						'assets/js/bootstrap-DT-init.js',
						'assets/js/category.js'
					),
				'style_sheets' => array(
						'assets/css/jquery.dataTables.css' => 'screen',
					),
			);
		$this->load->view($this->template, $data);
		
	}
	public function getdocument() {
		if($this->input->is_ajax_request()){
			$country = $this->lib->get_manager_country($this->auth_user_id);
			// print_r($country);
			$this->load->library('datatables');
			$this->datatables->select('library_data.id, title, type, format, library_category.category_name, modified, created');
			$this->datatables->from('library_data');
			$this->datatables->join('library_category', 'library_category.catID = library_data.type');
			$this->datatables->join('customer_profile', 'customer_profile.user_id = library_data.user_id');
			if($this->auth_role == 'manager'){
				$this->datatables->where('country = "'. $country['country'] .'"');
			}
			$this->datatables->unset_column('library_data.id');
			$this->datatables->unset_column('type');
			$this->datatables->edit_column('title', '<a href="elibrary/view/$1">$2</a>', 'library_data.id, title');
			$this->datatables->add_column('view', '<a href="elibrary/edit/$1" class="btn btn-info btn-small"><i class="icon-pencil icon-white"></i></a> <a href="elibrary/view/$1" class="btn btn-danger btn-small"><i class="icon-trash icon-white"></i></a>', 'library_data.id');
			$data = $this->datatables->generate();
			// echo $this->db->last_query();
			$decode = json_decode($data);
			
			foreach($decode->aaData as $k => $v ){
				$created = date('F j, Y, g:i a', $v[3]);
				$modified = date('F j, Y, g:i a', $v[4]);
				$decode->aaData[$k][3] = $created;
				$decode->aaData[$k][4] = $modified;
			}
			echo json_encode($decode);
			
		}
		
	}
}