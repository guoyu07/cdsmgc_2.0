<?php
    class Article_model extends CI_Model
    {
    	private $table = 'er_news';
		
    	public function __construct()
		{
			parent::__construct();
			$this->load->model('Database_model');
			$this->load->helper('data_process');
		}
		
		public function get_articles()
		{
			$sql = "select a.id,a.title,a.content,a.date,a.statue,b.name as category from er_news as a join e_news_category as b on a.category=b.id order by id DESC";
			return $this->db->query($sql);
		}
		public function get_limit_article($limit = '', $offset = '')
		{
			$i = 0;
			$result = $this->Database_model->get_limit_data($this->table, $limit, $offset);
			if($result->num_rows() > 0)
			{
				foreach ($result->result() as $row) {
					$article[$i] = array(
						'id' 		=> $row->id,
						'title'		=>	$row->title,
						'content'	=>	$row->content,
						'date'		=>	date('Y-m-d h:i', $row->date),
					);
					$category = $this->db->get_where('e_news_category', array('id'=>$row->category))->row_array();
					$article[$i]['category'] = $category['name'];
					$i++;
				}
				return $article;
			}else {
				return $article = array();
			}
			
		}
		
		public function get_limit_article_by_condition($param = '', $limit = '', $offset= '')
		{
			$article = array();
			if(empty($param) || empty($limit))
			{
				return FALSE;
			}else {
				if(is_array($param))
				{
					foreach ($param as $key => $value) {
						$this->db->where($key, $value);
					}
					if(empty($offset))
					{
						$this->db->limit($limit);
					}else {
						$this->db->limit($limit, $offset);
					}
					$this->db->order_by('id', 'desc');
					$result = $this->db->get($this->table);
					$i = 0;
					foreach ($result->result() as $row) {
						$article[$i] = array(
							'id' 		=> $row->id,
							'title'		=>	$row->title,
							'content'	=>	$row->content,
							'date'		=>	date('Y-m-d h:i', $row->date),
						);
						$category = $this->db->get_where('e_news_category', array('id'=>$row->category))->row_array();
						$article[$i]['category'] = $category['name'];
						$i++;
					}
					return $article;
				}
			}
		}
		
		public function add()
		{
			$param = array(
				'title'		=>	dpbd($this->input->post('title')),
				'content'	=>	dpbd($this->input->post('content')),
				'statue'	=>	$this->input->post('statue'),
				'category'	=>	$this->input->post('category'),
				'date'		=>	mktime()    //unix时间戳，用的时候用函数date('Y-m-d h:i',mktime());取值
			);
			return $this->Database_model->insert($this->table, $param);
		}
		public function delete($id = '')
		{
			if(!empty($id))
			{
				return $this->Database_model->delete_by_id($this->table, $id);
			}else {
				return FALSE;
			}
		}
		
		public function get_by_condition($param = '', $limit = '', $offset = '')
		{
			
		}
    }
?>