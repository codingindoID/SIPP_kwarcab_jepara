<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class M_admin extends CI_Model {

	function getAdminKwaran()
	{
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_user.id_kwaran');
		$this->db->order_by('nama_kwaran', 'asc');
		$this->db->where('level', ADMIN_KWARAN);
		return $this->db->get('tb_user');
	}

	function getAdminGudep($where)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_user.id_pangkalan');
		$this->db->where($where);
		return $this->db->get('tb_user');
	}	


	function getAdminKwaranByID($id)
	{
		$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_user.id_kwaran');
		$this->db->where('level', '2');
		$this->db->where('id_user',$id);
		return $this->db->get('tb_user');
	}	

	function getAdminPangkalanByID($id)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_user.id_pangkalan');
		$this->db->where('level', '3');
		$this->db->where('id_user',$id);
		return $this->db->get('tb_user');
	}	

	function cek_username()
	{
		$username = $this->input->post('username');

		return $this->db->get_where('tb_user', ['username' => $username])->num_rows();
	}

	function tambah_admin()
	{
		$level = $this->session->userdata('ses_level');
		$jenis = $this->input->post('jenis_admin');
		if ($jenis == 2) {
			$data = [
				'username'		=> $this->input->post('username'),
				'email'			=> $this->input->post('email'),
				'display_name'	=> $this->input->post('display_name'),
				'id_kwaran'		=> $this->input->post('kwaran'),
				'level'			=> '2',
				'password'		=> md5(12345)
			];

			$action = 'admin/admin_kwaran';
		}
		else
		{
			$data = [
				'username'		=> $this->input->post('username'),
				'email'			=> $this->input->post('email'),
				'display_name'	=> $this->input->post('display_name'),
				'id_pangkalan'	=> $this->input->post('pangkalan'),
				'level'			=> '3',
				'password'		=> md5(12345)
			];

			$action = 'admin/admin_gudep';
		}		

		$cek = $this->db->insert('tb_user', $data);
		if ($cek) {
			$res = [
				'success'	=> 1,
				'action'	=> $action
			];
		}
		else
		{
			$res = [
				'success'	=> 0,
				'action'	=> $action
			];
		}
		return $res;
	}


	/*Export*/
	function export($jenis)
	{
		if ($jenis == 'kwaran') {
			$where = [
				'level'		=> 2
			];

			$this->db->join('tb_kwaran', 'tb_kwaran.id_kwaran = tb_user.id_kwaran');
			$this->db->where($where);
			$data = $this->db->get('tb_user')->result();

			$this->excel_kwaran($data);
		}
		else if($jenis == 'gudep')
		{
			if ($this->session->userdata('ses_level') == 1) {
				$where = [
					'level'		=> 3
				];
				$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_user.id_pangkalan');
				$this->db->where($where);
			}
			else
			{
				$where = [
					'level'						=> 3,
					'tb_pangkalan.kwaran'		=> $this->session->userdata('ses_kwaran')
				];
				$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_user.id_pangkalan');
				$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
				$this->db->where($where);

			}

			
			$data = $this->db->get('tb_user')->result();
			//echo json_encode($data);
			$this->excel_gudep($data);
		}
	}

	function excel_kwaran($data)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Asal Kwaran');
		$sheet->setCellValue('C1', 'Email');
		$sheet->setCellValue('D1', 'Username');
		$sheet->setCellValue('E1', 'Password ( Jika Belum Diganti )');

		$no = 1;
		$x = 2;
		foreach($data as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_kwaran);
			$sheet->setCellValue('C'.$x, $row->email);
			$sheet->setCellValue('D'.$x, $row->username);
			$sheet->setCellValue('E'.$x, '12345');
			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'Rekap Admin Kwaran ';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	function excel_gudep($data)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Asal Pangkalan');
		$sheet->setCellValue('C1', 'Email');
		$sheet->setCellValue('D1', 'Username');
		$sheet->setCellValue('E1', 'Password ( Jika Belum Diganti )');

		$no = 1;
		$x = 2;
		foreach($data as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_pangkalan);
			$sheet->setCellValue('C'.$x, $row->email);
			$sheet->setCellValue('D'.$x, $row->username);
			$sheet->setCellValue('E'.$x, '12345');
			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'Rekap Admin Gudep ';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	function updatepassword()
	{
		$data 	= ['password' 	=> md5($this->input->post('password'))];
		$jenis 	= $this->input->post('jenis_admin');
		
		if ($jenis == 2) {
			$action = site_url('admin/admin_kwaran');
		}
		else
		{
			$action = site_url('admin/admin_gudep');
		}

		//update ke database
		$this->db->where('id_user', $this->input->post('id_user'));
		$cek = $this->db->update('tb_user',$data);
		if ($cek) {
			$res = [
				'success'	=> 1,
				'title'		=> 'Sukses',
				'message'	=> 'Password Berhasil Diupdate',
				'icon'		=> 'success',
				'action'	=> $action
			];
		}
		else
		{
			$res = [
				'success'	=> 0,
				'title'		=> 'Gagal',
				'message'	=> 'Gagal Update, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik',
				'icon'		=> 'error'
			];
		}
		return $res;		
	}
}

/* End of file M_admin.php */
/* Location: ./application/modules/admin/models/M_admin.php */