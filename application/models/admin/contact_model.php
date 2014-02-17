<?php
class contact_model extends CI_Model {

	public static $cache;
	function __construct()
	{
		parent::__construct();
		header("content-type: text/html; charset=utf-8");
	}

	function get_contacts($page=1,$perpage=100,$fillter='')
	{

		$this->db->select('*');
		$this->db->from('contacts');
		if(isset($fillter['keywords']))
        {
        	$keywords=$fillter['keywords'];
			$str_query='contact_name LIKE "%'.$keywords.'%"';
			$str_query.='OR contact_email LIKE "%'.$keywords.'%"';
			$str_query.='OR contact_phone LIKE "%'.$keywords.'%"';
	
			
			$this->db->where('('.$str_query.')', null, false);
        }

		if(isset($fillter['active']))
		{
			$this->db->where("contacts.active='{$fillter['active']}'",null,false);
		}

		if(isset($fillter['dateorder']))
		{
			$this->db->order_by('create_at','DESC');
		}else{
			$this->db->order_by('contact_id','DESC');
		}

		
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

	function insert_contacts($data){

		if($this->db->insert('contacts', $data)){
			return $this->db->insert_id();
		}
		return false;
	}

	function update_contacts($data,$id)
	{
		if($this->db->update('contacts', $data, "contact_id = {$id}")){
			return true;
		}
		return false;
	}

	function delete_contacts($id)
	{
		if($this->db->delete('contacts', array("contact_id"=>$id)))
		{
			return true;
		}
		return false;
	}

	function get_contacts_by_id($contact_id)
	{
		$data=array('contacts.contact_id'=>$contact_id);
		$query = $this->db->get_where('contacts',$data );
		return $query->row_array();
	}

}