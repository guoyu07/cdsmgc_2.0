<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Article extends CI_Controller
	{
		private $table_category = 'e_news_category';
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Database_model');
			$this->load->model('Category_model');
			$this->load->model('Article_model');
			$this->load->helper('url');
			session_start();
		}
		
		function index()
		{
			$data['category'] = $this->Category_model->get_categories($this->table_category);
			$data['title'] = '资讯列表';
			$data['article'] = $this->Article_model->get_articles();
			$this->load->view('admin/articles_view' , $data);
		}
		
		function add()
		{
			$category = $this->Category_model->get_categories($this->table_category);
			$data['title'] = '添加新资讯';
			$data['category'] = $category['key'];
			$this->load->view('admin/add_article_view',$data);
		}
		
		function add_action()
		{
			if($this->Article_model->add())
			{
				$this->index();
			}else {
				show_error('警告：资讯添加失败！');
			}
		}   
		
		function delete($id = '')
		{
			if(!empty($id))
			{
				if($this->Article_model->delete($id))
				{
					$this->index();
				}else {
					show_error('警告：资讯删除失败！');
				}
			}else {
				show_error('警告：未选择要删除的资讯！');
			}
			
		} 
	}
