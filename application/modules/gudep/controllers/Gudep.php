<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudep extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_gudep');
	}

	public function index()
	{
		$level 		= $this->session->userdata('ses_level');
		$akses 		= ['1','2'];
		$button 	= '';

		if ($level == null) {
			redirect('auth','refresh');
		}
		
		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];
		
		if (in_array($level, $akses, true)) {
			$button = '<a href="#modal_add" data-toggle="modal" class="btn-sm btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i> Tambah Gudep</a>';
			if ($level == 1) {
				$pangkalan = $this->M_master->getall('tb_pangkalan',$order)->result();
			}
			else
			{
				$id_data 		= $this->session->userdata('ses_id');
				$detil_user 	= $this->db->get_where('tb_user', ['id_user' => $id_data])->row();
				$id_kwaran 		= $detil_user->id_kwaran;

				$pangkalan = $this->M_master->getWhere('tb_pangkalan',['kwaran' => $id_kwaran],$order)->result();
			}
		}


		$no = 1;
		$gudep = $this->M_gudep->getGudep()->result();
		$anggota = array();
		if ($gudep) {
			foreach ($gudep as $gudep) {
				$anggota[$no]	= [
					'id_gudep'			=> $gudep->id_gudep,
					'nama_pangkalan'	=> $gudep->nama_pangkalan,
					'id_kwaran'			=> $gudep->id_kwaran,
					'ambalan'			=> $gudep->ambalan,
					'no_gudep'			=> $gudep->no_gudep,
					'jumlah_anggota'	=> $this->M_gudep->get_anggota_by_gudep($gudep->id_gudep)->num_rows()
				];
				$no++;
			}
		}


		$data = [
			'title'			=> 'Gudep',
			'sub'			=> 'gudep terdaftar',
			'menu'			=> 'gudep',
			'button_menu'	=> $button,
			'pangkalan'		=> $pangkalan,
			'rekap'			=> $anggota
		];
		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function tambah_gudep($asal = null)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		//cek no gudep
		$no_gudep 	= $this->input->post('gudep');
		$cek = $this->db->get_where('tb_gudep', ['no_gudep' => $no_gudep])->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('error', 'NOMOR GUDEP Sudah Terdaftar');
			redirect('gudep','refresh');
		}



		//proses insert
		$data = [
			'id_pangkalan'	=> $this->input->post('pangkalan'),
			'no_gudep'		=> $this->input->post('gudep'),
			'ambalan'		=> $this->input->post('ambalan')
		];

		$cek  = $this->M_master->input('tb_gudep',$data);
		if (!$cek) {
			$this->session->set_flashdata('success', 'Gudep Berhasil Ditambahkan');

		}
		else
		{
			$this->session->set_flashdata('error', 'Gagal Input, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik');
		}

		if ($asal) {
			redirect('gudep/regional','refresh');
		}
		else
		{
			redirect('gudep','refresh');
		}
	}

	function hapus_gudep($id,$asal=null)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$cek = $this->M_master->delete('tb_gudep',['id_gudep' => $id]);
		
		$redirect = 'gudep';
		if ($asal) {
			$redirect = 'gudep/regional';
		}


		if (!$cek) {
			$this->M_master->delete('tb_anggota',['id_gudep' => $id]);
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Data Berhasil Dihapus',
				'icon'		=> 'success',
				'title'		=> 'Sukses!',
				'action'	=> site_url($redirect)
			));
		}
		else
		{
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Gagal Hapus Data, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik.',
				'icon'		=> 'error',
				'title'		=> 'Gagal!',
				'action'	=> site_url($redirect)
			));
		}
	}

	function detil($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];
		$data				=  $this->M_master->getWhere('tb_gudep',['id_gudep'=> $id],$order)->row();
		echo json_encode($data);
	}

	function update_gudep()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = [
			'id_pangkalan'	=> $this->input->post('pangkalan'),
			'no_gudep'		=> $this->input->post('gudep'),
			'ambalan'		=> $this->input->post('ambalan')
		];

		$where = ['id_gudep'	=> $this->input->post('id_gudep')];

		$cek  = $this->M_master->update('tb_gudep',$where,$data);
		if (!$cek) {
			$this->session->set_flashdata('success', 'Gudep Berhasil Di Perbarui');
		}
		else
		{
			$this->session->set_flashdata('error', 'Gagal Update, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik');
		}

		if ($this->session->userdata('ses_level') == 1) {
			redirect('gudep','refresh');
		}
		else
		{
			redirect('gudep/regional','refresh');
		}
	}

	function lihat_gudep($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

		$gudep = $this->M_gudep->getGudepByIDGudep($id)->row();
		$anggota = [
			'id_gudep'			=> $gudep->id_gudep,
			'nama_pangkalan'	=> $gudep->nama_pangkalan,
			'alamat'			=> $gudep->alamat_pangkalan,
			'ambalan'			=> $gudep->ambalan,
			'kwaran'			=> $gudep->nama_kwaran,
			'kamabigus'			=> $gudep->kamabigus,
			'kagudep'			=> $gudep->kagudep,
			'jumlah_pembina'	=> $gudep->jumlah_pembina,
			'no_gudep'			=> $gudep->no_gudep,
			'jumlah_anggota'	=> $this->M_gudep->get_anggota_by_gudep($gudep->id_gudep)->num_rows()
		];

		$data = [
			'title'			=> 'Gudep',
			'sub'			=> 'Detil Gudep',
			'menu'			=> 'gudep',
			'button_menu'	=> $button,
			'gudep'			=> $anggota
		];
		
		$this->template->load('tema/index','lihat_gudep',$data);
	}


	/*MENU REGIONAL*/
	function regional()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$button = '<a href="#modal_add" data-toggle="modal" class="btn-sm btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i> Tambah Gudep</a>';

		$data = [
			'title'			=> 'Gudep',
			'sub'			=> 'gudep regional',
			'menu'			=> 'gudep_regional',
			'button_menu'	=> $button,
			'pangkalan'		=> $this->M_gudep->pangkalan_gudep_regional(),
			'rekap'			=> $this->M_gudep->get_gudep_regional()
		];

		//echo json_encode($data);
		$this->template->load('tema/index','gudep_regional',$data);
	}

	function regional_admin($id_kwaran)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

		$gudep = $this->M_gudep->get_gudep_by_kwaran($id_kwaran)->result();

		$no = 1;
		$anggota = array();
		if ($gudep) {
			foreach ($gudep as $gudep) {
				$anggota[$no]	= [
					'id_gudep'			=> $gudep->id_gudep,
					'nama_pangkalan'	=> $gudep->nama_pangkalan,
					'id_kwaran'			=> $gudep->id_kwaran,
					'ambalan'			=> $gudep->ambalan,
					'no_gudep'			=> $gudep->no_gudep,
					'jumlah_anggota'	=> $this->M_gudep->get_anggota_by_gudep($gudep->id_gudep)->num_rows()
				];
				$no++;
			}
		}

		$data = [
			'title'			=> 'Gudep',
			'sub'			=> 'gudep regional',
			'menu'			=> 'gudep_regional',
			'button_menu'	=> $button,
			'rekap'			=> $anggota
		];

		$this->template->load('tema/index','gudep_regional',$data);
	}

	function anggota_regional($id_gudep)
	{
		$level 		= $this->session->userdata('ses_level');
		$akses 		= ["2","3"];

		if (in_array($level, $akses, true)) {
			$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';


			$data = [
				'title'			=> 'Gudep',
				'sub'			=> 'gudep regional',
				'menu'			=> 'gudep_regional',
				'button_menu'	=> 	$button,
				'rekap'			=>  $this->M_gudep->get_anggota_by_gudep($id_gudep)->result()
			];

			$this->template->load('tema/index','anggota_gudep',$data);
		}
		else
		{
			redirect('auth','refresh');
		}
	}

}

/* End of file Gudep.php */
/* Location: ./application/modules/gudep/controllers/Gudep.php */