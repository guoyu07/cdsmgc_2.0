<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertiser extends CI_Controller
{
	private $limit=10;
	public $configure=array(
			'per_page'				=>	'10',
			'use_page_numbers'		=>	FALSE,
			'next_link' 			=> '下一页',
			'prev_link'				=> '上一页',
			'first_link' 			=> '首页',
			'last_link' 			=> '尾页',
			'num_links' 			=> '4',
			'uri_segment'			=> '4'
	);
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Database_model');
		$this->load->model('Category_model');
		$this->load->model('Area_model');
		$this->load->helper('form');
		$this->load->model('Advertiser_model');
		$this->load->helper('data_process');
		session_start();
	}
	
	function index($offset = '')
	{
		$result=$this->Database_model->get_all_data('er_advertiser');
		$this->configure['base_url'] = site_url('admin/advertiser/index/');
		$this->configure['total_rows'] =$result['count'];
		$this->pagination->initialize($this->configure);
		$data['pagination'] = $this->pagination->create_links();
		if(empty($offset))
		{
			$advertiser = $this->Database_model->get_limit_data('er_advertiser',$this->limit);
			if($advertiser->num_rows())
			{
				$data['advertiser'] = $this->Advertiser_model->advertiser_process($advertiser);
			} else {
				$data['advertiser'] = array();
			}
			$data['count']=$result['count'];
		}else {
			$advertiser = $this->Database_model->get_limit_data('er_advertiser',$this->limit,$offset);
			if($advertiser->num_rows())
			{
				$data['advertiser'] = $this->Advertiser_model->advertiser_process($advertiser);
			} else {
				$data['advertiser'] = array();
			}
		}
		$data['title']='商家列表';
		$this->load->view('admin/advertiser_view',$data);
	}
	
	function add()
	{
		$data['title'] = '添加商家';
		$data['category'] = $this->Category_model->get_categories('e_business_type');
		$data['area'] = $this->Area_model->get_areas();
	//	print_r($data['category']);
		$this->load->view('admin/add_advertiser_show_view',$data);
	}
	
	function add_action()
	{
		if($this->Advertiser_model->add())
		{
			$this->index();
		}else {
			show_error('警告：商家添加失败！');
		}
	}
	
	function delete($id = '')
	{
		if($this->Advertiser_model->delete($id))
		{
			$this->index();
		}else {
			show_error('警告：商家删除失败！');
		}
	}
	function edit($id = '')
	{
		$data['advertiser'] = $this->Advertiser_model->get_by_condition(array('id'=>$id));
		$data['title'] = '修改商家资料';
		$data['category'] = $this->Category_model->get_categories();
		$data['area'] = $this->Area_model->get_areas();
		$this->load->view('admin/edit_advertiser_view',$data);
	}
	function edit_action()
	{
		if($this->Advertiser_model->edit())
		{
			$this->index();
		}
	}
	
}