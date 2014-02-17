<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();   
		$this->template->set_template('backoffice');
		checklogin();

	}
	public function index()
	{
		$data=array();
		
		$this->template->add_js('assets/aceadmin/js/dropzone.min.js');
		$this->template->write_view('content','gallery/dropzone',$data);
		


		return $this->template->render();	

	}

	public function records()
	{

		$this->template->add_js('assets/aceadmin/js/bootbox.min.js');
		$this->load->model('page_model','pages');
		$this->load->library('digg_paginator');	
		($this->input->get_post("p")) ? $page = $this->input->get_post("p") :  $page = "1";
		($this->input->get_post("perpage")) ? $perpage = $this->input->get_post("perpage") :  $perpage = "15";
		$this->template->add_css('assets/aceadmin/css/paging.css');

		$filters=array();
		$keywords=$this->input->get_post("keywords");
		$condo_nearest_type=$this->input->get_post("type");
		if($keywords!=""){
			$filters['keywords']=$keywords;
			//$perpage=100;//default serch show 100 rows
		}


		

		$data=array();
		//breadcrumbs
		$this->breadcrumbs->push('เว็บเพจ', base_admin_url('pages'));
	    $this->breadcrumbs->push('จัดการข้อมูล', base_admin_url('pages'));
	    $this->breadcrumbs->unshift('หน้าหลัก', base_admin_url('home'));
		$this->template->write('breadcrumbs',$this->breadcrumbs->show());	


		$condo_data=$this->pages->get_pages($page,$perpage,$filters);

		$this->digg_paginator->className="blue_pagination";
		$this->digg_paginator->parameterName("p");
		$this->digg_paginator->items($condo_data['paging']['total_rows']);
		$this->digg_paginator->limit($perpage);
		$this->digg_paginator->currentPage($page);
		$this->digg_paginator->target("auto");
		$this->digg_paginator->nextIcon('>');//removing next icon
		$this->digg_paginator->prevIcon('<');//removing previous icon



		$data['items']=$condo_data['items'];
		$data['pagination'] = $this->digg_paginator->render();
		//alert($data);
		$this->template->write_view('content','pages/records',$data);
		
		return $this->template->render();			
	}

	public function create()
	{
		$data=array();
		$this->load->model('page_model','page');
		$this->template->add_js('assets/aceadmin/js/bootbox.min.js');
		$this->template->add_js('assets/aceadmin/js/select2/select2.min.js');
		$this->template->add_css('assets/aceadmin/js/select2/select2.css');
		$this->template->add_js('assets/aceadmin/js/ckeditor/ckeditor.js');
		$this->template->add_js('assets/aceadmin/js/taginput/jquery.tagsinput.js');
		$this->template->add_css('assets/aceadmin/js/taginput/jquery.tagsinput.css');
		
		//breadcrumbs
		$this->breadcrumbs->push('เว็บเพจ', base_admin_url('pages'));
	    $this->breadcrumbs->push('จัดการข้อมูล', base_admin_url('pages'));
	    $this->breadcrumbs->unshift('หน้าหลัก', base_admin_url('home'));
		$this->template->write('breadcrumbs',$this->breadcrumbs->show());	


		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{


			

			$slug_checker= create_unique_slug($this->input->get_post('page_banner_slug'),"pages",'page_banner_slug');
			$data['page_name']=$this->input->get_post('page_name');
			$data['page_banner_slug']=$this->input->get_post('page_banner_slug');
			$data['create_at']=date("Y-m-d H:i:s");



			if($condo_id=$this->page->insert_pages($data)){
				$this->session->set_flashdata('success_msg', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
				redirect(base_admin_url('pages/records?success'));

			}else{
				$this->session->set_flashdata('success_error', 'เพิ่มข้อมูลไม่สำเร็จ');
				redirect(base_admin_url('pages/records?error'));
			}


			exit;
		}





		$this->template->write_view('content','pages/form_pages',$data);
		


		return $this->template->render();	

	}

	public function edit($id)
	{
		header("content-type: text/html; charset=utf-8");
		$data=array();
		$this->load->model('page_model','page');
		$this->template->add_js('assets/aceadmin/js/bootbox.min.js');
		$this->template->add_js('assets/aceadmin/js/select2/select2.min.js');
		$this->template->add_css('assets/aceadmin/js/select2/select2.css');
		$this->template->add_js('assets/aceadmin/js/ckeditor/ckeditor.js');
		$this->template->add_js('assets/aceadmin/js/taginput/jquery.tagsinput.js');
		$this->template->add_css('assets/aceadmin/js/taginput/jquery.tagsinput.css');
		
		//breadcrumbs
		$this->breadcrumbs->push('เว็บเพจ', base_admin_url('pages'));
	    $this->breadcrumbs->push('จัดการข้อมูล', base_admin_url('pages'));
	    $this->breadcrumbs->unshift('หน้าหลัก', base_admin_url('home'));
		$this->template->write('breadcrumbs',$this->breadcrumbs->show());	
		


		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{

		


		
			$slug_checker= create_unique_slug($this->input->get_post('page_banner_slug'),"pages",'page_banner_slug');
			$data['page_name']=$this->input->get_post('page_name');
			$data['page_banner_slug']=$this->input->get_post('page_banner_slug');
			$data['create_at']=date("Y-m-d H:i:s");



			if($condo_id=$this->page->update_pages($data,$id)){
				$this->session->set_flashdata('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
				redirect(base_admin_url('pages/records?success'));

			}else{
				$this->session->set_flashdata('success_error', 'เแก้ไขข้อมูลไม่สำเร็จ');
				redirect(base_admin_url('pages/records?error'));
			}




			exit;
		}



		$page_data=$this->page->get_pages_by_id($id);
		$data['items']=$page_data;
		$this->template->write_view('content','pages/form_pages',$data);
		


		return $this->template->render();	

	}

	public function hide($id)
	{
		$this->load->model('page_model','page');
		$page_id=$id;
		$page_data=$this->db->get_where('pages',array('page_id'=>$page_id))->row_array();

		switch ($page_data['active']) {
			case '0':
				$data['active']='1';
				break;
			case '1':
				$data['active']='0';
				break;
			default:
				$data['active']='0';
				break;
		}

		if($tmp_page_id=$this->page->update_pages($data,$page_id)){
			$this->session->set_flashdata('success_msg', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
			redirect(base_admin_url('pages/records?success'));
		}else{
			$this->session->set_flashdata('success_error', 'แก้ไขข้อมูลไม่สำเร็จ');
			redirect(base_admin_url('pages/records?error'));
		}
	}

	function delete($page_id){
		$id=(int)$page_id;
		$this->load->model('page_model','page');


		if($this->page->delete_pages($id))
		{
			$this->session->set_flashdata('success_msg', 'ลบข้อมูลเรียบร้อยแล้ว');
			redirect(base_admin_url("pages/records?delete_success"));
		}else
		{
			$this->session->set_flashdata('success_error', 'ลบข้อมูลไม่สำเร็จ');
			redirect(base_admin_url("pages/records?delete_error"));
		}


	}

}

