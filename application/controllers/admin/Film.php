<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends CI_Controller {

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
		    'data' => $this->global->view('tb_film','','')
		];

		$this->load->view('layout2/header');
		$this->load->view('admin/film/index',$data);
		$this->load->view('layout2/footer');
	}

	public function create()
	{
		$this->load->view('layout2/header');
		$this->load->view('admin/film/create');
		$this->load->view('layout2/footer');
	}

	public function update($id)
	{
		$data = [
			'data' => $this->global->view('tb_film','id',$id)
		];

		$this->load->view('layout2/header');
		$this->load->view('admin/film/update', $data);
		$this->load->view('layout2/footer');
	}

	public function createCodeAdd(){

	    $this->db->select('RIGHT(tb_film.kd_film, 3) as kd_film', FALSE);
	    $this->db->order_by('kd_film','DESC');    
	    $this->db->limit(1); 
	    $query = $this->db->get('tb_film');
	        if($query->num_rows() <> 0) {      
	            $data = $query->row();
	            $kode = intval($data->kd_film) + 1; 
	        } else {      
	            $kode = 1;  
	        }

	    $batas 		= str_pad($kode, 3, "0", STR_PAD_LEFT);    
	    
	    $input 		= $this->input->post('judul_film');
	    $kodetampil = explode(' ',$input);
	    
	    $singkat 	= "";

	    if (count($kodetampil) == 2) {
	    	for ($i = 0; $i < count($kodetampil); $i++) {
			    $singkat .= substr($kodetampil[$i], 0,1);
		    }
		    $kode_film = $singkat.$batas;
		    return $kode_film;
	    }elseif (count($kodetampil) == 1) {
	    	$arr_input  = str_split($input);
			foreach ($arr_input as $row) {
				if (preg_match('/^[AIUEOaiueo]/', $row)){
			   		
			 	} else {
			  		$singkat .= strtoupper(substr($row, 0,2));
			 	}
			}
			$kode_film = $singkat.$batas;
			return $kode_film;
	    }elseif (count($kodetampil) > 2) {
	    	$array_awal 	= str_split(reset($kodetampil)); 
			$array_akhir	= str_split(end($kodetampil));

			$kons_awal = "";
			foreach ($array_awal as $row) {
				if(preg_match('/^[AIUEOaiueo]/', $row[0])){
			   		
			 	} else {
			  		$kons_awal 	.= $row[0];
			  		$rslt_awal	= strtoupper(substr($kons_awal,0,1));
			 	}
			}

			$kons_akhir = "";
			foreach ($array_akhir as $row) {
				if(preg_match('/^[AIUEOaiueo]/', $row[0])){
			   		
			 	} else {
			  		$kons_akhir .= $row[0];
			  		$rslt_akhir	= strtoupper(substr($kons_akhir,0,1));
			 	}
			}
			$kode_film = $rslt_awal.$rslt_akhir.$batas;
			return $kode_film;
	    }
	    // elseif ($arr_input) {
	    	
	    // }

	}

	public function createCodeUpdate(){

	    $this->db->select('RIGHT(tb_film.kd_film, 3) as kd_film', FALSE);
	    $this->db->order_by('kd_film','DESC');    
	    $this->db->limit(1); 
	    $query = $this->db->get('tb_film');
	        if($query->num_rows() <> 0) {      
	            $data = $query->row();
	            $kode = intval($data->kd_film); 
	        } else {      
	            // $kode = 1;  
	        }

	    $batas 		= str_pad($kode, 3, "0", STR_PAD_LEFT);    
	    
	    $input 		= $this->input->post('judul_film');
	    $kodetampil = explode(' ',$input);
	    $singkat 	= "";
	    $arr_input = str_split($input);

	    if (count($kodetampil) == 2) {
	    	for ($i = 0; $i < count($kodetampil); $i++) {
			    $singkat .= substr($kodetampil[$i], 0,1);
		    }
		    $kode_film = $singkat.$batas;
		    // return $kode_film;
	    }elseif (count($kodetampil) == 1) {
			foreach ($arr_input as $row) {
				if (preg_match('/^[AIUEOaiueo]/', $row[0])){
			   		
			 	} else {
			  		$singkat .= strtoupper(substr($row[0], 0,2));
			 	}
			}
			$kode_film = $singkat.$batas;
			// return $kode_film;
	    }elseif (count($kodetampil) > 2) {
	    	$array_awal 	= str_split(reset($kodetampil)); 
			$array_akhir	= str_split(end($kodetampil));

			$kons_awal = "";
			foreach ($array_awal as $row) {
				if(preg_match('/^[AIUEOaiueo]/', $row[0])){
			   		
			 	} else {
			  		$kons_awal 	.= $row[0];
			  		$rslt_awal	= strtoupper(substr($kons_awal,0,1));
			 	}
			}

			$kons_akhir = "";
			foreach ($array_akhir as $row) {
				if(preg_match('/^[AIUEOaiueo]/', $row[0])){
			   		
			 	} else {
			  		$kons_akhir .= $row[0];
			  		$rslt_akhir	= strtoupper(substr($kons_akhir,0,1));
			 	}
			}
			$kode_film = $rslt_awal.$rslt_akhir.$batas;
			// return $kode_film;
	    }

	}

	public function doCreate()
	{
		$kd_film = $this->createCodeAdd();

		// print_r($kd_film); exit();

		$date 	 = date_create($this->input->post('tgl_launch'));
		$data = [
		    'kd_film' 		=> $kd_film,
		    'judul_film' 	=> $this->input->post('judul_film'),
		    'tgl_launch' 	=> date_format($date, "Y/m/d"),
		    'synopsis' 		=> $this->input->post('synopsis')
		];

		$this->global->save('tb_film',$data,'','');
		redirect('admin/film','refresh');
	}

	public function doUpdate()
	{
		$kd_film = $this->createCodeUpdate();
		$date 	 = date_create($this->input->post('tgl_launch'));

		$data = [
		    'kd_film' 		=> $kd_film,
		    'judul_film' 	=> $this->input->post('judul_film'),
		    'tgl_launch' 	=> date_format($date, "Y/m/d"),
		    'synopsis' 		=> $this->input->post('synopsis')
		];

		// print_r($data); exit();

		$this->global->save('tb_film',$data,'id',$this->input->post('id'));
		redirect('admin/film','refresh');
	}

	public function doDelete($id)
	{
		$this->global->delete('tb_film','id',$id);
		redirect('admin/film','refresh');
	}


}

/* End of file Film.php */
/* Location: ./application/controllers/admin/Film.php */