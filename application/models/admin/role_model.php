<?php
class role_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}




	function insert($data){
		/*$user_data=user_info();
		$user_data['user_id']=$user_data['user_data']['user_id'];
		$user_data['username']=$user_data['user_data']['username'];
		$data['condo_create']=$user_data['username'];
		$data['condo_create_log']=json_encode($user_data);
		$data['create_at']=date('Y-m-d H:i:s');*/

		$this->db->from('roles');
		$this->db->where('role_name', $data['role_name']);	
		$query=$this->db->get();

		if($query->num_rows==0){
			if($this->db->insert('roles', $data)){
				return $this->db->insert_id();
			}
		}

		return false;
	}

	
	function update($id,$data){
		if($this->db->update('roles', $data, "role_id = {$id}")){
			return true;
		}
		return false;
	}

	function delete($id){
		if($this->db->delete('roles', array("role_id"=>$id)))
		{
			return true;
		}
		return false;
	}

	function fetch_one($id='')
	{
		$where_id=array('role_id'=>$id);
		$query = $this->db->get_where('roles',$where_id );
		return $query->row_array();
	}


	function fetch_all($page=1,$perpage=100,$fillter='')
	{
		
		$this->db->select('*');
		$this->db->from('roles');
		if(isset($fillter['keywords']))
        {
        	$keywords=$fillter['keywords'];
			$str_query='role_name LIKE "%'.$keywords.'%"';
	
			
			$this->db->where('('.$str_query.')', null, false);
        }


		$this->db->order_by('role_id','DESC');
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