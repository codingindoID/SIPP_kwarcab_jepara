<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_cari');
	}

	public function hasil()
	{	
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$param = $this->input->post('cari');

		$data = [
			'title'			=> 'Beranda',
			'sub'			=> '',
			'button_menu'	=> '',
			'anggota'		=> $this->M_cari->getData($param)->result()

		];


		//echo json_encode($data);
		$this->template->load('tema/index','index',$data);
	}


}

/* End of file Cari.php */
/* Location: ./application/modules/cari/controllers/Cari.php */