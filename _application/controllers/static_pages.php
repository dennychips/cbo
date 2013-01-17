<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Static Pages Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 *
 * This controller servers to clean up some controllers that were just used for 
 * simple static content where there was very little logic, calculations, or 
 * much of anything worth having a whole controller for.
 */

class Static_pages extends MY_Controller {

	/**
	 * Class constructor
	 */
	public function __construct()
	{
		parent::__construct();
		// Defeat duplicate content
		if( $this->uri->segment(1) == 'static_pages' )
		{
			show_404();
		}

		/**
		 * If session is not in a secure cookie, we can still test for logged in user 
		 * via the is_logged_in() method, and the variables it sets in MY_Controller. 
		 * If session is in a secure cookie, then we would test for something in the 
		 * http user cookie. The difference between these cookies is that the secure 
		 * session cookie offers better overall protection. The http user cookie should 
		 * never be used for authentication purposes. Community Auth only uses this 
		 * cookie to show the logout link, which is not sensitive.
		 */
		$this->is_logged_in();
	}

	// --------------------------------------------------------------

	/**
	 * Display the home page
	 */
	public function index()
	{
		$this->load->model(array('library_model', 'cboprofile_model'));
		$view_data['profile_count'] = $this->cboprofile_model->count_profile();
		$view_data['library_count'] = $this->library_model->count_library();
		$this->template = 'templates/main_template';
		$data = array(
			'title' => 'CBO eLibrary',
			'content' => $this->load->view( 'static_pages/home', $view_data, TRUE ),
			
		);	
		$this->load->view( $this->template, $data );
	}

	// --------------------------------------------------------------

	/**
	 * Display the about
	 */

	public function about() {

		$data = array(
				'title' => 'CBO eLibrary - About',
				'content' => $this->load->view('static_pages/about', '', TRUE),
			);
		$this->load->view($this->template, $data);
	}


	// --------------------------------------------------------------

	public function feature() {
		$data = array(
				'title' => 'CBO eLibrary - Feature',
				'content' => $this->load->view('static_pages/feature', '', TRUE)
			);
		$this->load->view($this->template, $data);
	}

	public function links() {
		$data = array(
				'title' => 'CBO eLibrary - Feature',
				'content' => $this->load->view('static_pages/links', '', TRUE),
			);
		$this->load->view($this->template, $data);	
	}

	// --------------------------------------------------------------
	
	/**
	 * robots.txt generation for development environment.
	 * This is only here so to try to prevent an unmodified 
	 * installation of Community Auth from appearing to be 
	 * duplicate content by a search engine.
	 */
	public function robots_txt()
	{
		if( ENVIRONMENT == 'development' )
		{
			header("Content-Type: text/plain");
			echo "User-agent: *\nDisallow: /\nNoindex: /\n";
		}
		else
		{
			show_404();
		}
	}
	
	// --------------------------------------------------------------
}

/* End of file static_pages.php */
/* Location: ./application/controllers/static_pages.php */