<?php
	session_start();
    class Index extends CI_Controller
    {
    	function __construct()
		{
			parent::__construct();		
		}
		
		function index()
		{
			if(!isset($_SESSION['userinfo']))
			{
				$data['userinfo'] = array();
			}else {
				$data['userinfo'] = $_SESSION['userinfo'];
			}   
			$data['description'] = 'Smgc.in';
			$data['keywords'] = 'Smgc.in';
			$data['title'] = 'Smgc.in';
			$data['current_menu'] = 'home';
			$this->load->view('index/header_view',$data);
			$this->load->view('index/menu_view');
			$this->load->view('index/aside_view');
			$this->load->view('index/content_view');
			$this->load->view('index/footer_view');
		}
    }
?>