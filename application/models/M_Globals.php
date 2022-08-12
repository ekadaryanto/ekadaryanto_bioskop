<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_globals extends CI_Model {

	public function view($table,$where,$id)
	{
		if ($where != "" && $id != "") {
			$this->db->where($where, $id);
			return $this->db->get($table)->result();
		}else{
			return $this->db->get($table)->result();
		}
	}

	public function save($table,$data,$where,$id)
	{
		if ($where != "" && $id != "") {
			return $this->db->update($table, $data, array($where => $id));
		}else{
			return $this->db->insert($table, $data);
		}
	}

	public function delete($table,$where,$id)
	{
		$this->db->where($where, $id);
		$this->db->delete($table);
	}

	public function login($where, $username, $table){
		$data = array($where => $username);

		$this->db->where($data);
		$query = $this->db->get($table);
		return $query;
	}

	public function get_enum($table, $field)
	{
	    $type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
	    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
	    $enum = explode("','", $matches[1]);
	    return $enum;
	}

	public function join()
	{
		$this->db->select('tb_tayang.*, tb_film.judul_film');
		$this->db->from('tb_tayang');
		$this->db->join('tb_film', 'tb_tayang.judul_film = tb_film.kd_film');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function joinUpdate($id)
	{
		$this->db->select('tb_tayang.*, tb_film.judul_film, tb_film.kd_film');
		$this->db->from('tb_tayang');
		$this->db->join('tb_film', 'tb_tayang.judul_film = tb_film.kd_film');
		$this->db->where('tb_tayang.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

}