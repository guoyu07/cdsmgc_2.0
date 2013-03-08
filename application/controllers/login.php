<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->helper('form');
		$this->load->model('Qqlogin_model');
	}
	
	function index()
	{
		$this->load->view('admin/login_view');
	}
	
	function login_action()
	{
        if($this->Admin_model->login())
		{
		//	header("Location:".site_url('admin/admin'));
			redirect(site_url('admin/admin'));
		}else {
			$this->index();
	}  
	}
	
	function logout()
	{
		if($this->Admin_model->logout())
		{
			header("Location:".base_url());
		}
	}
	
	function qqlogin()
	{
		$this->Qqlogin_model->qq_login();
	}
	function qq_callback()
	{
		$this->Qqlogin_model->qq_callback();
		echo "<script>window.opener.location.href = '".base_url()."';
				window.close();
				window.opener.closeChildWindow();</script>"; 
	}
}