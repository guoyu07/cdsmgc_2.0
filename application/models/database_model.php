<?php
class Database_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function get_all_data($table='')
	{
		if(empty($table))
		{
			return FALSE;
		}else {
		 	$result=$this->db->get($table);
			$data['key']=$result;
			$data['count']=$result->num_rows();
			return $data;		
		}		
	}
	
	function get_by_condition($table='',$param = '')
	{
		if (!empty($table) && !empty($param)) {
			foreach ($param as $key => $value) {
				if(is_array($value))
				{
					$this->db->where_in( $key, $value );
				} else {
					$this->db->where($key,$value);
				}
			}
			return $this->db->get($table);
		}else {
			return FALSE;
		}
	}
	
	function get_limit_data($table='',$limit='',$offset='')
	{
		if(empty($table))
		{
			return FALSE;
		}else {
			//偏移量和最大数都为空
			if(empty($limit) && empty($offset))
			{
				return $this->get_all_data($table);
				//偏移量为空，最大数不为空
			}else if (!empty($limit)) {
				if(empty($offset))
				{
					return $this->db->get($table,$limit);
				}else {
					return $this->db->get($table,$limit,$offset);
				}
			}
			else {
				return FALSE;
			}
		}
	}
	
	function delete_by_id($table='',$id='')
	{
		if(!empty($table) && !empty($id))
		{
			return $this->db->where('id',$id)->delete($table);
		}else {
			return FALSE;
		}
	}
	
	function insert($table='',$data='')
	{
		if(!empty($table) && is_array($data))
		{
			foreach ($data as $key => $value) 
			{
				if(is_array($value))
				{
					$this->db->insert($table, $value); 
				}else {
					return $this->db->insert($table,$data);
				}
			}
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function update($table='',$id = '', $param = '')
	{
		if(!empty($table) && is_array($param) && !empty($id))
		{
			return $this->db->where('id',$id)->update($table,$param);
		}else {
			return FALSE;
		}
	}
	
	function delete($table = '', $param = '')
	{
		if(!empty($table) && !empty($param))
		{
			if(is_array($param))
			{
				foreach ($param as $key => $value) 
				{
					$this->db->where($key, $value);	
				}
			}
			return $this->db->delete($table);
		}else {
			return FALSE;
		}
	}
}