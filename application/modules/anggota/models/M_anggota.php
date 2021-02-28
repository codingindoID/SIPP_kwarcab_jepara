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
		$this->db->where('tb_anggota.id_kwaran', $id_kwaran);
		$this->db->order_by('tb_anggota.nama', 'asc');
		return $this->db->get('tb_anggota');
	}

	function getsemuaAnggota()
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');
		$this->db->order_by('tb_kwaran.nama_kwaran', 'asc');
		return $this->db->get('tb_anggota')->result();
	}

	function getsemuaAnggotaKwaran()
	{
		$id_kwaran = $this->session->userdata('ses_kwaran');

		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_anggota.id_kwaran');
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');
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
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');
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

	function get_anggota_byID($id_anggota)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_anggota.id_kwaran = tb_kwaran.id_kwaran');
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');
		$this->db->where('tb_anggota.id_anggota', $id_anggota);
		$this->db->order_by('tb_anggota.nama', 'asc');
		return $this->db->get('tb_anggota');
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
		if ($this->session->userdata('ses_pangkalan') != 'admin') {
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
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.kecamatan');
		$this->db->join('tb_desa', 'tb_desa.id_desa = tb_anggota.desa');
		$this->db->where('id_anggota', $id);
		return $this->db->get('tb_anggota')->row();
	}

	function update_anggota()
	{
		$data = [
			'id_kwaran'     => $this->input->post('kwaran'),
			'id_gudep'  	=> $this->input->post('gudep') ,
			'nama' 			=> $this->input->post('nama'),
			'tempat_lahir'  => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
			'alamat' 		=> $this->input->post('alamat'),
			'gol_darah' 	=> $this->input->post('darah'),
			'golongan' 		=> $this->input->post('golongan'),
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
			$alamat = $row->nama_desa.' , RT : '.$row->rt.' / RW : '.$row->rw . ' , ' . $row->nama_kecamatan; 

			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_kwaran);
			$sheet->setCellValue('C'.$x, $row->nama_pangkalan);
			$sheet->setCellValue('D'.$x, $row->nama);
			$sheet->setCellValue('E'.$x, $row->kta);
			$sheet->setCellValue('F'.$x, $alamat);
			$sheet->setCellValue('G'.$x, $row->tempat_lahir);
			$sheet->setCellValue('H'.$x, $this->_set_tanggal($row->tanggal_lahir));
			$sheet->setCellValue('I'.$x, $row->gol_darah);
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
}

/* End of file M_anggota.php */
/* Location: ./application/modules/anggota/models/M_anggota.php */