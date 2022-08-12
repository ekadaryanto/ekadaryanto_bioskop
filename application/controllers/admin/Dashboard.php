<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if ($this->session->userdata('log') != 'login')
        {
            redirect('admin/login','refresh');
        }
    }

	public function index()
	{
		$this->load->view('layout2/header');
		$this->load->view('admin/index2');
		$this->load->view('layout2/footer');	
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */