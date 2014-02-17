<?php
class Member_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}



	/**
	 * [delete description]
	 * @param  [type] $member_id [description]
	 * @return [type]            [description]
	 */
	function delete($member_id){
		if($this->db->delete('user', array("user_id"=>$member_id)))
		{
			return true;
		}
		return false;
	}

	/**
	 * [fetch description]
	 * @param  [type] $member_id [description]
	 * @return [type]            [description]
	 */
	function fetch($member_id)
	{
		$this->db->where("user.user_id = ",$member_id);
		$query = $this->db->get("user");
		return $query;
		
	}

	/**
	 * [insert_email_subscribe description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	function insert_email_subscribe($data)
	{

		if($this->db->insert('email_subscribe', $data))
		{
			return $this->db->insert_id();
		} 
		return false;
		
	}

	/**
	 * [update_user description]
	 * @param  [type] $id   [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	function update_user($id,$data)
	{

		if($this->db->update('user', $data, "user_id = {$id}")){
			return true;
		}
		return false;
	}

	/**
	 * checklogin username & password
	 * @param  string $username username
	 * @param  string $password passowrd
	 * @return object           return active record
	 */
	function login_check($username, $password)
	{
		$query = $this->db->get_where('user', array('username' => $username,'password'=>$password,'active'=>'1'));
		if(isset($_GET['debug'])):echo $this->db->last_query();endif;
		return $query;
	}

	/**
	 * get all user in system
	 * @return array member data
	 */
	function get_user($page=1,$perpage=10,$fillter="")
	{
		$start = (($perpage*$page)-$perpage);
		$this->db->limit($perpage, $start);

		if(isset($fillter['keywords']))
		{
			$keywords=$fillter['keywords'];
			$str_query='username LIKE "%'.$keywords.'%" OR name LIKE "%'.$keywords.'%" OR email LIKE "%'.$keywords.'%" ';
			
			$this->db->where('('.$str_query.')', null, false);
		}

		if(isset($fillter['level']))
		{
			$this->db->where('level',$fillter['level']);
		}else
		{
			$this->db->where('level !=',"Administrator");		
		}

		$this->db->where('level !=',"Support");
		if(isset($fillter['active'])){
			$this->db->where('active',$fillter['active']);
		}
		$this->db->order_by("user_id DESC");
        $query = $this->db->get("user");
 		if(isset($_GET['debug'])):echo $this->db->last_query();endif;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data['items'][] = $row;
            }
            $data['paging']['page']=$page;
            $data['paging']['perpage']=$perpage;
            $data['paging']['total_rows']= $this->db->count_all_results();
            $data['paging']['total_page']=ceil($data['paging']['total_rows']/$perpage);
            return $data;
        }
       
        return false;
	}
	/**
	 * [add_user description]
	 * @param [type] $data [description]
	 */
	function add_user($data)
	{
		if($this->db->insert('user', $data))
		{
			return $this->db->insert_id();
		} 
		return false;
	}
	/**
	 * [user_exits description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	function user_exits($username)
	{
		
		$query = $this->db->get_where('user', array("username" => $username));
		return $query;
	}
	/**
	 * 
	 */

	function get_member($page=1,$perpage=10,$fillter="")
	{
		$this->db->select('*');
		$this->db->from('members');
		if(isset($fillter['keywords']))
        {
        	$keywords=$fillter['keywords'];
			$str_query='username LIKE "%'.$keywords.'%"';
			/*$str_query.='OR post_title_2 LIKE "%'.$keywords.'%" OR post_description_2 LIKE "%'.$keywords.'%"  ';
			$str_query.='OR post_title_3 LIKE "%'.$keywords.'%" OR post_description_3 LIKE "%'.$keywords.'%"  ';
			$str_query.='OR post_title_4 LIKE "%'.$keywords.'%" OR post_description_4 LIKE "%'.$keywords.'%"  ';
			$str_query.='OR post_title_5 LIKE "%'.$keywords.'%" OR post_description_5 LIKE "%'.$keywords.'%"  ';*/
			
			$this->db->where('('.$str_query.')', null, false);
        }

		if(isset($fillter['active']))
		{
			$this->db->where('members.active=',(string)$fillter['active']);
		}
		else
		{

			$this->db->where('members.active','0');
		}	
		$this->db->order_by('member_id','DESC');
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
	/**
	 * 
	 */

	function add_member($data)
	{
		if($this->db->insert('members', $data))
		{
			return $this->db->insert_id();
		} 
		return false;
	}
	/**
	 * [member_exits description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	function member_exits($username)
	{
		
		$query = $this->db->get_where('members', array("username" => $username));
		return $query;
	}



}
?>