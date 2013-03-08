<?php
class admin_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		session_start();
	}
	
	function login() 
	{
		$this->db->where('admin_id',$this->input->post('userid'));
		$this->db->where('admin_password',md5($this->input->post('password')));
		$result=$this->db->get('e_admin');
		if($result->num_rows()){
			$_SESSION['admin_is_login'] = TRUE;
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function logout()
	{
		session_destroy();
		return TRUE;
	}
}