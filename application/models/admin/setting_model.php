<?php
class setting_model extends CI_Model {

	public static $cache;

	function __construct()
	{
		parent::__construct();

	}

	function delete_acl_user($id)
	{
		if($this->db->delete('control_acl', array("id"=>$id)))
		{
			return true;
		}
		return false;
	}

	function delete_user($id)
	{
		if($this->db->delete('user', array("id"=>$id)))
		{
			return true;
		}
		return false;
	}

	function delete_control_mod($mod_id)
	{
		if($this->db->delete('control_mod', array("mod_id"=>$mod_id)))
		{
			return true;
		}
		return false;
	}


	function update_control_mod($data,$id)
	{
		if($this->db->update('control_mod', $data, "mod_id = {$id}")){
			return true;
		}
		return false;
	}
	
	function update_user($id,$data)
	{

		if($this->db->update('user', $data, "id = {$id}")){
			return true;
		}
		return false;
	}

	function get_control_acl($member_id)
	{
		$this->db->where("control_acl.id = ",$member_id);
		$query = $this->db->get("control_acl");
		return $query;
		
	}
	function get_control_mod()
	{
		$query = $this->db->get("control_mod");
		return $query;
	}
	function get_control_mod_id($id)
	{
		$this->db->where("control_mod.mod_id = ",$id);
		$query = $this->db->get("control_mod");
		return $query;
	}
	function login_check($username, $password)
	{
		$query = $this->db->get_where('user', array('username' => $username,'password'=>$password,'active'=>'1'));
		if(isset($_GET['debug'])):echo $this->db->last_query();endif;
		return $query;
	}

	function generate_menu($id)
	{
		$this->db->from('control_acl');
		$this->db->join('control_mod','control_acl.mod_id=control_mod.mod_id','left');
		$this->db->where("control_acl.id = ",$id);
		$query = $this->db->get();
		if(isset($_GET['debug'])):echo $this->db->last_query();endif;
		return $query;
	}

	function fetch_user($member_id)
	{
		$this->db->where("user.id = ",$member_id);
		$query = $this->db->get("user");
		return $query;
		
	}
	function get_user($page=1,$perpage=10,$fillter="")
	{
		$this->db->select('*');
		$this->db->from('user');
		if(isset($fillter['keywords']))
		{
			$keywords=$fillter['keywords'];
			$str_query='username LIKE "%'.$keywords.'%"';

			
			$this->db->where('('.$str_query.')', null, false);
		}

		if(isset($fillter['active']))
		{
			$this->db->where('user.active=',(string)$fillter['active']);
		}



		$this->db->order_by('id','DESC');
		/*query string get*/
		$query_count=$this->db->get_compiled_select();



		if(!isset($fillter['allrecord']))
		{
			$start = (($perpage*$page)-$perpage);
			$query_records=$query_count." LIMIT {$start},{$perpage}";
			$query = $this->db->query($query_records);
		}
		else
		{
			$query = $this->db->query($query_count);
		}




		if(isset($_GET['debug'])):echo $this->db->last_query();endif;

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data['items'][] = $row;
			}


			if(!isset($fillter['allrecord']))
			{
				$data['paging']['page']=$page;
				$data['paging']['perpage']=$perpage;
				$data['paging']['total_rows']=$this->db->query($query_count)->num_rows;
				$data['paging']['total_page']=ceil($data['paging']['total_rows']/$perpage);

			}

			return $data;

		}

		return false;
	}

	function add_user($data)
	{
		if($this->db->insert('user', $data))
		{
			return $this->db->insert_id();
		} 
		return false;
	}

	function insert_control_acl($data)
	{

		if($this->db->insert('control_acl', $data))
		{
			return $this->db->insert_id();
		} 
		return false;
		
	}

	function insert_control_mod($data)
	{

		if($this->db->insert('control_mod', $data))
		{
			return $this->db->insert_id();
		} 
		return false;
		
	}

	function user_exits($username)
	{
		$query = $this->db->get_where('user', array("username" => $username));
		return $query;
	}
}
?>