<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function get_language(){

	$ci =& get_instance();
          $ci->load->helper('language');
          $ci->load->helper('url');
        //echo $CI->db->hostname;
        //echo $ci->uri->segment(1);

		//$lang = default_langauge();
		if($ci->uri->segment(1) =='th'){
			$ci->lang->load('message', 'thai');
			return $ci->uri->segment(1);
		}else if($ci->uri->segment(1)=='en'){
			$ci->lang->load('message', 'english');
			return $ci->uri->segment(1);
		}else{
			$ci->lang->load('message', 'thai');
			return "th";
			//$ci->lang->load('message', 'english');
			//return "en";
		}
	}
	/*function default_langauge(){
	if($CI->uri->segment(1)!=null && $CI->uri->segment(1)!="index.html"){
		return $CI->uri->segment(1);
	}else{
		return "en";
	}*/
//}
?>