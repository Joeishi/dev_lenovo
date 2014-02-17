<?php
class auth_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function store_member($id,$remember=null)
	{
		$session['loged_in'] = true;
		$session['user_id'] = $id;
		$serialized = serialize($session);


		$this->load->library('encrypt');
		$value = $this->encrypt->encode($serialized);
		$cookie_expire="";
		if(isset($remember) && $remember !=null){
			$cookie_expire=0;	#16 year
		}else{
			$cookie_expire=3600*2;	#(3600min*2hour)
		}
		
		$this->load->helper('cookie');
		$cookie = array(
			'name' => 'member_info',
			'value' => $value,
			'expire' =>$cookie_expire
		);
		set_cookie($cookie);
	}
	
	function get_member()
	{
		$this->load->helper('cookie');
		$cookie = get_cookie('member_info');
		$this->load->library('encrypt');
		$data = $this->encrypt->decode($cookie);

		$session = @unserialize($data);

		return $session;
	}

	function store($id,$remember=null)
	{
		$this->load->model('admin/acl_model','acl');
	
		$generate_menu=$this->acl->generate_menu($id['id']);
		//alert($generate_menu->result_array());
		//exit;
		$gen_menu=array();
		foreach ($generate_menu->result_array() as $key => $value) {
			$gen_menu[$key]['name']=$value['permision_name'];
			$gen_menu[$key]['url']=$value['permision_controller'];
			$gen_menu[$key]['image']=$value['image'];
			$gen_menu[$key]['order']=$value['order'];
		}

		$session['loged_in'] = true;
		$session['user_data'] = $id;
		$session['menu_data'] = json_encode($gen_menu);
		
		$serialized = serialize($session);

		$this->load->library('encrypt');
		$value = $this->encrypt->encode($serialized);
		$cookie_expire="";
		if(isset($remember) && $remember !=null){
			$cookie_expire=0;	#16 year
		}else{
			$cookie_expire=3600*2;	#(3600min*2hour)
		}
		
		$this->load->helper('cookie');
		$cookie = array(
			'name' => 'user_info',
			'value' => $value,
			'expire' =>$cookie_expire
		);
		set_cookie($cookie);

	}

	function get()
	{
		$this->load->helper('cookie');
		$cookie = get_cookie('user_info');
		$this->load->library('encrypt');
		$data = $this->encrypt->decode($cookie);
		$session = @unserialize($data);

		return $session;
	}

	function destroy()
	{
		$this->load->helper('cookie');
		delete_cookie('user_info');
		delete_cookie('member_info');
		return true;
	}
	
	function add_login_log($data)
	{
		if($this->db->insert('login_log', $data))
		{
			return $this->db->insert_id();
		} 
		return false;
	}	

}
?>