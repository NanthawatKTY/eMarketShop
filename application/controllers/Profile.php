<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$data['content_text']="Profile";
		$data['content_view']="view/content_profile";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}
	public function ManageAccount()
	{
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/account/manageaccount";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}
	public function DocSetting()
	{
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="comingSoon";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}
	public function ChatSetting()
	{
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="comingSoon";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}
}