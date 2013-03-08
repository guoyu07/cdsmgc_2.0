<?php
    class Advertiser extends CI_Controller
    {
    	private $limit=10;
		private $configure=array(
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
			$this->load->model('Category_model');
			$this->load->model('Database_model');
			$this->load->helper('form');
			$this->load->library('pagination');
			$this->load->model('Advertiser_model');
			session_start();
		}
		
		private function load_view($content = '', $data = '')
		{
			$this->load->view('index/header_view',$data);
			$this->load->view('index/menu_view');
			$this->load->view('index/aside_advertiser_view');
			$this->load->view($content);
			$this->load->view('index/footer_view');
		} 
		
		
		function index($category = '', $offset = '')
		{
			if(!isset($_SESSION['userinfo']))
			{
				$data['userinfo'] = array();
			}else {
				$data['userinfo'] = $_SESSION['userinfo'];
			}
			if(empty($category))
			{
				$data['description'] = 'Smgc.in';
				$data['keywords'] = 'Smgc.in';
				$data['title'] = 'Smgc.in';
				$content = 'index/content_view';
			}else {
				$data['current_aside'] = $category;
				$data['description'] = 'Smgc.in';
				$data['keywords'] = '笔记本，华硕笔记本，联想笔记本';
				$data['title'] = $data['keywords'];
				$content = 'advertiser_category_view';
				
				$result=$this->Database_model->get_by_condition('e_business_type_has_er_advertiser', array('e_business_type_id' => $category));
				$this->configure['base_url'] = site_url('advertiser/index/'.$category.'/');
				$this->configure['total_rows'] = $result->num_rows();
				$this->pagination->initialize($this->configure);
				$data['pagination'] = $this->pagination->create_links();
				if(empty($offset))
				{
					$sql = "SELECT * FROM  e_business_type_has_er_advertiser , er_advertiser 
						WHERE e_business_type_has_er_advertiser.er_advertiser_id = er_advertiser.id 
						AND e_business_type_has_er_advertiser.`e_business_type_id`=$category LIMIT $this->limit";
					$advertiser = $this->db->query($sql);
					if($advertiser->num_rows())
					{
						$data['advertiser'] = $this->Advertiser_model->advertiser_process($advertiser);
					} else {
						$data['advertiser'] = array();
					}
					$data['count'] = $result->num_rows();
				}else {
					$advertiser = $this->Database_model->get_limit_data('er_advertiser',$this->limit,$offset);
					if($advertiser->num_rows())
					{
						$data['advertiser'] = $this->Advertiser_model->advertiser_process($advertiser);
					} else {
						$data['advertiser'] = array();
					}
				}	
			}   
			$data['current_menu'] = 'advertiser';	
			$data['category'] = $this->Category_model->get_categories('e_business_type');
			$data['category'] = $data['category']['key'];
			$this->load_view($content,$data);
		}
    }
?>