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
}

/* End of file M_pangkalan.php */
/* Location: ./application/modules/pangkalan/models/M_pangkalan.php */