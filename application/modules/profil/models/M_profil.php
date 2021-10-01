<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	function getProfil()
	{
		$level 		= $this->session->userdata('ses_level');
		$id_user 	= $this->session->userdata('ses_id');
		switch ($level) {
			case '1':
			$data = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('ses_id')])->row();
			break;
			case '2':
			$data = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('ses_id')])->row();
			break;
			case '3':
			$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_user.id_pangkalan');
			$data = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('ses_id')])->row();
			break;
			
			default:
			break;
		}
		return $data;
	}
}

/* End of file M_profil.php */
/* Location: ./application/modules/profil/models/M_profil.php */