<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$data['content_view']="view/admin/content_admin_home";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function manageSeller()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/admin/content_admin_mSeller";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function adminSetting()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/admin/content_admin_setting";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function manageAdmin()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/admin/content_admin_user";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function adminRegis()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/admin/content_admin_register";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function quotation()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/admin/content_admin_quotation";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function quotationDetail()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/admin/content_admin_quotation_detail";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function orders()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/admin/content_admin_orders";
		$data['title']="";
		$this->load->view('index',$data);
	}
}