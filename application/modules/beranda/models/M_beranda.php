<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model {

	function getGudep($id_kwaran)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->where('tb_pangkalan.kwaran', $id_kwaran);
		return $this->db->get('tb_gudep');
	}	

	function getAnggotaGudep($id_pangkalan)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		return $this->db->get('tb_anggota');
	}

	function potensi_muda($id_pangkalan,$param)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->where('tb_anggota.golongan', $param);
		return $this->db->get('tb_anggota');
	}

	function potensi_dewasa($id_pangkalan,$param)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->where('tb_anggota.tingkat', $param);
		return $this->db->get('tb_anggota');
	}

}

/* End of file M_beranda.php */
/* Location: ./application/modules/beranda/models/M_beranda.php */