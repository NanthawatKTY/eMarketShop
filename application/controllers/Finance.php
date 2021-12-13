<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

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
		$data['content_view']="view/finance/content_income";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function balance()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/finance/content_balance";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function report()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/finance/content_finance_report";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function wallet()
	{	
		$data['lang']= get_language();
		$data['content_text']="";
		$data['content_view']="view/finance/content_finance_wallet";
		$data['title']="";
		$this->load->view('index',$data);
	}	
}