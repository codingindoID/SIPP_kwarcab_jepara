<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->id = $this->session->userdata('ses_id');
		$this->level = $this->session->userdata('ses_level');
		$this->kwaran = $this->session->userdata('ses_kwaran');
		$this->pangkalan = $this->session->userdata('ses_pangkalan');

		$this->load->model('M_master');
		$this->load->model('M_berandaNew');
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth', 'refresh');
		}
	}
	public function index()
	{
		$data = [
			'title'			=> 'Beranda',
			'sub'			=> '',
			'button_menu'	=> '',
			'menu'			=> 'beranda',
			'anggota'		=> $this->M_berandaNew->countAnggota()->num_rows(),
			'pangkalan'		=> $this->db->get('tb_pangkalan')->num_rows(),
			'dewasa'		=> $this->M_berandaNew->pramukaTingkat('dewasa'),
			'siaga'			=> $this->M_berandaNew->pramukaTingkat('siaga'),
			'penggalang' 	=> $this->M_berandaNew->pramukaTingkat('penggalang'),
			'penegak'		=> $this->M_berandaNew->pramukaTingkat('penegak'),
			'pandega'		=> $this->M_berandaNew->pramukaTingkat('pandega'),
			'lainnya'		=> $this->M_berandaNew->pramukaTingkat(),
			'status_sek'	=> $this->db->get('tb_status_kepemilikan')->result(),
			'sifat_sek'		=> $this->db->get('tb_sifat_kepemilikan')->result(),
		];


		$level = $this->session->userdata('ses_level');
		switch ($level) {
			case 1:
				$data['gudep']	=  $this->db->get('tb_gudep')->num_rows();
				$data['kwaran']	=  $this->db->get('tb_kwaran')->num_rows();
				break;
			case 2:
				$data['gudep']	=  $this->db->get('tb_gudep')->num_rows();
				$data['kwaran']	=  $this->db->get_where('tb_kwaran', ['id_kwaran' => $this->kwaran])->row();
				$data['id_kwaran']	= $this->kwaran;
				break;
			case 3:
				$detil_user	 	= $this->db->get_where('tb_user', ['id_user' => $this->id])->row();
				$id_pangkalan 	= $detil_user->id_pangkalan;
				$data['id_kwaran']	= $id_pangkalan;
				$data['gudep']	= $this->db->get_where('tb_gudep', ['id_pangkalan' => $id_pangkalan])->num_rows();
				$data['pangkalan'] = $this->db->get_where('tb_pangkalan', ['id_pangkalan' => $id_pangkalan])->row();
				break;

			default:
				break;
		}

		// echo json_encode($data);
		$this->template->load('tema/index', 'index', $data);
	}

	function aksi_update_kwaran($id)
	{
		$cek = $this->M_berandaNew->update_kwaran();
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
		redirect('beranda', 'refresh');
	}

	function aksi_updatePangkalan($id_pangkalan)
	{
		$cek = $this->M_berandaNew->aksi_updatePangkalan($id_pangkalan);
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
		redirect('beranda', 'refresh');
	}
}

/* End of file Beranda.php */
/* Location: ./application/modules/beranda/controllers/Beranda.php */