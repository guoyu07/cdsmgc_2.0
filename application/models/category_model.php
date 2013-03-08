<?php
    class Category_model extends CI_Model
    {
    	public function __construct()
		{
			parent::__construct();
			$this->load->model('Database_model');
			$this->load->helper('Data_process');
		}
		
		public function get_categories($table = '')
		{
			return $this->Database_model->get_all_data($table);
		}
		
		public function add_category($table = '')
		{
			$category = array(
				'name' => dpbd($this->input->post('category'))
			);
			return $this->Database_model->insert($table,$category);
		}
		
		public function delete($id = '', $table = '')
		{
			if(!empty($id))
			{
				return $this->Database_model->delete_by_id($table, $id);
			}else {
				return FALSE;
			}
		}
    }
?>
