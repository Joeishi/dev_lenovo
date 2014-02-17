<?php
class acl_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}



	/**
	 * Generate menu by user_id
	 * @param  int $user_id user_id
	 * @return object          return active record
	 */
	function generate_menu($user_id)
	{
		//$query = $this->db->get_where('control_acl', array('username' => $username,'password'=>$password,'active'=>'1'));
		$this->db->from('access_control_list');
		$this->db->join('permisions','access_control_list.permision_id=permisions.permision_id','left');
		$this->db->where("access_control_list.user_id = ",$user_id);
		$this->db->where("permisions.active = '1'");
		$query = $this->db->get();
		if(isset($_GET['debug'])):echo $this->db->last_query();endif;
		return $query;
	}

	function insert($data){

		if($this->db->insert('access_control_list', $data)){
			return $this->db->insert_id();
		}

		return false;
	}

	
	function update($id,$data){
		if($this->db->update('access_control_list', $data, "acl_id = {$id}")){
			return true;
		}
		return false;
	}

	function delete($id){
		if($this->db->delete('access_control_list', array("acl_id"=>$id)))
		{
			return true;
		}
		return false;
	}

	function fetch_one($id='')
	{
		$where_id=array('acl_id'=>$id);
		$query = $this->db->get_where('access_control_list',$where_id );
		return $query->row_array();
	}

	function fetch_all_uid($id='')
	{
		$response=array();
		$where_id=array('user_id'=>$id);
		$query = $this->db->get_where('access_control_list',$where_id );
		foreach ($query->result_array() as $key => $value) {
			$response[]=$value['permision_id'];
		}
		return $response;
	}

	function delete_uid($id){
		if($this->db->delete('access_control_list', array("user_id"=>$id)))
		{
			return true;
		}
		return false;
	}

	function fetch_all($page=1,$perpage=100,$fillter='')
	{
		
		$this->db->select('*');
		$this->db->from('access_control_list');
		if(isset($fillter['keywords']))
        {
        	$keywords=$fillter['keywords'];
			$str_query='role_name LIKE "%'.$keywords.'%"';
	
			
			$this->db->where('('.$str_query.')', null, false);
        }


		$this->db->order_by('acl_id','DESC');
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



}
?>