<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_master extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
	}

	public function get_kwaran()
	{

		$order = [
			'kolom'		=> 'nama_kwaran',
			'urutan'	=> 'asc'
		];

		$data =	$this->M_master->getall('tb_kwaran',$order)->result();

		echo json_encode($data);
	}

}

/* End of file C_master.php */
/* Location: ./application/controllers/C_master.php */