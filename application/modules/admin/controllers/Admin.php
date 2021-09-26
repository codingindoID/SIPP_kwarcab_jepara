<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_admin');
	}
	public function admin_kwaran()
	{
		$level = $this->session->userdata('ses_level');
		if ( $level != '1') {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];
		$button = '
		<a href="'.site_url('admin/export_admin/kwaran').'" class="btn-sm btn-white btn-border btn-round mr-2"><i class="fa fa-file-excel"></i> Export Excel</a>
		<a href="#modal_add" data-toggle="modal" class="btn-sm btn-white btn-border btn-round mr-2" id="tambah_data"><i class="fa fa-plus"></i> Tambah Admin</a>
		';

		$data = [
			'title'			=> 'Admin',
			'sub'			=> 'Rekap Admin Kwaran',
			'menu'			=> 'admin_kwaran',
			'button_menu'	=> $button,
			'kwaran'		=> $this->M_master->getall('tb_kwaran', $order)->result(),
			'admin'			=> $this->M_admin->getAdminKwaran()->result(),
		];

		$this->template->load('tema/index','admin_kwaran',$data);
	}

	public function admin_gudep()
	{
		$akses 		= ["1","2"];
		$level 		= $this->session->userdata('ses_level');
		$id_data 	= $this->session->userdata('ses_id');
		if (in_array($level,$akses,true) ) {
			$order = [
				'kolom'		=> 'created_date',
				'urutan'	=> 'desc'
			];
			$button = '
			<a href="'.site_url('admin/export_admin/gudep').'" class="btn-sm btn-white btn-border btn-round mr-2"><i class="fa fa-file-excel"></i> Export Excel</a>
			<a href="#modal_add" data-toggle="modal" class="btn-sm btn-white btn-border btn-round mr-2" id="tambah_data"><i class="fa fa-plus"></i> Tambah Admin</a>';

			/*kondisi berdasarkan level admin*/
			if ($level == 1) {
				$where = [
					'level'  => 3
				];

				$pangkalan = $this->M_master->getall('tb_pangkalan',$order)->result();
			}
			else
			{
				$id_kwaran 	= $this->db->get_where('tb_user',['id_user' => $id_data])->row()->id_kwaran;
				$where = [
					'level'  	=> 3,
					'kwaran'	=> $id_kwaran
				];

				$pangkalan = $this->M_master->getWhere('tb_pangkalan',['kwaran' => $id_kwaran], $order)->result();

			}

			$data = [
				'title'			=> 'Admin',
				'sub'			=> 'Rekap Admin Gudep',
				'menu'			=> 'admin_gudep',
				'button_menu'	=> $button,
				'pangkalan'		=> $pangkalan,
				'admin'			=> $this->M_admin->getAdminGudep($where)->result(),
			];

			$this->template->load('tema/index','admin_gudep',$data);
		}else{
			redirect('auth','refresh');
		}
		
	}


	function tambah_admin($asal = null)
	{
		if ($this->session->userdata('ses_level') == null) {
			redirect('auth','refresh');
		}

		$cek_username = $this->M_admin->cek_username();
		if ($cek_username > 0) {
			$this->session->set_flashdata('error', 'Username Telah Terdaftar');
			if ($asal == 'kwaran') {
				redirect('admin/admin_kwaran','refresh');
			}
			else
			{
				redirect('admin/admin_gudep','refresh');
			}
		}
		else
		{
			$cek = $this->M_admin->tambah_admin();
			if ($cek['success']) {
				$this->session->set_flashdata('success', 'Admin Berhasil Ditambah');
			}
			else
			{
				$this->session->set_flashdata('error', 'Admin Gagal Ditambahkan');
			}
			redirect($cek['action'],'refresh');
		}
	}

	function detil_admin($jenis,$id)
	{
		$akses = ["1","2","3"];
		$level = $this->session->userdata('ses_level');
		if (in_array($level,$akses,true) ) {
			$order = [
				'kolom'		=> 'created_date',
				'urutan'	=> 'desc'
			];

			$button = '<button style="cursor:pointer" class="btn-sm btn-white btn-border btn-round mr-2" btn-success" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</button>';

			if ($jenis == 2) {
				$detil       = $this->M_admin->getAdminKwaranByID($id)->row();
				$data = [
					'title'			=> 'Admin',
					'sub'			=> 'Rekap Admin Kwaran',
					'menu'			=> 'admin_kwaran',
					'button_menu'	=> $button,
					'kwaran'		=> $this->M_master->getall('tb_kwaran', $order)->result(),
					'user'			=> $detil
				];
				$this->template->load('tema/index','edit_admin_kwaran',$data);
			}
			else
			{
				$detil       = $this->M_admin->getAdminPangkalanByID($id)->row();
				$data = [
					'title'			=> 'Admin',
					'sub'			=> 'Rekap Admin Kwaran',
					'menu'			=> 'admin_kwaran',
					'button_menu'	=> $button,
					'pangkalan'		=> $this->M_master->getall('tb_pangkalan', $order)->result(),
					'user'			=> $detil
				];
				$this->template->load('tema/index','edit_admin_gudep',$data);
			}
		}
		else
		{
			redirect('auth','refresh');
		}
	}

	function update_admin()
	{
		$akses = ["1","2","3"];
		$level = $this->session->userdata('ses_level');
		if (in_array($level,$akses,true) ) {

			$jenis = $this->input->post('jenis_admin');
			$where = ['id_user' => $this->input->post('id_user')];
			if ($jenis == 2) {
				$data = [
					'username'		=> $this->input->post('username'),
					'email'			=> $this->input->post('email'),
					'display_name'	=> $this->input->post('display_name'),
					'id_kwaran'		=> $this->input->post('id_kwaran'),
					'level'			=> '2',
				];

				$action = site_url('admin/admin_kwaran');
			}
			else
			{
				$data = [
					'username'		=> $this->input->post('username'),
					'email'			=> $this->input->post('email'),
					'display_name'	=> $this->input->post('display_name'),
					'id_pangkalan'	=> $this->input->post('id_pangkalan'),
					'level'			=> '3',
				];

				$action = site_url('admin/admin_gudep');
			}

			//update ke database
			$cek = $this->M_master->update('tb_user',$where,$data);
			if (!$cek) {
				echo json_encode(array(
					'success'	=> 1,
					'title'		=> 'Sukses',
					'message'	=> 'Admin Berhasil Diupdate',
					'icon'		=> 'success',
					'action'	=> $action
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
		}//end cek user
		else
		{
			redirect('auth','refresh');
		}

	}

	function updatepassword()
	{
		$akses = ["1","2"];
		$level = $this->session->userdata('ses_level');
		if (!in_array($level, $akses)) {
			redirect('auth','refresh');
		}

		$cek = $this->M_admin->updatepassword();
		echo json_encode($cek);
	}

	function hapus_admin()
	{
		if ($this->session->userdata('ses_level') == 4 ) {
			redirect('auth','refresh');
		}

		$where 	= ['id_user' => $this->input->post('id_user')];
		$jenis 	= $this->input->post('jenis_admin');
		if ($jenis == 2) {
			$action = site_url('admin/admin_kwaran');
		}
		else
		{
			$action = site_url('admin/admin_gudep');
		}

		$cek = $this->M_master->delete('tb_user',$where);
		if (!$cek) {
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Data Berhasil Dihapus',
				'icon'		=> 'success',
				'title'		=> 'Sukses!',
				'action'	=> $action
			));
		}
		else
		{
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'Gagal Hapus Data, Silahkan Ulangi Atau Gunakan Koneksi Yang Baik.',
				'icon'		=> 'error',
				'title'		=> 'Gagal!',
				'action'	=> $action
			));
		}
	}

	/*EXPORT*/
	function export_admin($param)
	{
		if ($this->session->userdata('ses_level') == null) {
			redirect('auth','refresh');
		}
		
		$this->M_admin->export($param);
	}
}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */