<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cari extends CI_Model {

	function getData($param)
	{
		$level = $this->session->userdata('ses_level');
		switch ($level) {
			case '1':
			$data = $this->_data_admin($param);
			break;
			case '2':
			$data = $this->_data_admin_kwaran($param);
			break;
			case '3':
			$data = $this->_data_admin_gudep($param);
			break;
			default:
			break;
		}

		return $data;
	}	


	private function _data_admin($param)
	{
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->like('nama', $param, 'BOTH');
		$this->db->or_like('kta', $param, 'BOTH');
		$this->db->or_like('alamat', $param, 'BOTH');
		$this->db->or_like('golongan', $param, 'BOTH');
		$this->db->or_like('nama_kwaran', $param, 'BOTH');
		$this->db->or_like('tb_pangkalan.id_pangkalan', $param, 'BOTH');
		return $this->db->get('tb_anggota');
	}

	private function _data_admin_kwaran($param)
	{
		$where = [
			'tb_kwaran.id_kwaran'		=> $this->session->userdata('ses_kwaran')
		];

		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->where($where);
		$this->db->like('nama', $param, 'BOTH');
		$this->db->or_like('kta', $param, 'BOTH');
		$this->db->or_like('alamat', $param, 'BOTH');
		$this->db->or_like('golongan', $param, 'BOTH');
		$this->db->or_like('nama_kwaran', $param, 'BOTH');
		$this->db->or_like('tb_pangkalan.id_pangkalan', $param, 'BOTH');
		return $this->db->get('tb_anggota');
	}

	private function _data_admin_gudep($param)
	{
		$where = [
			'tb_pangkalan.id_pangkalan'		=> $this->session->userdata('ses_pangkalan')
		];

		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->where($where);
		$this->db->like('nama', $param, 'BOTH');
		$this->db->or_like('kta', $param, 'BOTH');
		$this->db->or_like('alamat', $param, 'BOTH');
		$this->db->or_like('golongan', $param, 'BOTH');
		$this->db->or_like('nama_kwaran', $param, 'BOTH');
		$this->db->or_like('tb_pangkalan.id_pangkalan', $param, 'BOTH');
		return $this->db->get('tb_anggota');
	}

}

/* End of file M_cari.php */
/* Location: ./application/modules/cari/models/M_cari.php */