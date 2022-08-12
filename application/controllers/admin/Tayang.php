<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tayang extends CI_Controller {

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
		    'data' => $this->global->join('tb_tayang','','')
		];

		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		// exit();

		$this->load->view('layout2/header');
		$this->load->view('admin/tayang/index2', $data);
		$this->load->view('layout2/footer');
	}

	public function create()
	{
		$data = [
		    'bioskop' 	=> $this->global->view('tb_bioskop','',''),
		    'film' 		=> $this->global->view('tb_film','','')
		];

		$this->load->view('layout2/header');
		$this->load->view('admin/tayang/create2', $data);
		$this->load->view('layout2/footer');
	}

	public function update($id)
	{
		$data = [
		    'bioskop' 	=> $this->global->view('tb_bioskop','',''),
		    'film' 		=> $this->global->view('tb_film','',''),
		    'data' 		=> $this->global->joinUpdate($id)
		];

		// echo "<pre>";
		// print_r ($data['data']);
		// echo "</pre>";

		$this->load->view('layout2/header');
		$this->load->view('admin/tayang/update2', $data);
		$this->load->view('layout2/footer');
	}

	public function createCodeAdd()
	{
		$kode_bioskop 	= $this->input->post('kd_bioskop');
		$kode_film 		= $this->input->post('judul_film');
		$tgl 			= $this->input->post('tgl_waktu_tayang');

		$this->db->select('RIGHT(tb_tayang.kd_tayang,5) as kd_tayang', FALSE);
	    $this->db->order_by('kd_tayang','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('tb_tayang');
	        if($query->num_rows() <> 0){      
	             $data = $query->row();
	             $kode = intval($data->kd_tayang) + 1; 
	        }
	        else{      
	             $kode = 1;  
	        }

	    $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
	    

	    $pattern = '/[- :]/';
	    $str_tgl = preg_replace($pattern, '', $tgl);

	    $kodetampil = $kode_bioskop.$str_tgl.$kode_film.$batas;
	    
	    return $kodetampil;
	}


	public function createCodeUpdate()
	{
		$kode_bioskop 	= $this->input->post('kd_bioskop');
		$kode_film 		= $this->input->post('judul_film');
		$tgl 			= $this->input->post('tgl_waktu_tayang');

		$this->db->select('RIGHT(tb_tayang.kd_tayang,5) as kd_tayang', FALSE);
	    $this->db->order_by('kd_tayang','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('tb_tayang');
	        if($query->num_rows() <> 0){      
	             $data = $query->row();
	             $kode = intval($data->kd_tayang); 
	        }
	        else{      
	             // $kode = 1;  
	        }

	    $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
	    

	    $pattern = '/[- :]/';
	    $str_tgl = preg_replace($pattern, '', $tgl);

	    $kodetampil = $kode_bioskop.$str_tgl.$kode_film.$batas;
	    
	    return $kodetampil;
	}

	public function doCreate()
	{
		$kd_tayang 	= $this->createCodeAdd();
		$date 	 	= date_create($this->input->post('tgl_waktu_tayang'));

		$data = [
		    'kd_tayang' 		=> $kd_tayang,
		    'judul_film' 		=> $this->input->post('judul_film'),
		    'kd_bioskop' 		=> $this->input->post('kd_bioskop'),
		    'tgl_waktu_tayang' 	=> date_format($date, "Y/m/d H:i"),
		    'jml_kursi' 		=> $this->input->post('jml_kursi')
		];

		$this->global->save('tb_tayang',$data,'','');
		redirect('admin/tayang','refresh');
	}

	public function doUpdate()
	{
		$kd_tayang 	= $this->createCodeUpdate();
		$date 	 	= date_create($this->input->post('tgl_waktu_tayang'));

		$data = [
		    'kd_tayang' 		=> $kd_tayang,
		    'judul_film' 		=> $this->input->post('judul_film'),
		    'kd_bioskop' 		=> $this->input->post('kd_bioskop'),
		    'tgl_waktu_tayang' 	=> date_format($date, "Y/m/d H:i"),
		    'jml_kursi' 		=> $this->input->post('jml_kursi')
		];

		$this->global->save('tb_tayang',$data,'id',$this->input->post('id'));
		redirect('admin/tayang','refresh');
	}

	public function doDelete($id)
	{
		$this->global->delete('tb_tayang','id',$id);
		redirect('admin/tayang','refresh');
	}

}

/* End of file Tayang.php */
/* Location: ./application/controllers/admin/Tayang.php */