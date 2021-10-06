<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_profil');
	}
	public function index()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = [
			'title'			=> 'Profil',
			'sub'			=> 'Detil Profil',
			'menu'			=> 'profil',
			'button_menu'	=> '',
			'profil'		=> $this->M_profil->getProfil()
		];

		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}

	function updatepassword()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data 		= ['password' => md5($this->input->post('password'))];
		$id_user 	= $this->session->userdata('ses_id');
		$level 		= $this->session->userdata('ses_level');

		if ($level == 4) {
			$cek = $this->M_master->update('tb_anggota',['id_anggota' => $id_user],$data);
		}
		else
		{
			$cek = $this->M_master->update('tb_user',['id_user' => $id_user],$data);
		}

		//update ke database
		if (!$cek) {
			echo json_encode(array(
				'success'	=> 1,
				'title'		=> 'Sukses',
				'message'	=> 'Password Berhasil Diupdate, Data Akan Berubah Setelah Anda Login Ulang',
				'icon'		=> 'success'
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

	function update()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}
		
		$id_user 	= $this->session->userdata('ses_id');
		$level 		= $this->session->userdata('ses_level');
		$data 		= [
			'username' 		=> $this->input->post('username'),
			'email' 		=> $this->input->post('email'),
			'display_name'  => $this->input->post('display')
		];

		$cek = $this->M_master->update('tb_user',['id_user' => $id_user],$data);

		//update ke database
		if (!$cek) {
			echo json_encode(array(
				'success'	=> 1,
				'title'		=> 'Sukses',
				'message'	=> 'Password Berhasil Diupdate, Data Akan Berubah Setelah Anda Login Ulang',
				'icon'		=> 'success'
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

}

/* End of file Profil.php */
/* Location: ./application/modules/profil/controllers/Profil.php */