<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwaran extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_kwaran');
	}
	public function index()
	{
		$level = $this->session->userdata('ses_level');
		$akses = ['1'];
		$button = '';
		if ($level == null) {
			redirect('auth','refresh');
		}
		
		if (in_array($level, $akses, true)) {
			$button = '<a onclick="tambah()" href="#modal_add" data-toggle="modal" class="btn-sm btn-white btn-border btn-round mr-2"><i class="fa fa-plus" ></i> Tambah Kwaran</a>';
		}
		
		$order = [
			'kolom'		=> 'nama_kwaran',
			'urutan'	=> 'asc'
		];

		$order2 = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$data = [
			'title'			=> 'Kwarran',
			'sub'			=> 'kwarran terdaftar',
			'menu'			=> 'kwarran',
			'button_menu'	=> $button,
			'status_sek'	=> $this->M_master->getall('tb_status_kepemilikan',$order2)->result(),
			'sifat_sek'		=> $this->M_master->getall('tb_sifat_kepemilikan',$order2)->result(),
			'kwaran'		=> $this->M_master->getall('tb_kwaran',$order)->result()
		];
		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function tambah_kwaran()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$nama_kwaran = $this->input->post('nama_kwaran');
		//cek nama kwaran
		$cek = $this->db->get_where('tb_kwaran', ['nama_kwaran' => $nama_kwaran])->num_rows();
		if ($cek > 0) {
			echo json_encode(array(
				'success'	=> 0,
				'title'		=> 'Gagal',
				'message'	=> 'Nama Kwarran Sudah Terdaftar',
				'icon'		=> 'error'
			));
		}
		else
		{
			//proses tambah kwaran
			$data = [
				'nama_kwaran'			=> $nama_kwaran,
				'nomor_kwaran'			=> $this->input->post('nomor_kwaran'),
				'alamat_kwaran'			=> $this->input->post('alamat_kwaran'),
				'kamabiran'				=> $this->input->post('kamabiran'),
				'kakwaran'				=> $this->input->post('kakwaran'),
				'status_kepemilikan'	=> $this->input->post('status'),
				'sifat_kepemilikan'		=> $this->input->post('sifat')
			];


			$id = $this->input->post('id_kwaran');

			if ($id == '') {
				$cek  = $this->M_master->input('tb_kwaran',$data);
				$message = 'Ditambahkan';
			}
			else
			{
				$cek  = $this->M_master->update('tb_kwaran',['id_kwaran' => $id],$data);
				$message = 'DiUpdate';
			}

			if (!$cek) {
				echo json_encode(array(
					'success'	=> 1,
					'title'		=> 'Sukses',
					'message'	=> 'Kwarran Berhasil '.$message,
					'icon'		=> 'success',
					'action'	=> site_url('kwaran')
				));
			}
			else
			{
				echo json_encode(array(
					'success'	=> 0,
					'title'		=> 'Gagal',
					'message'	=> 'Silahkan Ulangi Atau Gunakan Koneksi Yang Baik',
					'icon'		=> 'error'
				));
			}
			//end proses
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
		$data				=  $this->M_master->getWhere('tb_kwaran',['id_kwaran'=> $id],$order)->row();
		echo json_encode($data);
	}

	function lihat($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}


		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$detil_kwaran = $this->db->get_where('tb_kwaran', ['id_kwaran' => $id])->row();


		$data = [
			'title'			=> 'Kwarran '.$detil_kwaran->nama_kwaran,
			'sub'			=> 'Detil Kwarran',
			'menu'			=> 'kwarran',
			'button_menu'	=> $button,
			'kwaran'		=> $this->M_master->getWhere('tb_kwaran',['id_kwaran'=> $id],$order)->row(),
			'potensi'		=> $this->potensi($id)
		];
		//echo json_encode($detil_kwaran);
		$this->template->load('tema/index','detil_kwaran',$data);
	}

	function hapus_kwaran($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$cek = $this->M_master->delete('tb_kwaran',['id_kwaran' => $id]);
		if (!$cek) {
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Data Berhasil Dihapus',
				'icon'		=> 'success',
				'title'		=> 'Sukses!',
				'action'	=> site_url('kwaran')
			));
		}
		else
		{
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Gagal Hapus Data, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik.',
				'icon'		=> 'error',
				'title'		=> 'Gagal!',
				'action'	=> site_url('kwaran')
			));
		}
	}


	public function potensi($id_kwaran)
	{	
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
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
			'gudep'			=> $this->M_kwaran->getGudep($id_kwaran)->num_rows(),
			'anggota'		=> $this->M_master->getWhere('tb_anggota',['id_kwaran' => $id_kwaran],$order)->num_rows(),
			'pangkalan'		=> $this->M_master->getWhere('tb_pangkalan',['kwaran' => $id_kwaran],$order)->num_rows(),
			'siaga'			=> $this->M_master->getWhere('tb_anggota',['golongan' => 'siaga','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'penggalang'	=> $this->M_master->getWhere('tb_anggota',['golongan' => 'penggalang','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'penegak'		=> $this->M_master->getWhere('tb_anggota',['golongan' => 'penegak','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'pandega'		=> $this->M_master->getWhere('tb_anggota',['golongan' => 'pandega','id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kmd'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kmd' ,'id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kml'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kml' ,'id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kpd'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kpd' ,'id_kwaran' => $id_kwaran],$order)->num_rows(),
			'kpl'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'kpl' ,'id_kwaran' => $id_kwaran],$order)->num_rows(),
			'non'			=> $this->M_master->getWhere('tb_anggota',['tingkat ' => 'NK' ,'id_kwaran' => $id_kwaran],$order)->num_rows(),
			'sub_siaga'		=> $this->_get_tingkat_kwaran('siaga',$id_kwaran),
			'sub_penggalang'=> $this->_get_tingkat_kwaran('penggalang',$id_kwaran),
			'sub_penegak'	=> $this->_get_tingkat_kwaran('penegak',$id_kwaran),
			'sub_pandega'	=> $this->_get_tingkat_kwaran('pandega',$id_kwaran),
			'id_kwaran'		=> $id_kwaran 
		];
		
		return $data;
	}

	/*get tingkat*/
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
}

/* End of file Kwaran.php */
/* Location: ./application/modules/kwaran/controllers/Kwaran.php */