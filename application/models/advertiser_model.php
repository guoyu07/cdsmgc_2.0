<?php
    class Advertiser_model extends CI_Model
    {
    	private $table = 'er_advertiser';
		
    	public function __construct()
		{
			parent::__construct();
			$this->load->helper('data_process');
			$this->load->model('Database_model');
		}
		
		public function add()
		{
			$advertiser = array(
				'name' => dpbd($this->input->post('advertiser_name')),
				'business' => dpbd($this->input->post('business')),
				'phone'	=>	dpbd($this->input->post('phone')),
				'address' => $this->input->post('s3'),
			);
			$category = $this->input->post('categories');
			if($this->input->post('qq'))
			{
				$advertiser['qq'] = $this->input->post('qq');
			}
			if($this->input->post('website'))
			{
				$advertiser['website'] = $this->input->post('website');
			}
			if($this->Database_model->insert($this->table, $advertiser))
			{
				$insert_id = $this->db->insert_id();
				foreach ($category as $key => $value) {
					$advertiser_type[] = array (
						'er_advertiser_id'		=>	$insert_id,
						'e_business_type_id'	=>	$value
					);
				}
				return $this->Database_model->insert('e_business_type_has_er_advertiser', $advertiser_type);
			}
		} 
		
		function get_by_condition($param = '')
		{
			if(is_array($param))
			{
				foreach ($param as $key => $value) 
				{
					if(is_array($value))
					{
						$this->db->where_in($key, $value);
					}else {
						$this->db->where($key, $value);
					}
				}
				$result = $this->db->get($this->table);
				return $this->advertiser_process($result);
			}
			return FALSE;
		}      
		
		public function advertiser_process($advertiser)
		{
			foreach($advertiser->result() as $row)
			{
				$address = $this->get_address($row->address);
				$category = $this->get_category($row->id);
				$advertiser_data[] = array(
					'id'		=>	$row->id,
					'name'		=>	$row->name,
					'business'	=>	$row->business,
					'phone'		=>	$row->phone,
					'qq'		=>	$row->qq,
					'website'	=>	$row->website,
					'category'	=>	$category['name'],
					'category_id'	=>	$category['id'],
					'address'	=>	$address['name'],
					'address_id'	=>	$address['id']
				);
			}
			return $advertiser_data;
		}
		
		private function get_category($id)
		{
			$sql = "select * from e_business_type as b , e_business_type_has_er_advertiser as a 
					where a.e_business_type_id=b.id and a.er_advertiser_id=$id";
			$result = $this->db->query($sql);
			if($result->num_rows() > 1)
			{
				foreach ($result->result() as $row)
				{
   					$name['name'][] = $row->name;
					$name['id'][]	=	$row->id;
				}	
				return $name;
			}else {
				$result = $result->row();
				$name['name'] = $result->name;
				$name['id']	=	$result->id;
				return $name;
			}
		}
		 
		private function get_address($address_id)
		{
			$result = $this->db->get_where('e_address', array('id' => $address_id))->row();	
			if($result->level == 3)
			{
				$house_id = $address_id;
				$house = $result->name;
				$result = $this->db->get_where('e_address', array('id' => $result->parent_id))->row();
				if($result->level == 2)
				{
					$floor_id = $result->id;
					$floor = $result->name;
					$result = $this->db->get_where('e_address', array('id' => $result->parent_id))->row();
					{
						if($result->level == 1)
						{
							$build_id = $result->id;
							$build = $result->name;
						}
					}
				}	
			}
			return $address = array (
				'id'	=>	array(
					'house'	=>	$house_id,
					'floor'	=>	$floor_id,
					'build'	=>	$build_id
				),
				'name' =>	"$build--".$floor."楼--$house"
			);
		}
		public function delete($id = '')
		{
			if(!empty($id))
			{
				if($this->Database_model->delete('e_business_type_has_er_advertiser', array('er_advertiser_id'=>$id)))
				{
				//	return TRUE;
					return $this->Database_model->delete_by_id($this->table, $id);
				}
				return FALSE;
			}
			return FALSE;
		}
		public function edit()
		{
			$id = $this->input->post('id');
			$param = array(
				'name'		=>	dpbd($this->input->post('advertiser_name')),
				'business'	=>	dpbd($this->input->post('business')),
				'phone'		=>	dpbd($this->input->post('phone')),
				'qq'		=>	dpbd($this->input->post('qq')),
				'website'	=>	dpbd($this->input->post('website')),
				'address'	=>	$this->input->post('address'),
			);
			$category = $this->input->post('categories');
			for ($i=0; $i < count($category); $i++) 
			{ 
				$params[$i] = array(
					'er_advertiser_id'	=>	$id,
					'e_business_type_id'	=>	$category[$i]
				);	
			}
			if($this->Database_model->update($this->table, $id, $param))
			{
				if($this->Database_model->delete('e_business_type_has_er_advertiser', array('er_advertiser_id'=>$id)))
				{
					return $this->Database_model->insert('e_business_type_has_er_advertiser',$params);
				}
			}
		}
    }
?>