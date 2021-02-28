<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_beranda');
	}
	public function index()
	{	
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$level = $this->session->userdata('ses_level');
		switch ($level) {
			case 2:
			redirect('beranda/index_kwaran','refresh');
			break;
			case 3:
			redirect('beranda/index_gudep','refresh');
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
			'kwaran'		=> $this->M_master->getall('tb_kwaran',$order)->num_rows(),
			'gudep'			=> $this->M_master->getall('tb_gudep',$order)->num_rows(),
			'anggota'		=> $this->M_master->getall('tb_anggota',$order)->num_rows(),
			'pangkalan'		=> $this->M_master->getall('tb_pangkalan',$order)->num_rows(),
			'siaga'			=> $this->M_master->getWhere('tb_anggota',['golongan' => 'siaga'],$order)->num_rows(),
			'penggalang'	=> $this->M_master->getWhere('tb_anggota',['golongan' => 'penggalang'],$order)->num_rows(),
			'penegak'		=> $this->M_master->getWhere('tb_anggota',['golongan' => 'penegak'],$order)->num_rows(),
			'pandega'		=> $this->M_master->getWhere('tb_anggota',['golongan' => 'pandega'],$order)->num_rows(),
			'kmd'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kmd' ],$order)->num_rows(),
			'kml'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kml' ],$order)->num_rows(),
			'kpd'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kpd' ],$order)->num_rows(),
			'kpl'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kpl' ],$order)->num_rows(),
			'non'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'NK' ],$order)->num_rows(),
			'sub_siaga'		=> $this->_get_tingkat('siaga'),
			'sub_penggalang'=> $this->_get_tingkat('penggalang'),
			'sub_penegak'	=> $this->_get_tingkat('penegak'),
			'sub_pandega'	=> $this->_get_tingkat('pandega'),
			'id_kwaran'		=> '' 
		];


		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function index_kwaran()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$id_data 		= $this->session->userdata('ses_id');
		$detil_user 	= $this->db->get_where('tb_user', ['id_user' => $id_data])->row();
		$id_kwaran 		= $detil_user->id_kwaran;

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$data = [
			'title'			=> 'Beranda',
			'sub'			=> '',
			'button_menu'	=> '',
			'menu'			=> 'beranda',
			'kwaran'		=> $this->M_master->getWhere('tb_kwaran',['id_kwaran'=> $id_kwaran],$order)->row(),
			'gudep'			=> $this->M_beranda->getGudep($id_kwaran)->num_rows(),
			'anggota'		=> $this->M_master->getWhere('tb_anggota',['id_kwaran' => $id_kwaran],$order)->num_rows(),
			'pangkalan'		=> $this->M_master->getWhere('tb_pangkalan',['kwaran' => $id_kwaran],$order)->num_rows(),
			'siaga'			=> $this->M_master->getWhere('tb_anggota',['golongan' => 'siaga','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'penggalang'	=> $this->M_master->getWhere('tb_anggota',['golongan' => 'penggalang','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'penegak'		=> $this->M_master->getWhere('tb_anggota',['golongan' => 'penegak','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'pandega'		=> $this->M_master->getWhere('tb_anggota',['golongan' => 'pandega','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kmd'			=> $this->M_master->getWhere('tb_anggota',['tingkat' => 'kmd','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kml'			=> $this->M_master->getWhere('tb_anggota',['tingkat' => 'kml','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kpd'			=> $this->M_master->getWhere('tb_anggota',['tingkat' => 'kpd','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kpl'			=> $this->M_master->getWhere('tb_anggota',['tingkat' => 'kpl','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'non'			=> $this->M_master->getWhere('tb_anggota',['tingkat' => 'NK','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'sub_siaga'		=> $this->_get_tingkat_kwaran('siaga',$id_kwaran),
			'sub_penggalang'=> $this->_get_tingkat_kwaran('penggalang',$id_kwaran),
			'sub_penegak'	=> $this->_get_tingkat_kwaran('penegak',$id_kwaran),
			'sub_pandega'	=> $this->_get_tingkat_kwaran('pandega',$id_kwaran),
			'id_kwaran'		=> $id_kwaran,
			'status_sek'	=> $this->M_master->getall('tb_status_kepemilikan',$order2)->result(),
			'sifat_sek'		=> $this->M_master->getall('tb_sifat_kepemilikan',$order2)->result(),
		];

		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function index_gudep()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$detil_user = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('ses_id')])->row();
		$id_pangkalan = $detil_user->id_pangkalan;

		$data = [
			'title'			=> 'Beranda',
			'sub'			=> '',
			'button_menu'	=> '',
			'menu'			=> 'beranda',
			'gudep'			=> $this->M_master->getWhere('tb_gudep',['id_pangkalan' => $id_pangkalan],$order)->num_rows(),
			'anggota'		=> $this->M_beranda->getAnggotaGudep($id_pangkalan)->num_rows(),
			'siaga'			=> $this->M_beranda->potensi_muda($id_pangkalan,'siaga')->num_rows(),
			'penggalang'	=> $this->M_beranda->potensi_muda($id_pangkalan,'penggalang')->num_rows(),
			'penegak'		=> $this->M_beranda->potensi_muda($id_pangkalan,'penegak')->num_rows(),
			'pandega'		=> $this->M_beranda->potensi_muda($id_pangkalan,'pandega')->num_rows(),
			'kmd'			=> $this->M_beranda->potensi_dewasa($id_pangkalan,'kmd')->num_rows(),
			'kml'			=> $this->M_beranda->potensi_dewasa($id_pangkalan,'kml')->num_rows(),
			'kpd'			=> $this->M_beranda->potensi_dewasa($id_pangkalan,'kpd')->num_rows(),
			'kpl'			=> $this->M_beranda->potensi_dewasa($id_pangkalan,'kpl')->num_rows(),
			'non'			=> $this->M_beranda->potensi_dewasa($id_pangkalan,'NK')->num_rows(),
			'sub_siaga'		=> $this->_get_tingkat_gudep('siaga',$id_pangkalan),
			'sub_penggalang'=> $this->_get_tingkat_gudep('penggalang',$id_pangkalan),
			'sub_penegak'	=> $this->_get_tingkat_gudep('penegak',$id_pangkalan),
			'sub_pandega'	=> $this->_get_tingkat_gudep('pandega',$id_pangkalan),
			'id_kwaran'		=> $id_pangkalan
		];

		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}


	/*get tingkat*/
	private function _get_tingkat_gudep($golongan,$id_pangkalan)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'id_tingkatan',
			'urutan'	=> 'asc'
		];

		$order2 = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'asc'
		];

		$tingkat = $this->M_master->getWhere('tb_tingkatan',['tingkat' => $golongan], $order)->result();

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

	private function _get_tingkat_kwaran($golongan,$id_kwaran)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'id_tingkatan',
			'urutan'	=> 'asc'
		];

		$order2 = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'asc'
		];

		$tingkat = $this->M_master->getWhere('tb_tingkatan',['tingkat' => $golongan], $order)->result();

		$no  = 1;
		$data = array();
		foreach ($tingkat as $t) {
			$data[$no] = [
				'tingkat'	=> $t->sub_tingkat,
				'jumlah' 	=> $this->M_master->getWhere('tb_anggota',['tingkat' => $t->sub_tingkat,'id_kwaran' => $id_kwaran], $order2)->num_rows()
			];
			$no++;
		}

		return $data;
	}

	private function _get_tingkat($golongan)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'id_tingkatan',
			'urutan'	=> 'asc'
		];

		$order2 = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'asc'
		];

		$tingkat = $this->M_master->getWhere('tb_tingkatan',['tingkat' => $golongan], $order)->result();

		$no  = 1;
		$data = array();
		foreach ($tingkat as $t) {
			$data[$no] = [
				'tingkat'	=> $t->sub_tingkat,
				'jumlah' 	=> $this->M_master->getWhere('tb_anggota',['tingkat' => $t->sub_tingkat], $order2)->num_rows()
			];
			$no++;
		}

		return $data;
	}

	function aksi_update_kwaran($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$cek = $this->M_beranda->update_kwaran();
		if ($cek['res'] == 1) {
			$this->session->set_flashdata('success', 'Update Berhasil');
			redirect('beranda/index_kwaran','refresh');
		}
		else
		{
			$this->session->set_flashdata('error', 'Gagal Update');
			redirect('beranda/index_kwaran','refresh');
		}
	}

}

/* End of file Beranda.php */
/* Location: ./application/modules/beranda/controllers/Beranda.php */