<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Common_model extends CI_Model
{
	
	public function log_details($log_id)
	{
	   $this->db->select('a.*');
	   $this->db->from('log as a');
	   $this->db->where('id',$log_id);
	   
	   $query = $this -> db -> get();
	   if($query -> num_rows()==1)
	   {
	   	 return $query->result_array();
		 
		 
	   }
	   else
	   {
		 return false;
	   }
	}

	public function fetch_by_id($table,$id,$select='*')
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($id);
		$query = $this -> db -> get();
		/*var_dump($this->db->last_query());*/
	    if($query -> num_rows())
	    {
	   	  return $query->result_array();
		 
		 
	    }
	    else
	    {
		 return false;
	    }
	}

	public function fetch_contents($table_name,$data)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($data);
		$this->db->where($table_name.'_removed','0');
		$query = $this -> db -> get();
		/*var_dump($this-> db ->last_query());*/
	    if($query -> num_rows())
	    {
	    	//var_dump($query->result_array());
	   	  return $query->result_array();
		 
		 
	    }
	    else
	    {
		 return false;
	    }
	}
	
	public function insert_table($table_name,$data)
	{
		$this->db->insert($table_name,$data);
		return $this->db->affected_rows() > 0;
		
	}
	public function insert_multiple($table_name,$data)
	{
		$this->db->insert_batch($table_name,$data);
		return $this->db->affected_rows() > 0;
		
	}
	
	public function delete_table($table_name,$data)
	{
		$this->db->delete($table_name,$data);
		return $this->db->affected_rows() > 0;
		
	}

	public function update_table($table_name,$data,$id)
	{
		$this->db->where($table_name.'_id',$id);
		$this->db->update($table_name,$data);
		
		if($this->db->error())
		{
			return false;
		}
		return true;
		
	}
	
	public function __update_table($table_name,$data,$wheredata)
	{
		
		$this->db->where($wheredata);
		
		if($this->db->update($table_name,$data))
		{
			return true;
		}
		return false;
		
	}


	public function dublicate_check($table_name,$array)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($array);
		$this->db->where($table_name.'_removed','0');
		
		$query=$this->db->get();
		
		if($query->num_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	public function edit_dublicate_check($table_name,$array,$id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($array);
		$this->db->where($table_name.'_removed','0');
		$this->db->where($table_name.'_id <> ',$id);
		
		$query=$this->db->get();
		
		if($query->num_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}

	public function insert_table_lastid($table_name,$data)
	{
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
		
	}

 
	public function __fetch_contents($table_name,$data=array(),$select='*',$group_by='',$order_by='',$limit='')
	{
		// var_dump($select);
		// die;
		$this->db->select($select);
		$this->db->from($table_name);
		if (!empty($data)) {
			$this->db->where($data);
		}
		$this->db->group_by($group_by);
		if($order_by!='')
		{
			$this->db->order_by($order_by);	
		}
		if($limit!='')
		{
			$this->db->limit($limit);	
		}
		
//		$this->db->where($table_name.'_removed','0');
		$query = $this -> db -> get();
		// var_dump($this->db->last_query());
		// die();
		
	   if($query -> num_rows() > 0)
	   {
	   	$data=$query->result_array();
	   	 return returnResponse(1,"",$data);
	   }
	   else
	   {
		 return returnResponse(0,'Please try again');
	   }
	}
	public function __fetch_contents1($table_name,$data,$select='*',$group_by='',$order_by='',$limit='')
	{
		$this->db->select($select);
		$this->db->from($table_name);
		$this->db->where($data);
		$this->db->group_by($group_by);
		if($order_by!='')
		{
			$this->db->order_by($order_by);	
		}
		if($limit!='')
		{
			$this->db->limit($limit);	
		}
		
//		$this->db->where($table_name.'_removed','0');
		$query = $this -> db -> get();
		// var_dump($this->db->last_query());
		// die();
		//var_dump($this->db->last_query());
	   if($query -> num_rows() > 0)
	   {
	   	$data=$query->result_array();
	   	 return $data;
	   }
	   else
	   {
		 return false;
	   }
	}


	public function __dublicate_check($table_name,$array)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($array);
		/*$this->db->where($table_name.'_removed','0');*/
		
		$query=$this->db->get();
		//var_dump($this->db->last_query());
		/*echo $this->db->last_query();*/
		if($query->num_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}


	public function __edit_dublicate_check($table_name,$array,$column,$id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($array);
		$this->db->where($column." <> ",$id);
		$query=$this->db->get();
		
		if($query->num_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}


	public function permission_check($url)
	{
		$this->db->select('b.permission_id');
		$this->db->from('page as a');
		$this->db->join('permission as b','b.page_id=a.page_id');
		$this->db->where('page_url',$url);
		$this->db->where('b.user_group',$this->session->userdata['user']['user_group']);
		
		$query = $this -> db -> get();
		/*var_dump($this->db->last_query());
		die();*/
	    if($query -> num_rows() >= 1)
	    {
		  return $query->result_array();
	    }
	    else
	    {
		  return FALSE;
	    }
	}
	public function eventLog($type,$details,$id=0,$evData=array(),$evOld=array(),$link='')
	{
		$event = array();
		$logId = $this->session->userdata(user_id);
		$event['evType']=eventType($type);
		$event['evDetails']=$details;
		$event['evTime']=date('Y-m-d H:i:s');
		$event['evLogId']=$logId;
		$event['evData']=json_encode($evData);
		$event['evOld']=json_encode($evOld);
		$event['evLink']=$link;
		$event['evLinkId']=$id;
		$this->db->insert('eventlog',$event);

	}
	
	public function __delete_table($table_name,$data,$where)
	{
		$this->db->delete($table_name,$data);
		$this->db->where($where);
		return $this->db->affected_rows() > 0;
		
	}
	public function search_friend($search_string='',$data=array())
	{
		$session=$this->session->userdata('user');
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('user_create_at');
		if ($search_string!='') {
			$this->db->where('(`user_fname`  LIKE \'%' . $search_string . '%\')', NULL, FALSE);
		}
		if (!empty($data)) {
			
			if(isset($data['user_dob'])&&!empty($data['user_dob'])){
				$this->db->where('user_dob',$data['user_dob']);
			}
			if(isset($data['user_fav_actor'])&&!empty($data['user_fav_actor'])){
				$this->db->where('user_fav_actor',$data['user_fav_actor']);
			}
			if(isset($data['user_fav_color'])&&!empty($data['user_fav_color'])){
				$this->db->where('user_fav_color',$data['user_fav_color']);
			}
			if(isset($data['user_gender'])&&!empty($data['user_gender'])){
				$this->db->where('user_gender',$data['user_gender']);
			}
		}
		$this->db->where('user_id<>',$session['user_id']);
		$query = $this -> db -> get();
		// var_dump($this->db->last_query());
		// die();
		//var_dump($this->db->last_query());
	   if($query -> num_rows() > 0)
	   {
	   	$data=$query->result_array();
	   	 return $data;
	   }
	   else
	   {
		 return false;
	   }
	}
	public function match_data()
	{
		$session=$this->session->userdata('user');
		$this->db->select('*,if(user_country=\''.$session['user_country'].'\',1,0)+if(user_fav_color=\''.$session['user_fav_color'].'\',1,0)+if(user_fav_actor=\''.$session['user_fav_actor'].'\',1,0)+if(user_age=\''.$session['user_age'].'\',1,0) as total');
		$this->db->from('user');
		$this->db->having('total >= ',2);
		$this->db->order_by('total desc');
		
		$this->db->where('user_id<>',$session['user_id']);
		$query = $this -> db -> get();
		// var_dump($this->db->last_query());
		// die();
		//var_dump($this->db->last_query());
	   if($query -> num_rows() > 0)
	   {
	   	$data=$query->result_array();
	   	 return $data;
	   }
	   else
	   {
		 return false;
	   }
	}

	
}