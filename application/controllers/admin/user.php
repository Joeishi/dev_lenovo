<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();   
		$this->template->set_template('backoffice');
		$this->load->model('admin/user_model','user');
		include(APPPATH."libraries/class.upload.php");
		checklogin();

	}
	public function index()
	{

		/**
		 * breadcrumbs gen
		 */
	    $this->breadcrumbs->push(ucfirst($this->router->fetch_class()), base_admin_url($this->router->fetch_class()));
	    $this->breadcrumbs->push('Manage', base_admin_url($this->router->fetch_class().'/records'));
	    $this->breadcrumbs->unshift('Home', base_admin_url('home'));
		$this->template->write('breadcrumbs',$this->breadcrumbs->show());

		$this->load->library('digg_paginator');	
		($this->input->get_post("p")) ? $page = $this->input->get_post("p") :  $page = "1";
		($this->input->get_post("perpage")) ? $perpage = $this->input->get_post("perpage") :  $perpage = "10";
		$this->template->add_css('assets/aceadmin/css/paging.css');


		$data=array();
		$data['rs_data']=$this->user->fetch_all($page, $perpage);
		$this->template->write_view('content','user/records',$data);

		$this->template->render();

		//exit;


	}

	public function edit($id='')
	{


		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$this->load->model('admin/acl_model','acl');


			if($_FILES['profile_image']['size']!="0")
			{
				$handle = new upload($_FILES['profile_image']);
				if ($handle->uploaded) {
				$handle->file_new_name_body   = time()."_".rand();
				$handle->image_resize         = false;

				$handle->process('./userfiles/pic_profile/');
				if ($handle->processed) {
				//echo 'image resized';
				$handle->clean();
				} else {
				//echo 'error : ' . $handle->error;
				}
				}
				//alert($handle->file_dst_pathname);exit;
				$data['profile_image']=$handle->file_dst_pathname;
			}
			/*else
			{
				$data['profile_image']="/userfiles/pic_profile/default-avatar.png";
			}*/


			$data['username']=$this->input->get_post('username');
			if($this->input->get_post('password')!="")
			{
				$data['password']=do_hash(trim($this->input->get_post('password')));
				$data['re_password']=(trim($this->input->get_post('password')));
			}

			$data['email']=$this->input->get_post('email');
			$data['role_id']=$this->input->get_post('user_level');

			
			if($last_id=$this->user->update($id,$data)){
				//echo $last_id;
				$array_mod=array();
				$this->acl->delete_uid($id);
				$permission=$this->input->get_post('permission');
				if(isset($permission) && $permission !="")
				{
					foreach ($permission as $key => $value) 
					{
						$array_mod[$key]['user_id']=$id;
						$array_mod[$key]['permision_id']=$value;
						$this->acl->insert($array_mod[$key]);
					}
				}

				$this->session->set_flashdata('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
				redirect(base_admin_url('user?success'));
				
			}
			else
			{
				$this->session->set_flashdata('success_error', 'แก้ไขข้อมูลไม่เรียบร้อย');
				redirect(base_admin_url('user?error'));
			}
			exit;
		}



		/**
		 * breadcrumbs gen
		 */
	    $this->breadcrumbs->push(ucfirst($this->router->fetch_class()), base_admin_url($this->router->fetch_class()));
	    $this->breadcrumbs->push('Manage', base_admin_url($this->router->fetch_class().'/records'));
	    $this->breadcrumbs->unshift('Home', base_admin_url('home'));
		$this->template->write('breadcrumbs',$this->breadcrumbs->show());

		$this->load->library('digg_paginator');	
		($this->input->get_post("p")) ? $page = $this->input->get_post("p") :  $page = "1";
		($this->input->get_post("perpage")) ? $perpage = $this->input->get_post("perpage") :  $perpage = "10";
		$this->template->add_css('assets/aceadmin/css/paging.css');


		$this->load->model('admin/permision_model','permision');
		$this->load->model('admin/role_model','role');
		$this->load->model('admin/user_model','user');
		$this->load->model('admin/acl_model','acl');
		$data=array();
		$member_acl=array();
		$mod_acl=array();

		$mod_data=$this->permision->fetch_all(true,true,array('allrecord'=>true));
		$role_data=$this->role->fetch_all(true,true,array('allrecord'=>true));
		$user_data=$this->user->fetch_one($id);
		$user_acl=$this->acl->fetch_all_uid($id);



		$data['rs_data']=$this->user->fetch_all($page, $perpage);
		$data['mod_data']=$mod_data['items'];
		$data['role_data']=$role_data['items'];
		$data['user_acl']=$user_acl;
		$data['user_data']=$user_data;


		$this->template->write_view('content','user/form',$data);

		$this->template->render();

		//exit;


	}	

}

