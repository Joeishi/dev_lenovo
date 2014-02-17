<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();   
		$this->template->set_template('backoffice');
		checklogin();

	}
	public function index()
	{
		$this->load->library('OnlineUsers');
	    $this->breadcrumbs->push('Dashboard', base_admin_url('home'));
	    $this->breadcrumbs->unshift('Home', base_admin_url('home'));
		$this->template->write('breadcrumbs',$this->breadcrumbs->show());



		$data['onlineusers']=$this->onlineusers->get_info();

		$dir=getController(APPPATH.'controllers/admin');
		//alert($dir);

		//exit;

		$user_info=user_info();

		//alert($user_info);
		switch ($user_info['user_data']['role_id']) {
			case 'Administrator':
				$this->template->write_view("content","home/index_admin");
				break;
			case 'Mod':
				$this->template->write_view("content","home/index_mod");
				break;
			case 'Support':
				$this->template->write_view("content","home/index_support");
				break;
			case 'Editor':
				$this->template->write_view("content","home/index_editor");
				break;
			default:
				$this->template->write_view("content","home/index");
				break;
		}
		
		$this->template->render();
	}
}

