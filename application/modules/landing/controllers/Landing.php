<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_landing');
	}
	public function index()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = [
			'kwaran'		=> $this->db->get('tb_kwaran')->num_rows(),
			'gudep'			=> $this->db->get('tb_gudep')->num_rows(),
			'anggota'		=> $this->db->get('tb_anggota')->num_rows(),
			'pangkalan'		=> $this->db->get('tb_pangkalan')->num_rows(),
			'siaga'			=> $this->db->get_where('tb_anggota',['golongan' => 'siaga'])->num_rows(),
			'penggalang'	=> $this->db->get_where('tb_anggota',['golongan' => 'penggalang'])->num_rows(),
			'penegak'		=> $this->db->get_where('tb_anggota',['golongan' => 'penegak'])->num_rows(),
			'pandega'		=> $this->db->get_where('tb_anggota',['golongan' => 'pandega'])->num_rows(),
			'kmd'			=> $this->db->get_where('tb_anggota',['tingkat ' => 'kmd' ])->num_rows(),
			'kml'			=> $this->db->get_where('tb_anggota',['tingkat ' => 'kml' ])->num_rows(),
			'kpd'			=> $this->db->get_where('tb_anggota',['tingkat ' => 'kpd' ])->num_rows(),
			'kpl'			=> $this->db->get_where('tb_anggota',['tingkat ' => 'kpl' ])->num_rows(),
			'non'			=> $this->db->get_where('tb_anggota',['tingkat ' => 'NK' ])->num_rows(),
			'sub_siaga'		=> $this->_get_tingkat('siaga'),
			'sub_penggalang'=> $this->_get_tingkat('penggalang'),
			'sub_penegak'	=> $this->_get_tingkat('penegak'),
			'sub_pandega'	=> $this->_get_tingkat('pandega'),
		];

		$this->load->view('index', $data);
	}

	private function _get_tingkat($golongan)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$tingkat = $this->db->get_where('tb_tingkatan',['tingkat' => $golongan])->result();

		$no  = 1;
		$data = array();
		foreach ($tingkat as $t) {
			$data[$no] = [
				'tingkat'	=> $t->sub_tingkat,
				'jumlah' 	=> $this->db->get_where('tb_anggota',['tingkat' => $t->sub_tingkat])->num_rows()
			];
			$no++;
		}

		return $data;
	}

	function potensi($param)
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$data = [
			$param		=> $this->db->get('tb_'.$param)->result()
		];
		$this->load->view($param, $data);
	}

	function gudep()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$no = 1;
		$data = [];
		$gudep = $this->db->get('tb_gudep')->result();

		foreach ($gudep as $g) {
			$data['gudep'][$no++] = [
				'no_gudep'		=> $g->no_gudep,
				'satuan'		=> $g->ambalan,
				'pangkalan'		=> $this->db->get_where('tb_pangkalan', ['id_pangkalan' => $g->id_pangkalan])->row()->nama_pangkalan,
				'jumlah_anggota'=> $this->db->get_where('tb_anggota', ['id_gudep' => $g->id_gudep])->num_rows()
			];
		}

		//echo json_encode($data);
		$this->load->view('gudep', $data);

	}


	//serverside
	/*serverside*/
	function getAnggota()
	{
		if ($this->session->userdata('ses_username') == null) {
			redirect('auth','refresh');
		}

		$list = $this->M_landing->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->nama;
			$row[] = $field->nama_pangkalan;
			$row[] = $field->ambalan;
			$row[] = strtoupper($field->tingkat);
			$row[] = $field->ta;

			$data[] = $row;
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->M_landing->count_all(),
			"recordsFiltered" 	=> $this->M_landing->count_filtered(),
			"data" 				=> $data,
		);
        //output dalam format JSON
		echo json_encode($output);
	}

	function cari()
	{
		$param = $this->input->post('cari');

		$this->db->like('nama', $param, 'BOTH');
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$data['anggota'] = $this->db->get('tb_anggota')->result();
		$this->load->view('filterAnggota', $data);
	}
}

/* End of file Landing.php */
/* Location: ./application/modules/landing/controllers/Landing.php */