<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class M_pangkalan extends CI_Model {

	function getall()
	{
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_pangkalan.kwaran');
		return $this->db->get('tb_pangkalan')->result();
	}

	function getpangkalan($where)
	{
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_pangkalan.kwaran');
		$this->db->where($where);
		return $this->db->get('tb_pangkalan');
	}	

	function getJumlahAnggota($where)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->where($where);
		return $this->db->get('tb_anggota');
	}

	function potensi_muda($id_pangkalan,$param)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->where('golongan', $param);
		return $this->db->get('tb_anggota');
	}

	function potensi_dewasa($id_pangkalan,$param)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->where('tingkat', $param);
		return $this->db->get('tb_anggota');
	}

	function tingkat($id_pangkalan,$param)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->where('tingkat', $param);
		return $this->db->get('tb_anggota');
	}

	function excel($pangkalan)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Asal Kwaran');
		$sheet->setCellValue('C1', 'Nama Pangkalan');
		$sheet->setCellValue('D1', 'Alamat');
		$sheet->setCellValue('E1', 'Ka Mabigus');
		$sheet->setCellValue('F1', 'Ka gudep');
		$sheet->setCellValue('G1', 'Jumlah Pembina');

		$no = 1;
		$x = 2;
		foreach($pangkalan as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_kwaran);
			$sheet->setCellValue('C'.$x, $row->nama_pangkalan);
			$sheet->setCellValue('D'.$x, $row->alamat_pangkalan);
			$sheet->setCellValue('E'.$x, $row->kamabigus);
			$sheet->setCellValue('F'.$x, $row->kagudep);
			$sheet->setCellValue('G'.$x, $row->jumlah_pembina);
			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'Rekap Pangkalan';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	function import_pangkalan()
	{
		$pang 	= [];
		$no 	= 0 ;
		$nama_file = uniqid().".xls";

		$cek = $this->_proses_import($nama_file);
		if (!$cek) {
			$data = $this->db->get_where('tb_pangkalan_sementara', ['petugas' => $this->session->userdata('ses_id')])->result();
			foreach ($data as $dat) {
			    $pang[$no] = [
			    	'nama_pangkalan'	=> $dat->nama_pangkalan,
			    	'alamat_pangkalan'	=> $dat->alamat_pangkalan,
			    	'kwaran'			=> $dat->kwaran,
			    	'desa'				=> $dat->desa,
			    	'created_date'		=> $dat->created_date,
			    	'kamabigus'			=> $dat->kamabigus,
			    	'kagudep'			=> $dat->kagudep,
			    	'jumlah_pembina'	=> $dat->jumlah_pembina,
			    	'petugas'			=> $dat->petugas,
			    ];
			    $no++;
			}
			$this->db->insert_batch('tb_pangkalan', $pang);

			$this->db->where('petugas', $this->session->userdata('ses_id'));
			$this->db->delete('tb_pangkalan_sementara');

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
				'msg'			=> 'NO KWARAN Tidak Boleh Kosong, Silahkan Periksa Data Anda dan Ulangi Prosesnya,.'
			];
		}

	}


	private function _proses_import($nama_file)
	{
		$config['upload_path']          = './excel/';
		$config['allowed_types']        = 'xls|xlsx';
		$config['max_size']             = 5000;
		$config['file_name']           	= $nama_file;
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
				if ($this->session->userdata('ses_level') != 1) {
					$data = [
						'nama_pangkalan' 	=> $worksheet[$i][0],
						'alamat_pangkalan'	=> $worksheet[$i][1],
						'kwaran' 			=> $this->session->userdata('ses_kwaran'),
						'kamabigus' 		=> $worksheet[$i][2],
						'kagudep' 			=> $worksheet[$i][3],
						'jumlah_pembina'	=> $worksheet[$i][4],
						'petugas'			=> $this->session->userdata('ses_id')
					];
				}
				else
				{
					$data = [
						'nama_pangkalan' 	=> $worksheet[$i][0],
						'alamat_pangkalan'	=> $worksheet[$i][1],
						'kwaran' 			=> $worksheet[$i][2],
						'kamabigus' 		=> $worksheet[$i][3],
						'kagudep' 			=> $worksheet[$i][4],
						'jumlah_pembina'	=> $worksheet[$i][5],
						'petugas'			=> $this->session->userdata('ses_id')
					];
				}
				
				if ($data['kwaran'] != null) {
					$this->M_master->input('tb_pangkalan_sementara',$data);
				}
				else
				{
					unlink($config['upload_path'].$nama_file); 
					
					//hapus data anggota sementara
					$this->db->where('petugas', $this->session->userdata('ses_id'));
					$this->db->delete('tb_pangkalan_sementara');

					return $cek = 1;
				}	

			}
		}
	}
}

/* End of file M_pangkalan.php */
/* Location: ./application/modules/pangkalan/models/M_pangkalan.php */