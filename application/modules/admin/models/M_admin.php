<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
}

/* End of file M_admin.php */
/* Location: ./application/modules/admin/models/M_admin.php */