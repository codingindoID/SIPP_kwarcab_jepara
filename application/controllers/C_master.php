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

	function ajax_gudep($id_kwaran)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->join('tb_gudep', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
		$this->db->where('id_kwaran', $id_kwaran);
		$data =  $this->db->get('tb_kwaran')->result();

		echo json_encode($data);
	}


}

/* End of file C_master.php */
/* Location: ./application/controllers/C_master.php */