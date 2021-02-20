<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pangkalan extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_pangkalan');
	}
	public function index()
	{
		$level = $this->session->userdata('ses_level');
		$akses = ['1','2'];
		$button = '';

		if ($level == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		if (in_array($level, $akses, true)) {
			$button = '
			<a href="'.site_url('pangkalan/excel').'" class="btn-sm btn-danger btn-round"><i class="fas fa-file-import"></i> Export Excel</a>
			<a href="'.site_url('pangkalan/import').'" class="btn-sm btn-success btn-round" accept=".xls , .xlsx"><i class="fas fa-file-import"></i> Import Excel</a>
			<a href="#modal_add" data-toggle="modal" class="btn-sm btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i> Tambah Pangkalan</a>';
		}
		

		$data = [
			'title'			=> 'Pangkalan',
			'sub'			=> 'Master data Pangkalan',
			'menu'			=> 'pangkalan',
			'button_menu'	=> $button,
			'pangkalan'		=> $this->M_master->getall('tb_pangkalan',$order)->result(),
			'kwaran'		=> $this->M_master->getall('tb_kwaran',$order)->result(),
		];
		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function tambah_pangkalan()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = [
			'nama_pangkalan'	=> $this->input->post('nama_pangkalan') ,
			'alamat_pangkalan'	=> $this->input->post('alamat') ,
			'kwaran'			=> $this->input->post('kwaran') ,
			'kamabigus'			=> $this->input->post('kamabigus') ,
			'kagudep'			=> $this->input->post('kagudep') ,
			'jumlah_pembina'	=> $this->input->post('jumlah_pembina') 
		];

		$cek = $this->M_master->input('tb_pangkalan',$data);
		if (!$cek) {
			echo json_encode(array(
				'success'	=> 1,
				'title'		=> 'Sukses',
				'message'	=> 'Pangkalan Berhasil Ditambahkan',
				'icon'		=> 'success',
				'action'	=> site_url('pangkalan')
			));
		}
		else
		{
			echo json_encode(array(
				'success'	=> 0,
				'title'		=> 'Gagal',
				'message'	=> 'Gagal Input, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik',
				'icon'		=> 'error'
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

		$data = $this->M_master->getWhere('tb_pangkalan',['id_pangkalan' => $id], $order)->row();
		echo json_encode($data);
	}

	function update_pangkalan()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = [
			'nama_pangkalan'	=> $this->input->post('nama_pangkalan') ,
			'alamat_pangkalan'	=> $this->input->post('alamat') ,
			'kwaran'			=> $this->input->post('kwaran') ,
			'kamabigus'			=> $this->input->post('kamabigus') ,
			'kagudep'			=> $this->input->post('kagudep') ,
			'jumlah_pembina'	=> $this->input->post('jumlah_pembina') 
		];

		$where = ['id_pangkalan' => $this->input->post('id_pangkalan') ];

		$cek = $this->M_master->update('tb_pangkalan',$where,$data);
		if (!$cek) {
			echo json_encode(array(
				'success'	=> 1,
				'title'		=> 'Sukses',
				'message'	=> 'Pangkalan Berhasil Diupdate',
				'icon'		=> 'success',
				'action'	=> site_url('pangkalan')
			));
		}
		else
		{
			echo json_encode(array(
				'success'	=> 0,
				'title'		=> 'Gagal',
				'message'	=> 'Gagal Update, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik',
				'icon'		=> 'error'
			));
		}
	}

	function lihat($id,$jumlah_pembina)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

		$data = [
			'title'			=> 'Pangkalan',
			'sub'			=> 'Detil Pangkalan',
			'menu'			=> 'pangkalan',
			'button_menu'	=> $button,
			'pangkalan'		=> $this->M_pangkalan->getpangkalan(['id_pangkalan' => $id])->row(),
			'siaga'			=> $this->M_pangkalan->potensi_muda($id,'siaga')->num_rows(),
			'penggalang'	=> $this->M_pangkalan->potensi_muda($id,'penggalang')->num_rows(),
			'penegak'		=> $this->M_pangkalan->potensi_muda($id,'penegak')->num_rows(),
			'pandega'		=> $this->M_pangkalan->potensi_muda($id,'pandega')->num_rows(),
			'kmd'			=> $this->M_pangkalan->potensi_dewasa($id,'kmd')->num_rows(),
			'kml'			=> $this->M_pangkalan->potensi_dewasa($id,'kml')->num_rows(),
			'kpd'			=> $this->M_pangkalan->potensi_dewasa($id,'kpd')->num_rows(),
			'kpl'			=> $this->M_pangkalan->potensi_dewasa($id,'kpl')->num_rows(),
			'non'			=> $this->M_pangkalan->potensi_dewasa($id,'NK')->num_rows(),
			'sub_siaga'		=> $this->_get_tingkat($id,'siaga'),
			'sub_penggalang'=> $this->_get_tingkat($id,'penggalang'),
			'sub_penegak'	=> $this->_get_tingkat($id,'penegak'),
			'sub_pandega'	=> $this->_get_tingkat($id,'pandega'),
			'anggota'		=> $this->M_pangkalan->getJumlahAnggota(['tb_pangkalan.id_pangkalan' => $id])->num_rows(),
			'jumlah_pembina'=> $jumlah_pembina
		];
		//echo json_encode($data['sub_pandega']);
		$this->template->load('tema/index','detil_pangkalan',$data);
	}

	/*get tingkat*/
	private function _get_tingkat($id,$param)
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

		$tingkat = $this->M_master->getWhere('tb_tingkatan',['tingkat' => $param], $order)->result();

		$no  = 1;
		$data = array();
		foreach ($tingkat as $t) {
			$data[$no] = [
				'tingkat'	=> $t->sub_tingkat,
				'jumlah' 	=> $this->M_pangkalan->tingkat($id,$t->sub_tingkat)->num_rows()
			];
			$no++;
		}

		return $data;
	}


	function hapus_pangkalan($id)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$cek = $this->M_master->delete('tb_pangkalan',['id_pangkalan' => $id]);
		if (!$cek) {
			$this->db->delete('tb_gudep',['id_pangkalan' => $id]);
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Data Berhasil Dihapus',
				'icon'		=> 'success',
				'title'		=> 'Sukses!',
				'action'	=> site_url('pangkalan')
			));
		}
		else
		{
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Gagal Hapus Data, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik.',
				'icon'		=> 'error',
				'title'		=> 'Gagal!',
				'action'	=> site_url('pangkalan')
			));
		}
	}


	function regional()
	{
		$id_data = $this->session->userdata('ses_id');
		if ($id_data == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'nama_pangkalan',
			'urutan'	=> 'asc'
		];

		$button = '<a href="'.site_url('pangkalan/import').'" class="btn-sm btn-success btn-round" accept=".xls , .xlsx"><i class="fas fa-file-import"></i> Import Excel</a>
		<a href="#modal_add" data-toggle="modal" class="btn-sm btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i> Tambah Pangkalan</a>';

		$detil_user = $this->db->get_where('tb_user',['id_user' => $id_data])->row();
		$kwaran 	= $detil_user->id_kwaran;
		$pangkalan = $this->M_master->getWhere('tb_pangkalan',['kwaran' => $kwaran], $order)->result();

		$data = [
			'title'			=> 'Pangkalan',
			'sub'			=> 'Pangkalan Regional',
			'menu'			=> 'pangkalan_regional',
			'button_menu'	=> $button,
			'pangkalan'		=> $pangkalan,
			'kwaran'		=> $kwaran
		];

		$this->template->load('tema/index','pangkalan_regional',$data);
	}

	function regional_admin($id_kwaran)
	{
		$order = [
			'kolom'		=> 'nama_pangkalan',
			'urutan'	=> 'asc'
		];

		$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

		$pangkalan = $this->M_master->getWhere('tb_pangkalan',['kwaran' => $id_kwaran], $order)->result();

		$data = [
			'title'			=> 'Pangkalan',
			'sub'			=> 'Pangkalan Regional',
			'menu'			=> 'pangkalan_regional',
			'button_menu'	=> $button,
			'pangkalan'		=> $pangkalan
		];

		$this->template->load('tema/index','pangkalan_regional',$data);
	}


	/*IMPORT EXCEL*/
	function import()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'nama_kwaran',
			'urutan'	=> 'asc'
		];

		$button = '<a href="'.base_url('excel/pangkalan/master_pangkalan.xlsx').'" class="btn-sm btn-success btn-round"><i class="fas fa-file-download"></i> Download Format</a>';
		$data = [
			'title'			=> 'Pangkalan',
			'sub'			=> 'Master data Pangkalan',
			'menu'			=> 'pangkalan',
			'button_menu'	=> $button,
			'kwaran'		=> $this->M_master->getall('tb_kwaran',$order)->result()
		];
		$this->template->load('tema/index','import',$data);
	}

	function excel()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$pangkalan = $this->M_pangkalan->getall();
		//echo json_encode($pangkalan);
		$this->M_pangkalan->excel($pangkalan);
	}

	function upload()
	{
		$config['upload_path']          = './excel/';
		$config['allowed_types']        = 'xls|xlsx';
		$config['max_size']             = 5000;
		$config['file_name']           	= uniqid().".xls";
		$this->load->library('upload', $config);
		$this->upload->overwrite = true;

		if ( ! $this->upload->do_upload('file')){
			$response = $this->upload->display_errors();
			$this->session->set_flashdata('error', $response);
			redirect('pangkalan','refresh');
		}else{
			//proses import
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($config['upload_path'].$config['file_name']);
			$worksheet = $spreadsheet->getActiveSheet()->toArray();

			for ($i=1; $i < count($worksheet) ; $i++) { 
				$data = [
					'nama_pangkalan' 	=> $worksheet[$i][0],
					'alamat_pangkalan'	=> $worksheet[$i][1],
					'kwaran' 			=> $worksheet[$i][2],
					'kamabigus' 		=> $worksheet[$i][3],
					'kagudep' 			=> $worksheet[$i][4],
					'jumlah_pembina'	=> $worksheet[$i][5],
				];

				$this->M_master->input('tb_pangkalan',$data);
			}
			unlink($config['upload_path'].$config['file_name']); 
			$this->session->set_flashdata('success', 'Data Berhasil Diimport');
			redirect('pangkalan','refresh');
		}
	}
	
}

/* End of file Pangkalan.php */
/* Location: ./application/modules/pangkalan/controllers/Pangkalan.php */