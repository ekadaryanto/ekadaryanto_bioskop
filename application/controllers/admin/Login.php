<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login2');
	}

	public function doLogin()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$log 		= $this->global->login('username', $username, 'tb_admin');

		if ($log->num_rows() == 1) {
			foreach ($log->result() as $value)
			{
				$session_data['id'] 		= $value->kd_admin;
				$session_data['username'] 	= $value->username;
				$session_data['log'] 		= 'login';

				if ($value->username == $username && $value->password == md5(md5($password))){
					$this->session->set_userdata($session_data);
					redirect('admin/dashboard','refresh');
				}else{
					redirect('admin/login','refresh');
				}
			}
		}else{
			redirect('admin/login','refresh');
		}
	}

	public function doLogout()
	{
		$this->session->sess_destroy();
		redirect('admin/login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */