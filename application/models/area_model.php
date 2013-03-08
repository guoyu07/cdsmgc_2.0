<?php
    class Area_model extends CI_Model
    {
    	private $table = 'e_address';
		
    	public function __construct()
		{
			parent::__construct();
			$this->load->model('Database_model');
			$this->load->helper('data_process');
		}
		
		public function get_areas()
		{
			return $this->Database_model->get_all_data($this->table);
		} 
		public function get_by_condition($param)
		{
			if(is_array($param))
			{
				return $this->Database_model->get_by_condition($this->table, $param);
			}
			return FALSE;
		}
		
		public function add()
		{
			$param = array(
				'name' => dpbd($this->input->post('category')),
				'parent_id' => $this->input->post('parent_id'),
				'level'  => $this->input->post('level')
			);
			return $this->Database_model->insert($this->table,$param);
		}
		
		public function delete($id)
		{
			if(empty($id))
			{
				return FALSE;
			}else {
				return $this->Database_model->delete_by_id($this->table, $id);
			}
		}
		public function rename()
		{
			$id = $this->input->post('id');
			$param = array(
				'name' => dpbd($this->input->post('name'))
			);
			return $this->Database_model->update($this->table, $id, $param);
		}
    }
?>