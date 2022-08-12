<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bioskop extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if ($this->session->userdata('log') != 'login')
        {
            redirect('admin/login','refresh');
        }
    }

	public function index()
	{
		$data = [
		    'data' => $this->global->view('tb_bioskop','','')
		];

		$this->load->view('layout2/header');
		$this->load->view('admin/bioskop/index2', $data);
		$this->load->view('layout2/footer');
	}

	public function create()
	{
		$this->load->view('layout2/header');
		$this->load->view('admin/bioskop/create2');
		$this->load->view('layout2/footer');
	}

	public function update($id)
	{
		$data = [
			'data' => $this->global->view('tb_bioskop','id',$id)
		];

		$this->load->view('layout2/header');
		$this->load->view('admin/bioskop/update2', $data);
		$this->load->view('layout2/footer');
	}

	public function doCreate()
	{
		$arr_bioskop 	= explode(" ", $this->input->post('nama_bioskop'));
		$a_input 		= str_split($this->input->post('nama_bioskop'));
		$singkat 		= "";

		if (count($arr_bioskop) == 1) {
			foreach ($a_input as $i) {
				if (preg_match('/^[AIUEOaiueo]/', $i)){
							
			 	} else {
			  		$singkat 	.= $i;
					$kd_bioskop = substr($singkat, 0,3);
			 	}
			}
		}elseif (count($arr_bioskop) == 2) {
			foreach ($a_input as $i) {
		  		$singkat .= $i;
				$kd_bioskop 	= strtoupper(substr($singkat, 0,1).substr($arr_bioskop[1], 0,2));
			}
		}elseif (count($arr_bioskop) > 2) {
			foreach ($arr_bioskop as $i) {
		  		$singkat .= $i[0];
				$kd_bioskop 	= substr($singkat, 0,3);
			}
		}
		
		$data = [
		    'kd_bioskop' 		=> $kd_bioskop,
		    'nama_bioskop' 		=> $this->input->post('nama_bioskop'),
		    'alamat_bioskop' 	=> $this->input->post('alamat_bioskop'),
		    'kota' 				=> $this->input->post('kota')
		];

		$this->global->save('tb_bioskop',$data,'','');
		redirect('admin/bioskop','refresh');
	}

	public function doUpdate()
	{
		$arr_bioskop 	= explode(" ", $this->input->post('nama_bioskop'));
		$a_input 		= str_split($this->input->post('nama_bioskop'));
		$singkat 		= "";

		if (count($arr_bioskop) == 1) {
			foreach ($a_input as $i) {
				if (preg_match('/^[AIUEOaiueo]/', $i)){
							
			 	} else {
			  		$singkat .= $i;
					$kd_bioskop 	= substr($singkat, 0,3);
			 	}
			}
		}elseif (count($arr_bioskop) == 2) {
			foreach ($a_input as $i) {
		  		$singkat .= $i;
				$kd_bioskop 	= strtoupper(substr($singkat, 0,1).substr($arr_bioskop[1], 0,2));
			}
		}elseif (count($arr_bioskop) > 2) {
			foreach ($arr_bioskop as $i) {
		  		$singkat .= $i[0];
				$kd_bioskop 	= $singkat;
			}
		}
		
		$data = [
		    'kd_bioskop' 		=> $kd_bioskop,
		    'nama_bioskop' 		=> $this->input->post('nama_bioskop'),
		    'alamat_bioskop' 	=> $this->input->post('alamat_bioskop'),
		    'kota' 				=> $this->input->post('kota')
		];

		$this->global->save('tb_bioskop',$data,'id',$this->input->post('id'));
		redirect('admin/bioskop','refresh');
	}


	public function doDelete($id)
	{
		$this->global->delete('tb_bioskop','id',$id);
		redirect('admin/bioskop','refresh');
	}
}

/* End of file Bioskop.php */
/* Location: ./application/controllers/admin/Bioskop.php */