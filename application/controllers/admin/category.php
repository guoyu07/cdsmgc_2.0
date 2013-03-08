<?php
    class Category extends CI_Controller
    {
    	private $table_advertiser = 'e_business_type';
		private $table_article = 'e_news_category';
		
    	function __construct()
		{
			parent::__construct();
			$this->load->model('Category_model');
			session_start();
		}
		
		function advertiser()
		{
			$data['title'] = '商家分类列表';
			$data['category'] = $this->Category_model->get_categories($this->table_advertiser);
			$this->load->view('admin/advertiser_category_view', $data);
		}
	
		function add_advertiser()
		{
			if($this->Category_model->add_category($this->table_advertiser))
			{
				$this->advertiser();
			}else {
				show_error('警告：商家分类添加失败！');
			}
		}
		
		function delete_advertiser($id = '')
		{
			if(!empty($id))
			{
				if($this->Category_model->delete( $id, $this->table_advertiser))
				{
					$this->advertiser();
				}else {
					show_error('警告：商家分类删除失败！');
				}
			}else {
				show_error('警告：未选择要删除的商家分类！');
			}
		}
		
		function article()
		{
			$data['title'] = '资讯分类列表';
			$data['category'] = $this->Category_model->get_categories($this->table_article);
			$this->load->view('admin/article_category_view', $data);
		}
	
		function add_article()
		{
			if($this->Category_model->add_category($this->table_article))
			{
				$this->article();
			}else {
				show_error('警告：资讯分类添加失败！');
			}
		}
		
		function delete_article($id = '')
		{
			if(!empty($id))
			{
				if($this->Category_model->delete($id,$this->table_article))
				{
					$this->article();
				}else {
					show_error('警告：资讯分类删除失败！');
				}
			}else {
				show_error('警告：未选择要删除的资讯分类！');
			}
		}
   }
?>