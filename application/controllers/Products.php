<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
		$data['content_text']="Product List";
		$data['content_view']="view/products/content_productList";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function AddProduct()
	{	
		$data['lang']= get_language();
		$data['content_text']="Product List";
		$data['content_view']="view/products/content_product_add";
		$data['title']="";
		$this->load->view('index',$data);
	}
	public function EditProduct()
	{	
		$data['lang']= get_language();
		$data['content_text']="Product View";
		$data['content_view']="view/products/content_product_view";
		$data['title']="";
		$this->load->view('index',$data);
	}
}