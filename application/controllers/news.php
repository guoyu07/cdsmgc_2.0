<?php
    class News extends CI_Controller
    {
    	private $limit=5;
		private $configure=array(
			'per_page'				=>	'5',
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
			$this->load->model('Article_model');
			$this->load->model('Database_model');
			$this->load->helper('form');
			$this->load->library('pagination');
			session_start();
		}
		
		private function load_view($content = '', $data = '')
		{
			if(!isset($_SESSION['userinfo']))
			{
				$data['userinfo'] = array();
			}else {
				$data['userinfo'] = $_SESSION['userinfo'];
			}
			$this->load->view('index/header_view',$data);
			$this->load->view('index/menu_view');
			$this->load->view('index/aside_news_view');
			$this->load->view($content);
			$this->load->view('index/footer_view');
		} 
		
		function index($offset = '')
		{   
			$result = $this->Article_model->get_articles();
			$this->configure['total_rows'] = $result->num_rows();
			$this->configure['base_url'] = site_url('news/index/');
			if(empty($offset))
			{		
				$data['news'] = $this->Article_model->get_limit_article($this->limit);	
			}else {
				$data['news'] = $this->Article_model->get_limit_article($this->limit, $offset);
			}
			$this->configure['uri_segment'] = '3';
			$this->pagination->initialize($this->configure);
			$data['pagination'] = $this->pagination->create_links();
			$data['description'] = 'Smgc.in,资讯,谍报,报价,评测';
			$data['keywords'] = 'Smgc.in,资讯,谍报,报价,评测';
			$data['title'] = '资讯';
			$data['current_menu'] = 'news';
			$data['category'] = $this->Category_model->get_categories('e_news_category');
			$data['category'] = $data['category']['key'];
			$content = 'news_view';
			$this->load_view($content, $data);
		}
		
		function category($category = '', $offset = '')
		{
			$result = $this->Database_model->get_by_condition('er_news', array('category' => $category));
			$this->configure['total_rows'] = $result->num_rows();
			$this->configure['base_url'] = site_url('news/category/'.$category.'/');
			$this->pagination->initialize($this->configure);
			$data['pagination'] = $this->pagination->create_links();
			if(empty($offset))
			{
				$data['news'] = $this->Article_model->get_limit_article_by_condition(array('category'=>$category), $this->limit);
			}else {
				$data['news'] = $this->Article_model->get_limit_article_by_condition(array('category'=>$category), $this->limit, $offset);
			}
			$data['description'] = 'Smgc.in,资讯,谍报,报价,评测';
			$data['keywords'] = 'Smgc.in,资讯,谍报,报价,评测';
			$data['title'] = '资讯';
			$data['current_menu'] = 'news';
			$data['category'] = $this->Category_model->get_categories('e_news_category');
			$data['category'] = $data['category']['key'];
			$content = 'news_view';
			$this->load_view($content, $data);
		}
    }
?>