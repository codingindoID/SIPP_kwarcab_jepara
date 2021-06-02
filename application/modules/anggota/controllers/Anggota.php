<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_anggota');
	}
	public function index()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$level = $this->session->userdata('ses_level');
		$select = '';
		$anggota = '';

		switch ($level) {
			case ADMIN:
			$select = '<select name="kwaran" class="form-control" id="kwaran"></select>';
			break;
			case ADMIN_KWARAN:
			$anggota = $this->M_anggota->getanggotaKwaran()->result();
			break;
			case ADMIN_GUDEP:
			$anggota = $this->M_anggota->getanggotaGudep()->result();
			break;
			default:
			break;
		}

		$data = [
			'title'			=> 'Anggota',
			'sub'			=> 'anggota terdaftar',
			'menu'			=> 'anggota',
			'button_menu'	=> $select,
			'anggota'		=> $anggota
		];

		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function anggota_gudep($id_pangkalan)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

		$data = [
			'title'			=> 'Anggota',
			'sub'			=> 'anggota terdaftar',
			'menu'			=> 'anggota',
			'button_menu'	=> $button,
			'anggota'		=> $this->M_anggota->get_anggota_gudep($id_pangkalan)->result()
		];

		$this->template->load('tema/index','index',$data);
	}

	function filter_anggota($id_kwaran)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$level = $this->session->userdata('ses_level');
		$select = '';
		switch ($level) {
			case 1:
			$select = '<select name="kwaran" class="form-control" id="kwaran"></select>';
			break;
			default:
			break;
		}


		$data = [
			'title'			=> 'Anggota',
			'sub'			=> 'anggota terdaftar',
			'menu'			=> 'anggota',
			'button_menu'	=> $select,
			'anggota'		=> $this->M_anggota->get_anggota($id_kwaran)->result()
		];

		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function getDesa($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = $this->db->get_where('tb_desa', ['id_kecamatan' => $id])->result();
		echo json_encode($data);

	}

	function filter_anggota_admin($id_kwaran)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$level = $this->session->userdata('ses_level');

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';
		
		$data = [
			'title'			=> 'Anggota',
			'sub'			=> 'anggota terdaftar',
			'menu'			=> 'anggota',
			'button_menu'	=> $button,
			'anggota'		=> $this->M_anggota->get_anggota($id_kwaran)->result()
		];

		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function tambah_anggota()
	{
		$level = $this->session->userdata('ses_level');
		$id_user = $this->session->userdata('ses_id');
		if ($level == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];


		$button = '<a href="'.site_url('anggota/import').'" class="btn-sm btn-success btn-round" accept=".xls , .xlsx"><i class="fas fa-file-import"></i> Import Excel</a>';

		//membuat data dropdown kwaran berdasarkan level
		$detil_user = $this->db->get_where('tb_user',['id_user' => $id_user])->row(); 
		switch ($level) {
			case 1:
			$kwaran = $this->M_master->getall('tb_kwaran',$order)->result();
			break;
			case 2 :
			$kwaran = $this->M_master->getWhere('tb_kwaran',['id_kwaran' => $detil_user->id_kwaran],$order)->result();
			break;
			case 3:
			$id_pangkalan = $detil_user->id_pangkalan;
				//mendapatkan id_kwaran dari select data di tb pangkalan
			$pangkalan = $this->db->get_where('tb_pangkalan',['id_pangkalan' => $id_pangkalan])->row();
			$id_kwaran = $pangkalan->kwaran;

			$kwaran = $this->M_master->getWhere('tb_kwaran',['id_kwaran' => $id_kwaran],$order)->result();
			break;
			default:
			break;
		}

		$data = [
			'title'			=> 'Anggota',
			'sub'			=> 'tambah anggota',
			'menu'			=> 'tambah_anggota',
			'button_menu'	=> $button,
			'darah'			=> $this->M_master->getall('tb_darah',$order)->result(),
			'golongan'		=> $this->M_master->getall('tb_golongan',$order)->result(),
			'kecamatan'		=> $this->db->get('tb_kecamatan')->result(),
			'kwaran'		=> $kwaran,
			'golongan_sert'	=> $this->M_anggota->getall('tb_golongan_sertifikat')->result(),
		];

		//echo json_encode($data);
		$this->template->load('tema/index','form_tambah_anggota',$data);
	}

	function get_tingkat($id_golongan)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'id_tingkatan',
			'urutan'	=> 'asc'
		];
		$data = $this->M_master->getWhere('tb_tingkatan',['tingkat' => strtolower($id_golongan)],$order)->result();

		echo json_encode($data);
	}

	function get_gudep($id_kwaran)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = $this->M_anggota->getgudep($id_kwaran)->result();

		echo json_encode($data);
	}


	function insert_anggota()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$alamat = $this->M_anggota->alamat();

		$data = [
			'id_kwaran'     => $this->input->post('kwaran'),
			'id_gudep'  	=> $this->input->post('gudep') ,
			'nama' 			=> $this->input->post('nama'),
			'tempat_lahir'  => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
			'alamat' 		=> $alamat,
			'rt' 			=> $this->input->post('rt'),
			'rw' 			=> $this->input->post('rw'),
			'desa' 			=> $this->input->post('desa'),
			'kecamatan' 	=> $this->input->post('kecamatan'),
			'gol_darah' 	=> $this->input->post('darah'),
			'golongan' 		=> $this->input->post('golongan'),
			'tingkat' 		=> $this->input->post('tingkat'),
			'kta' 			=> $this->input->post('kta'),
			'tempat_kmd' 	=> $this->input->post('tempat_kmd'),
			'tahun_kmd' 	=> $this->input->post('tahun_kmd'),
			'golongan_kmd' 	=> $this->input->post('golongan_kmd'),
			'tempat_kml' 	=> $this->input->post('tempat_kml'),
			'tahun_kml' 	=> $this->input->post('tahun_kml'),
			'golongan_kml' 	=> $this->input->post('golongan_kml'),
			'tempat_kpd' 	=> $this->input->post('tempat_kpd'),
			'tahun_kpd' 	=> $this->input->post('tahun_kpd'),
			'golongan_kpd' 	=> $this->input->post('golongan_kpd'),
			'tempat_kpl' 	=> $this->input->post('tempat_kpl'),
			'tahun_kpl' 	=> $this->input->post('tahun_kpl'),
			'golongan_kpl' 	=> $this->input->post('golongan_kpl'),
			'no_kmd' 		=> $this->input->post('no_kmd'),
			'pel_kmd' 		=> $this->input->post('pel_kmd'),
			'no_kml' 		=> $this->input->post('no_kml'),
			'pel_kml' 		=> $this->input->post('pel_kml'),
			'no_kpd' 		=> $this->input->post('no_kpd'),
			'pel_kpd' 		=> $this->input->post('pel_kpd'),
			'no_kpl' 		=> $this->input->post('no_kpl'),
			'pel_kpl' 		=> $this->input->post('pel_kpl'),
			'password'		=> md5(12345)
		];

		$cek = $this->M_master->input('tb_anggota',$data);
		if (!$cek) {
			$this->session->set_flashdata('success', 'Anggota Berhasil Ditambahkan');
			if ($this->session->userdata('ses_level') == 3) {
				redirect('anggota','refresh');	
			}
			else
			{
				redirect('anggota/filter_anggota/'.$this->input->post('kwaran'),'refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Gagal');
			redirect('anggota/filter_anggota/'.$this->input->post('kwaran'),'refresh');
		}
	}

	function lihat_anggota($id)
	{
		
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$anggota = $this->M_anggota->get_anggota_byID($id)->row();

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';
		$data = [
			'title'			=> 'Anggota',
			'sub'			=> 'anggota terdaftar',
			'menu'			=> 'anggota',
			'button_menu'	=> $button,
			'anggota'		=> $anggota
		];
		//echo json_encode($data);
		$this->template->load('tema/index','lihat_anggota',$data);
	}

	function hapus_anggota($id,$id_kwaran)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$cek = $this->M_master->delete('tb_anggota',['id_anggota' => $id]);
		if (!$cek) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
			redirect('anggota/filter_anggota/'.$id_kwaran,'refresh');
		}
		else
		{
			$this->session->set_flashdata('error', 'Gagal Hapus Data');
			redirect('anggota/filter_anggota/'.$id_kwaran,'refresh');
		}
	}

	function edit_anggota($id,$asal)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];
		
		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

		$anggota = $this->M_anggota->getdetilanggota($id);
		$gudep_terpilih  = $anggota->id_gudep; 

		$data = [
			'title'			=> 'Anggota',
			'sub'			=> 'anggota terdaftar',
			'menu'			=> 'anggota',
			'button_menu'	=> $button,
			'anggota'		=> $anggota,
			'asal'			=> $asal,
			'gudep_terpilih'=> $gudep_terpilih,
			'kecamatan'		=> $this->db->get('tb_kecamatan')->result(),
			'desa'			=> $this->db->get('tb_desa')->result(),
			'gudep_dropdown'=> $this->M_anggota->getallGudep()->result(),
			'darah'			=> $this->M_master->getall('tb_darah',$order)->result(),
			'golongan'		=> $this->M_master->getall('tb_golongan',$order)->result(),
			'kwaran'		=> $this->M_master->getall('tb_kwaran',$order)->result(),
			'golongan_sert'	=> $this->M_anggota->getall('tb_golongan_sertifikat')->result(),
		];

		$this->template->load('tema/index','edit_anggota',$data);
	}

	function update_anggota()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$id_kwaran 	= $this->input->post('kwaran');
		$id_gudep 	= $this->input->post('gudep');
		$asal 		= $this->input->post('asal');

		if ($asal == 'anggota') {
			$redirect = 'anggota/filter_anggota/'.$id_kwaran;
		}
		else
		{
			$redirect = 'gudep/anggota_regional/'.$id_gudep;
		}

		$cek = $this->M_anggota->update_anggota();
		if (!$cek) {
			$this->session->set_flashdata('success', 'update berhasil');
		}
		else
		{
			$this->session->set_flashdata('error', 'update gagal');
		}
		redirect($redirect,'refresh');
	}

	function potensi($param)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';
		$data = [
			'title'			=> 'Potensi Anggota',
			'sub'			=> 'Bersertifikat <b>'.strtoupper($param).'</b>',
			'menu'			=> 'anggota',
			'button_menu'	=> $button,
			'anggota'		=> $this->M_anggota->get_potensi_anggota('tempat_'.$param.' != "" and tahun_'.$param.' != 0 and golongan_'.$param.' != ""')->result()
		];

		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	/*IMPORT*/
	function import()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'nama_kwaran',
			'urutan'	=> 'asc'
		];

		switch ($this->session->userdata('ses_level')) {
			case '1':
			$link = 'import_admin';
			break;
			case '2':
			$link = 'import_kwaran';
			break;
			default:
			$link = 'import_gudep';
			break;
		}

		$button = '<a href="'.base_url('excel/anggota/').$link.'.xls" class="btn-sm btn-success btn-round"><i class="fas fa-file-download"></i> Download Format</a>';
		$data = [
			'title'			=> 'Pangkalan',
			'sub'			=> 'Master data Pangkalan',
			'menu'			=> 'pangkalan',
			'button_menu'	=> $button,
			'gudep'			=> $this->M_anggota->getallGudep()->result(),
			'kwaran'		=> $this->M_master->getall('tb_kwaran',$order)->result()
		];
		$this->template->load('tema/index','import',$data);
	}

	function export_anggota()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}	

		switch ($this->session->userdata('ses_level')) {
			case ADMIN:
			$anggota = $this->M_anggota->getsemuaAnggota();
			break;
			case ADMIN_KWARAN:
			$anggota = $this->M_anggota->getsemuaAnggotaKwaran();
			break;
			case ADMIN_GUDEP:
			$anggota = $this->M_anggota->getsemuaAnggotaGudep();
			break;
			default:
			break;
		}

		//echo json_encode($anggota);
		$this->M_anggota->excel($anggota);
	}

	function upload()
	{
		//proses import
		$cek = $this->M_anggota->proses_import();
		if ($cek['success'] == 1) {
			$this->session->set_flashdata('success', 'Data Berhasil Diimport');
			redirect('anggota/import','refresh');
		}
		else
		{
			$this->session->set_flashdata('error', $cek['msg']);
			redirect('anggota/import','refresh');	
		}
		
		
	}
}

/* End of file Anggota.php */
/* Location: ./application/modules/anggota/controllers/Anggota.php */