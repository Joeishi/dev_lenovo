<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permision extends CI_Controller {

	function __construct()
	{
		parent::__construct();   
		$this->template->set_template('backoffice');
		$this->load->model('admin/permision_model','permision');
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

		$list_permission=getController(APPPATH.'controllers/admin');

		foreach ($list_permission as $key => $value) {
			$this->permision->insert(array('permision_name'=>$value,'permision_controller'=>$value));
		}

		$data=array();
		$data['rs_data']=$this->permision->fetch_all($page, $perpage);
		$this->template->write_view('content','permision/records',$data);

		$this->template->render();

		//exit;


	}


	public function edit($id='')
	{
		$data=array();
		$this->load->model('permision_model','permision');	

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$data['permision_name']=$this->input->get_post('mod_name');
			$data['image']=$this->input->get_post('mod_image');
			if($this->input->get_post('show_on')=="y"){
				$data['active']='1';
			}else{
				$data['active']='0';
			}
			

			if($this->permision->update($id,$data))
			{
				$this->session->set_flashdata('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
				redirect(base_admin_url('permision?success'));
			}
			else
			{
				$this->session->set_flashdata('success_error', 'แก้ไขข้อมูลไม่เรียบร้อย');
				redirect(base_admin_url('permision?error'));
			}
			exit;
		}



		$this->template->add_js('assets/aceadmin/js/bootbox.min.js');
		$this->template->add_js('assets/aceadmin/js/chosen.jquery.min.js');
		$this->template->add_css('assets/aceadmin/css/chosen.css');
		$get_control_mod=$this->permision->fetch_one($id);
		$this->template->add_js('assets/aceadmin/js/select2/select2.min.js');
		$this->template->add_css('assets/aceadmin/js/select2/select2.css');


		//breadcrumbs
	    $this->breadcrumbs->push(ucfirst($this->router->fetch_class()), base_admin_url($this->router->fetch_class()));
	    $this->breadcrumbs->push('Manage', base_admin_url($this->router->fetch_class().'/records'));
	    $this->breadcrumbs->unshift('Home', base_admin_url('home'));
		$this->template->write('breadcrumbs',$this->breadcrumbs->show());

		$data['items']=$get_control_mod;
		$data['font_data']=fontawesome();

		$this->template->write_view('content','permision/form',$data);
		return $this->template->render();
	}


}

