<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Database_model');
		session_start();
	}
	
	function index()
	{
		$data['title']="数码广场后台管理系统_管理员登录";
		$this->load->view('admin/main_view',$data);
	}
	function head() {
		$this->load->view('admin/head_view');
	}
	function back() {
		$this->load->view('admin/back_view');
	}
	function content() {
		$data['advertiser_count'] = $this->db->count_all('er_advertiser');
		$data['category_count'] = $this->db->count_all('e_business_type');
		$data['address_count'] = $this->db->where('level','3')->get('e_address')->num_rows();
		$data['news_count'] = $this->db->count_all('er_news');
		$this->load->view('admin/content_view',$data);
	}
	function menu() {
		$this->load->view('admin/menu_view');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */