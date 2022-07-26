<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_beranda');
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth', 'refresh');
		}
	}
	public function index()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth', 'refresh');
		}

		$level = $this->session->userdata('ses_level');
		switch ($level) {
			case 2:
				redirect('beranda/index_kwaran', 'refresh');
				break;
			case 3:
				redirect('beranda/index_gudep', 'refresh');
				break;

			default:
				break;
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$data = [
			'title'			=> 'Beranda',
			'sub'			=> '',
			'button_menu'	=> '',
			'menu'			=> 'beranda',
			'kwaran'		=> $this->M_master->getall('tb_kwaran', $order)->num_rows(),
			'gudep'			=> $this->M_master->getall('tb_gudep', $order)->num_rows(),
			'anggota'		=> $this->M_master->getall('tb_anggota', $order)->num_rows(),
			'pangkalan'		=> $this->M_master->getall('tb_pangkalan', $order)->num_rows(),
			'dewasa'		=> $this->M_beranda->getNumTingkat('dewasa', 'kwarcab'),
			'siaga'			=> $this->M_beranda->getNumTingkat('siaga', 'kwarcab'),
			'penggalang' 	=> $this->M_beranda->getNumTingkat('penggalang', 'kwarcab'),
			'penegak'		=> $this->M_beranda->getNumTingkat('penegak', 'kwarcab'),
			'pandega'		=> $this->M_beranda->getNumTingkat('pandega', 'kwarcab'),
			'id_kwaran'		=> ''
		];


		// echo json_encode($data);
		$this->template->load('tema/index', 'index', $data);
	}

	function index_kwaran()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth', 'refresh');
		}

		$id_data 		= $this->session->userdata('ses_id');
		$detil_user 	= $this->db->get_where('tb_user', ['id_user' => $id_data])->row();
		$id_kwaran 		= $detil_user->id_kwaran;

		$data = [
			'title'			=> 'Beranda',
			'sub'			=> '',
			'button_menu'	=> '',
			'menu'			=> 'beranda',
			'kwaran'		=> $this->db->get_where('tb_kwaran', ['id_kwaran' => $id_kwaran])->row(),
			'gudep'			=> $this->M_beranda->getGudep($id_kwaran)->num_rows(),
			'anggota'		=> $this->db->get_where('tb_anggota', ['id_kwaran' => $id_kwaran, 'tingkat != ' => null])->num_rows(),
			'pangkalan'		=> $this->db->get_where('tb_pangkalan', ['kwaran' => $id_kwaran])->num_rows(),
			'dewasa'		=> $this->M_beranda->getNumTingkat('dewasa', 'kwarran', $id_kwaran),
			'siaga'			=> $this->M_beranda->getNumTingkat('siaga', 'kwarran', $id_kwaran),
			'penggalang' 	=> $this->M_beranda->getNumTingkat('penggalang', 'kwarran', $id_kwaran),
			'penegak'		=> $this->M_beranda->getNumTingkat('penegak', 'kwarran', $id_kwaran),
			'pandega'		=> $this->M_beranda->getNumTingkat('pandega', 'kwarran', $id_kwaran),
			'id_kwaran'		=> $id_kwaran,
			'status_sek'	=> $this->db->get('tb_status_kepemilikan')->result(),
			'sifat_sek'		=> $this->db->get('tb_sifat_kepemilikan')->result(),
		];

		// echo json_encode($data);
		$this->template->load('tema/index', 'index', $data);
	}

	function index_gudep()
	{
		$detil_user	 	= $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('ses_id')])->row();
		$id_pangkalan 	= $detil_user->id_pangkalan;

		$data = [
			'title'			=> 'Beranda',
			'sub'			=> '',
			'button_menu'	=> '',
			'menu'			=> 'beranda',
			'gudep'			=> $this->db->get_where('tb_gudep', ['id_pangkalan' => $id_pangkalan])->num_rows(),
			'anggota'		=> $this->M_beranda->getAnggotaGudep($id_pangkalan)->num_rows(),
			'dewasa'		=> $this->M_beranda->getNumTingkat('dewasa', 'gudep', null, $id_pangkalan),
			'siaga'			=> $this->M_beranda->getNumTingkat('siaga', 'gudep', null, $id_pangkalan),
			'penggalang' 	=> $this->M_beranda->getNumTingkat('penggalang', 'gudep', null, $id_pangkalan),
			'penegak'		=> $this->M_beranda->getNumTingkat('penegak', 'gudep', null, $id_pangkalan),
			'pandega'		=> $this->M_beranda->getNumTingkat('pandega', 'gudep', null, $id_pangkalan),
			'id_kwaran'		=> $id_pangkalan,
			'pangkalan'		=> $this->db->get_where('tb_pangkalan', ['id_pangkalan' => $id_pangkalan])->row()
		];

		//echo json_encode($data);
		$this->template->load('tema/index', 'index', $data);
	}


	/*get tingkat*/
	private function _get_tingkat_gudep($golongan, $id_pangkalan)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth', 'refresh');
		}

		$order = [
			'kolom'		=> 'id_tingkatan',
			'urutan'	=> 'asc'
		];

		$order2 = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'asc'
		];

		$tingkat = $this->M_master->getWhere('tb_tingkatan', ['tingkat' => $golongan], $order)->result();

		$no  = 1;
		$data = array();
		foreach ($tingkat as $t) {
			$data[$no] = [
				'tingkat'	=> $t->sub_tingkat,
				'jumlah' 	=> $this->M_beranda->potensi_dewasa($id_pangkalan, $t->sub_tingkat)->num_rows()
			];
			$no++;
		}

		return $data;
	}

	function aksi_update_kwaran($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth', 'refresh');
		}

		$cek = $this->M_beranda->update_kwaran();
		if ($cek['res'] == 1) {
			$this->session->set_flashdata('success', 'Update Berhasil');
			redirect('beranda/index_kwaran', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Gagal Update');
			redirect('beranda/index_kwaran', 'refresh');
		}
	}

	function aksi_updatePangkalan($id_pangkalan)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth', 'refresh');
		}

		$cek = $this->M_beranda->aksi_updatePangkalan($id_pangkalan);
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
		redirect('beranda', 'refresh');
	}
}

/* End of file Beranda.php */
/* Location: ./application/modules/beranda/controllers/Beranda.php */