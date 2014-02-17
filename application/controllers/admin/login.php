<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{

		$logout=$this->input->get_post('logout');
		if($logout)
		{
			$this->load->model('admin/auth_model','auth');
			if($this->auth->destroy())
			{
				redirect(base_admin_url());
			}
			exit;
		}
		$this->template->set_template('blank');
		/*$this->template->add_css('assets/metisadmin/css/style.css');
		$this->template->add_css('assets/metisadmin/css/bootstrap.min.css');
		$this->template->add_css('assets/metisadmin/css/bootstrap.min.css');
		$this->template->add_css('assets/metisadmin/css/login.css');
		$this->template->add_css('assets/metisadmin/magic/magic.css');
		*/

		$this->template->add_css('assets/aceadmin/css/bootstrap.min.css');
		$this->template->add_css('assets/aceadmin/css/bootstrap.min.css');
		$this->template->add_css('assets/aceadmin/css/ace.min.css');
		$this->template->add_css('assets/aceadmin/css/ace-responsive.min.css');
		$this->template->add_css('assets/aceadmin/css/font-awesome.min.css');

		$this->template->write("title","Backoffice Manager");
		//$this->template->write_view("content","login_metisadmin");
		$this->template->write_view("content","login_aceadmin");
		$this->template->render();
	}
	public function auth()
	{
		$this->load->model('admin/member_model','member_model');
		$this->load->model('admin/auth_model', 'auth_model');
		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
		$remember=$this->input->get_post('remember');
		$user_id=$this->member_model->login_check($username,do_hash($password));

		if (!empty($user_id->num_rows))
		{

			$u_data=$user_id->result(0);
			$this->auth_model->store($u_data[0],$remember);
			//enable log login
			//$this->auth_model->add_login_log(array("username"=>$username));
			redirect(base_admin_url('home'));
		}
		else
		{

			redirect(base_admin_url('?access-denied'));
		}

	}

}

