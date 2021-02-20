<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gudep extends CI_Model {

	function getGudep()
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->order_by('tb_pangkalan.nama_pangkalan', 'asc');
		return $this->db->get('tb_gudep');
	}	

	function getGudepByID($id)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->where('tb_pangkalan.id_pangkalan', $id);
		$this->db->order_by('tb_pangkalan.nama_pangkalan', 'asc');
		return $this->db->get('tb_gudep');
	}	

	function getGudepByIDGudep($id_gudep)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->where('tb_gudep.id_gudep', $id_gudep);
		$this->db->order_by('tb_pangkalan.nama_pangkalan', 'asc');
		return $this->db->get('tb_gudep');
	}	

	function get_anggota_by_gudep($id_gudep)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->where('tb_anggota.id_gudep', $id_gudep);
		$this->db->order_by('tb_anggota.nama', 'asc');
		return $this->db->get('tb_anggota');
	}

	function get_gudep_by_kwaran($id_kwaran)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->where('tb_pangkalan.kwaran', $id_kwaran);
		return $this->db->get('tb_gudep');
	}

	function get_gudep_regional()
	{
		$level 		= $this->session->userdata('ses_level');
		$id_data 	= $this->session->userdata('ses_id');
		$detil_user = $this->db->get_where('tb_user', ['id_user' => $id_data])->row();
		//akses masing2 level
		switch ($level) {
			case ADMIN_KWARAN:
					//admin kwaran
			$id_kwaran = $detil_user->id_kwaran;
			$gudep = $this->M_gudep->get_gudep_by_kwaran($id_kwaran)->result();
			break;
			case ADMIN_GUDEP:
					//admin gudep
			$id_pangkalan = $detil_user->id_pangkalan;
			$gudep = $this->M_gudep->getGudepByID($id_pangkalan)->result();
			break;
			default:
			break;
		}

		$anggota = array();
		if ($gudep) {
			$no = 0;
			foreach ($gudep as $gudep) {
				$anggota[$no++]	= [
					'id_gudep'			=> $gudep->id_gudep,
					'nama_pangkalan'	=> $gudep->nama_pangkalan,
					'id_kwaran'			=> $gudep->id_kwaran,
					'ambalan'			=> $gudep->ambalan,
					'no_gudep'			=> $gudep->no_gudep,
					'jumlah_anggota'	=> $this->M_gudep->get_anggota_by_gudep($gudep->id_gudep)->num_rows()
				];
			}
		}
		return $anggota;
	}

	function pangkalan_gudep_regional()
	{
		$id_kwaran = $this->session->userdata('ses_kwaran');
		$where = [
			'kwaran'		=> $id_kwaran
		];

		return $this->db->get_where('tb_pangkalan', $where)->result();
	}

}

/* End of file M_gudep.php */
/* Location: ./application/modules/gudep/models/M_gudep.php */