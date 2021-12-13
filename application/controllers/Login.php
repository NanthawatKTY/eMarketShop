<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/content_login";
		$data['title']="";
		$this->load->view('login',$data);
	}
	public function verifyEmail()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/content_verify";
		$data['title']="";
		$this->load->view('login',$data);
	}	
	public function register()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/content_regis";
		$data['title']="";
		$this->load->view('login',$data);
	}	
}