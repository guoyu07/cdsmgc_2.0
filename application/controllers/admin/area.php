<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Area extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("Area_model");
			session_start();
		}
		
		function index($parent_id = '', $level = '')
		{
			if(!empty($parent_id) && !empty($level))
			{
				$param['parent_id'] = $parent_id;
				$data['level'] = ++$level;
				$data['parent_id'] = $parent_id;
				$data['title'] = $this->Area_model->get_by_condition(array('id'=>$parent_id))->result();
				$data['title'] = $data['title'][0]->name;
				switch ($data['level']) {
					case '2':
						$data['subtitle']	=	'二级地区';
						break;
					case '3':
						$data['subtitle']	=	'三级地区';
						break;
				}
			}else {
				$param['parent_id'] = 1;
				$data['parent_id'] = 1;
				$data['level'] = 1;
				$data['subtitle']	=	'一级地区';
				$data['title'] = '电脑城大楼列表';
			}	
			$data['area'] = $this->Area_model->get_by_condition($param)->result(); 
			$this->load->view('admin/area_view',$data);
		}
		
		function add()
		{
			if($this->Area_model->add())
			{
				$parent_id = $this->input->post('parent_id');
				$level = $this->input->post('level');
				$level = $level - 1;
				$this->index($parent_id, $level);
			}else {
				show_error('警告：地址添加失败！');
			}
		}
		
		function delete($id = '', $parent_id = '', $level = '')
		{
			if($this->Area_model->delete($id))
			{
				$this->index($parent_id, $level);
			}else {
				show_error('警告：地址删除失败！');
			}
		}
		function rename($id= '')
		{
			if(!empty($id))
			{
				$param['id'] = $id;
				$data['area'] = $this->Area_model->get_by_condition($param)->result();
				$data['area'] = $data['area'][0];
				$data['title'] = '地区重命名';
				$this->load->view('admin/area_name_view',$data);
			}else {
				show_error('警告：参数传递失败！');
			}
		}
		function rename_action()
		{
			$parent_id = $this->input->post('parent_id');
			$level = $this->input->post('level');
			if($this->Area_model->rename())
			{
				$this->index($parent_id,$level);
			}else {
				show_error('警告：更新失败！');
			}
		}
	}
?>