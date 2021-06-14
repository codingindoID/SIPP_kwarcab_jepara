<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class M_anggota extends CI_Model {
	function getall($table)
	{
		return $this->db->get($table);
	}

	function get_anggota($id_kwaran)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		
		if ($id_kwaran != 'semua') {
			$this->db->where('tb_anggota.id_kwaran', $id_kwaran);
		}
		
		$this->db->order_by('tb_anggota.nama', 'asc');
		return $this->db->get('tb_anggota');
	}

	function getsemuaAnggota()
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		/*$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');*/
		$this->db->order_by('tb_kwaran.nama_kwaran', 'asc');
		return $this->db->get('tb_anggota')->result();
	}

	function getsemuaAnggotaKwaran()
	{
		$id_kwaran = $this->session->userdata('ses_kwaran');

		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		/*$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');*/
		$this->db->where('tb_anggota.id_kwaran', $id_kwaran);
		$this->db->order_by('tb_kwaran.nama_kwaran', 'asc');
		return $this->db->get('tb_anggota')->result();
	}

	function getsemuaAnggotaGudep()
	{
		$id_pangkalan = $this->session->userdata('ses_pangkalan');

		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		/*$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');*/
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->order_by('tb_kwaran.nama_kwaran', 'asc');
		return $this->db->get('tb_anggota')->result();
	}

	function get_anggota_gudep($id_pangkalan)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		return $this->db->get('tb_anggota');
	}

	function getTahunAjaran()
	{
		$level = $this->session->userdata('ses_level');

		switch ($level) {
			case ADMIN:
			$id_pangkalan = $_POST['pangkalan_bulk'];
			break;

			case ADMIN_KWARAN:
			$id_pangkalan = $_POST['pangkalan_bulk'];
			break;

			default:
			$id_pangkalan = $this->session->userdata('ses_pangkalan');
			break;
		}


		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->group_by('ta');
		return $this->db->get('tb_anggota')->result();
	}


	function getPangkalanBulk()
	{
		$level = $this->session->userdata('ses_level');

		$this->db->order_by('nama_pangkalan', 'asc');

		switch ($level) {
			case ADMIN:
			$data = $this->db->get('tb_pangkalan')->result();
			break;

			case ADMIN_KWARAN:
			$data = $this->db->get_where('tb_pangkalan',['kwaran' => $this->session->userdata('ses_kwaran')])->result();
			break;

			default:
			$data = '';
			break;
		}

		return $data;
	}


	function bulkHapus()
	{
		$level 	= $this->session->userdata('ses_level');
		$ta 	= $_POST['ta_bulk'];

		switch ($level) {
			case ADMIN:
			$pang = $this->db->get_where('tb_gudep', ['id_pangkalan' => $_POST['pangkalan_bulk']])->result();
			$arr = array_column($pang,'id_gudep');

			$this->db->where('ta', $ta);
			$this->db->where_in('id_gudep', $arr);
			$cek = $this->db->delete('tb_anggota');
			break;

			case ADMIN_KWARAN:
			$pang = $this->db->get_where('tb_gudep', ['id_pangkalan' => $_POST['pangkalan_bulk']])->result();
			$arr = array_column($pang,'id_gudep');

			$this->db->where('ta', $ta);
			$this->db->where_in('id_gudep', $arr);
			$cek = $this->db->delete('tb_anggota');
			break;

			case ADMIN_GUDEP:
			$pang = $this->db->get_where('tb_gudep', ['id_pangkalan' => $this->session->userdata('ses_pangkalan')])->result();
			$arr = array_column($pang,'id_gudep');

			$this->db->where('ta', $ta);
			$this->db->where_in('id_gudep', $arr);
			$cek = $this->db->delete('tb_anggota');
			break;	

			default:
			break;
		}

		if ($cek) {
			return 1;
		}
	}

	function get_anggota_byID($id_anggota)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_anggota.id_kwaran = tb_kwaran.id_kwaran');
		/*$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');*/
		$this->db->where('tb_anggota.id_anggota', $id_anggota);
		$this->db->order_by('tb_anggota.nama', 'asc');
		return $this->db->get('tb_anggota');
	}	

	function alamat()
	{
		$desa 		= $this->db->get_where('tb_desa', ['id_desa' => $_POST['desa']])->row();
		$kecamatan  = $this->db->get_where('tb_kecamatan', ['id_kecamatan' => $_POST['kecamatan']])->row();
		$rt 		= $_POST['rt'];
		$rw 		= $_POST['rw'];

		$alamat 	= $desa->nama_desa." , RT : ". $rt ." / RW : " . $rw ." , kecamatan ". $kecamatan->nama_kecamatan;
		$alamat 	= strtoupper($alamat);

		return $alamat; 
	}

	function get_potensi_anggota($where)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_anggota.id_kwaran = tb_kwaran.id_kwaran');
		$this->db->where($where);
		$this->db->order_by('tb_anggota.nama', 'asc');
		return $this->db->get('tb_anggota');
	}	

	function getgudep($id_kwaran)
	{
		if ($this->session->userdata('ses_pangkalan') != 'admin' && $this->session->userdata('ses_pangkalan') != null) {
			$where = [
				'tb_gudep.id_pangkalan'		=> $this->session->userdata('ses_pangkalan'),
				'tb_pangkalan.kwaran'		=>  $id_kwaran
			];
		}
		else
		{
			$where = [
				'tb_pangkalan.kwaran'		=>  $id_kwaran
			];
		}

		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where($where);
		$this->db->order_by('tb_pangkalan.nama_pangkalan', 'asc');
		return $this->db->get('tb_gudep');
	}

	function getallGudep()
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->order_by('tb_pangkalan.nama_pangkalan', 'asc');
		return $this->db->get('tb_gudep');
	}	

	function getdetilanggota($id)
	{
		$this->db->where('id_anggota', $id);
		return $this->db->get('tb_anggota')->row();
	}

	function update_anggota()
	{
		$desa 		= $this->db->get_where('tb_desa', ['id_desa' => $_POST['desa']])->row();
		$kecamatan  = $this->db->get_where('tb_kecamatan', ['id_kecamatan' => $_POST['kecamatan']])->row();
		$rt 		= $_POST['rt'];
		$rw 		= $_POST['rw'];

		$alamat 	= $desa->nama_desa." , RT : ". $rt ." / RW : " . $rw ." , kecamatan ". $kecamatan->nama_kecamatan;
		$alamat 	= strtoupper($alamat);

		$darah = ($this->input->post('darah') == 'Tidak Tahu') ? 'Tidak Tahu' :  $this->input->post('darah');

		$data = [
			'id_kwaran'     => $this->input->post('kwaran'),
			'id_gudep'  	=> $this->input->post('gudep') ,
			'nama' 			=> $this->input->post('nama'),
			'tempat_lahir'  => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
			'alamat' 		=> $alamat,
			'rt' 			=> $this->input->post('rt'),
			'rw' 			=> $this->input->post('rw'),
			'desa' 			=> $this->input->post('desa'),
			'kecamatan' 	=> $this->input->post('kecamatan'),
			'gol_darah' 	=> $darah,
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
			'golongan_kpl' 	=> $this->input->post('golongan_kpl')
		];

		$where = ['id_anggota' => $this->input->post('id_anggota')];

		$this->db->where($where);
		$this->db->update('tb_anggota', $data);
	}


	function excel($anggota)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Asal Kwaran');
		$sheet->setCellValue('C1', 'Asal Pangkalan');
		$sheet->setCellValue('D1', 'Nama Anggota');
		$sheet->setCellValue('E1', 'No KTA');
		$sheet->setCellValue('F1', 'Alamat');
		$sheet->setCellValue('G1', 'Tempat Lahir');
		$sheet->setCellValue('H1', 'Tanggal Lahir');
		$sheet->setCellValue('I1', 'Golongan Darah');
		$sheet->setCellValue('J1', 'Golongan Kepramukaan');
		$sheet->setCellValue('K1', 'Tingkatan');
		$sheet->setCellValue('L1', 'tempat_kmd');
		$sheet->setCellValue('M1', 'tahun_kmd');
		$sheet->setCellValue('N1', 'golongan_kmd');
		$sheet->setCellValue('O1', 'tempat_kml');
		$sheet->setCellValue('P1', 'tahun_kml');
		$sheet->setCellValue('Q1', 'golongan_kml');
		$sheet->setCellValue('R1', 'tempat_kpd');
		$sheet->setCellValue('S1', 'tahun_kpd');
		$sheet->setCellValue('T1', 'golongan_kpd');
		$sheet->setCellValue('U1', 'tempat_kpl');
		$sheet->setCellValue('V1', 'tahun_kpl');
		$sheet->setCellValue('W1', 'golongan_kpl');

		$no = 1;
		$x = 2;
		foreach($anggota as $row)
		{
			//$alamat = $row->nama_desa.' , RT : '.$row->rt.' / RW : '.$row->rw . ' , ' . $row->nama_kecamatan; 

			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_kwaran);
			$sheet->setCellValue('C'.$x, $row->nama_pangkalan);
			$sheet->setCellValue('D'.$x, $row->nama);
			$sheet->setCellValue('E'.$x, $row->kta);
			$sheet->setCellValue('F'.$x, $row->alamat);
			$sheet->setCellValue('G'.$x, $row->tempat_lahir);
			$sheet->setCellValue('H'.$x, $this->_set_tanggal($row->tanggal_lahir));
			$sheet->setCellValue('I'.$x, $row->gol_darah == 'Tidak Tahu' ? '-' : $row->gol_darah );
			$sheet->setCellValue('J'.$x, $row->golongan);
			$sheet->setCellValue('K'.$x, $row->tingkat);
			$sheet->setCellValue('L'.$x, $row->tempat_kmd);
			$sheet->setCellValue('M'.$x, $this->_set_tahun($row->tahun_kmd));
			$sheet->setCellValue('N'.$x, $row->golongan_kmd);
			$sheet->setCellValue('O'.$x, $row->tempat_kml);
			$sheet->setCellValue('P'.$x, $this->_set_tahun($row->tahun_kml));
			$sheet->setCellValue('Q'.$x, $row->golongan_kml);
			$sheet->setCellValue('R'.$x, $row->tempat_kpd);
			$sheet->setCellValue('S'.$x, $this->_set_tahun($row->tahun_kpd));
			$sheet->setCellValue('T'.$x, $row->golongan_kpd);
			$sheet->setCellValue('U'.$x, $row->tempat_kpl);
			$sheet->setCellValue('V'.$x, $this->_set_tahun($row->tahun_kpl));
			$sheet->setCellValue('W'.$x, $row->golongan_kpl);
			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'Rekap Anggota ';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	private function _set_tanggal($tanggal)
	{
		if ($tanggal == null || $tanggal == '0000-00-00' || $tanggal == '') {
			$hasil = '-';
		}
		else
		{
			$hasil = date('d-m-Y', strtotime($tanggal));
		}

		return $hasil;
	}


	private function _set_tahun($tahun)
	{
		if ($tahun == null || $tahun == '' || $tahun == 0) {
			$hasil = '-';
		}
		else
		{
			$hasil = $tahun;
		}

		return $hasil;
	}


	function getanggotaKwaran()
	{
		$where = [
			'tb_anggota.id_kwaran'		=> $this->session->userdata('ses_kwaran')
		];

		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->order_by('nama_pangkalan', 'asc');
		return $this->db->get_where('tb_anggota', $where);
	}

	function getanggotaGudep()
	{
		$where = [
			'tb_pangkalan.id_pangkalan'	=> $this->session->userdata('ses_pangkalan')
		];

		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->order_by('nama_pangkalan', 'asc');
		return $this->db->get_where('tb_anggota', $where);
	}


	//import
	function proses_import()
	{
		$nama_file = uniqid().".xls";
		//cek jenis user		
		$cek = $this->_import_anggota($nama_file);

		if (!$cek) {
			$data = $this->db->get_where('tb_anggota_sementara', ['petugas' => $this->session->userdata('ses_id')])->result();
			$this->db->insert_batch('tb_anggota', $data);

			$this->db->where('petugas', $this->session->userdata('ses_id'));
			$this->db->delete('tb_anggota_sementara');

			unlink('./excel/'.$nama_file);

			return $res = [
				'success'		=> 1,
				'msg'			=> "berhasil import data"
			];
		}
		else
		{
			return $res = [
				'success'		=> 0,
				'msg'			=> 'ID Kwaran dan ID Gudep Tidak Boleh Kosong, Atau Nomor gudep yang anda masukkan salah , Silahkan Periksa Data Anda dan Ulangi Prosesnya,.'
			];
		}

	}

	private function _import_anggota($nama)
	{
		$cek = '';
		$config['upload_path']          = './excel/';
		$config['allowed_types']        = 'xls|xlsx';
		$config['max_size']             = 5000;
		$config['file_name']           	= $nama;
		$this->load->library('upload', $config);
		$this->upload->overwrite = true;

		if ( ! $this->upload->do_upload('file')){
			$response = $this->upload->display_errors();
			$this->session->set_flashdata('error', $response);
			redirect('anggota','refresh');
		}else{
		//proses import
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($config['upload_path'].$config['file_name']);
			$worksheet = $spreadsheet->getActiveSheet()->toArray();

			for ($i=1; $i < count($worksheet) ; $i++) { 
				$gudep 			= $this->db->get_where('tb_gudep', ['no_gudep' => sprintf('%02s',$worksheet[$i][0]).'.'.sprintf('%03s',$worksheet[$i][1]) ])->row();
				$id_gudep 		= $gudep->id_gudep;

				if ($id_gudep != null) {

					//proses insert jika inputan nomor gudep sudah benar
					$data = [
						'id_kwaran' 		=> $worksheet[$i][0],
						'id_gudep' 			=> $id_gudep,
						'ta' 				=> $worksheet[$i][2],
						'nama' 				=> $worksheet[$i][3],
						'tempat_lahir' 		=> $worksheet[$i][4],
						'tanggal_lahir' 	=> date('Y-m-d',strtotime($worksheet[$i][5])),
						'alamat'			=> $worksheet[$i][6],
						'gol_darah'			=> ($worksheet[$i][7] == '') ? 'Tidak Tahu' : $worksheet[$i][7] ,
						'golongan'			=> strtolower($worksheet[$i][8]),
						'tingkat'			=> strtolower($worksheet[$i][9]),
						'kta'				=> $worksheet[$i][10],
						'tempat_kmd'		=> $worksheet[$i][11],
						'tahun_kmd'			=> $worksheet[$i][12],
						'golongan_kmd'		=> $worksheet[$i][13],
						'tempat_kml'		=> $worksheet[$i][14],
						'tahun_kml'			=> $worksheet[$i][15],
						'golongan_kml'		=> $worksheet[$i][16],
						'tempat_kpd'		=> $worksheet[$i][17],
						'tahun_kpd'			=> $worksheet[$i][18],
						'golongan_kpd'		=> $worksheet[$i][19],
						'tempat_kpl'		=> $worksheet[$i][20],
						'tahun_kpl'			=> $worksheet[$i][21],
						'golongan_kpl'		=> $worksheet[$i][22],
						'petugas'			=> $this->session->userdata('ses_id')
					];

					if ($worksheet[$i][0] != null) {
						if ($worksheet[$i][1] != null) {
							$this->M_master->input('tb_anggota_sementara',$data);
						}
					}
					else
					{
						unlink($config['upload_path'].$config['file_name']); 
						//hapus data anggota sementara
						$this->db->where('petugas', $this->session->userdata('ses_id'));
						$this->db->delete('tb_anggota_sementara');

						$cek = 1;
					}	
				}
				else
				{
					//proses jika inputan nomor gudep salah
					unlink($config['upload_path'].$config['file_name']); 
					//hapus data anggota sementara
					$this->db->where('petugas', $this->session->userdata('ses_id'));
					$this->db->delete('tb_anggota_sementara');

					$cek = 1;
				}
			}
			return $cek;
		}
	}
}

/* End of file M_anggota.php */
/* Location: ./application/modules/anggota/models/M_anggota.php */