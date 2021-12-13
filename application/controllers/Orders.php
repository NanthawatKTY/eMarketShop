<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

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

	////////////////////////  Starting of Orders management //////////////////////////////
	public function index()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
			// if ($this->uri->segment(3) == 'toship-tab') {
			// 	$data['content_view']="view/orders/orders_tabs/all_orders_tab";
			// }
		$data['content_view']="view/orders/manage_orders_tabs/all_orders_tab";
		$data['title']="Profile";
		$this->load->view('index_orders',$data);
		
	}

	public function unpaid_tab()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
			// if ($this->uri->segment(3) == 'toship-tab') {
			// 	$data['content_view']="view/orders/orders_tabs/all_orders_tab";
			// }
		$data['content_view']="view/orders/manage_orders_tabs/unpaid_tab";
		$data['title']="";
		$this->load->view('index_orders',$data);
		
	}

	public function toship_tab()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/manage_orders_tabs/to_ship_tab";
		$data['title']="";
		$this->load->view('index_orders',$data);
		
	}

	public function shipping_tab()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/manage_orders_tabs/shipping_tab";
		$data['title']="";
		$this->load->view('index_orders',$data);
		
	}

	public function success_tab()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/manage_orders_tabs/success_tab";
		$data['title']="";
		$this->load->view('index_orders',$data);
		
	}

	public function cancelled_tab()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/manage_orders_tabs/cancelled_tab";
		$data['title']="";
		$this->load->view('index_orders',$data);
	}

	public function return_tab()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/manage_orders_tabs/returnlist_tab";
		$data['title']="";
		$this->load->view('index_orders',$data);
		
	}

	//////////////////////// Ending of Orders management //////////////////////////////


	public function orderDetail()
	{	
		$data['lang']= get_language();
        $data['content_text']="Profile";
		$data['content_view']="view/orders/orders_details";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}

	public function printParcel()
	{	
		$data['lang']= get_language();
        $data['content_text']="Profile";
		$data['content_view']="view/orders/printParcelCover";
		$data['title']="Print Parcel";
		$this->load->view('index',$data);
	}

	public function quotation()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/quotation";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}
	public function quotationDetail()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/quotation_detail";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}

	public function quotationList()
	{	
		$data['lang']= get_language();
		$data['content_text']="Profile";
		$data['content_view']="view/orders/quotation_list";
		$data['title']="Profile";
		$this->load->view('index',$data);
	}
}