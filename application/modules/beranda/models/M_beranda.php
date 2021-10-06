<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model {

	function getGudep($id_kwaran)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->where('tb_pangkalan.kwaran', $id_kwaran);
		return $this->db->get('tb_gudep');
	}	

	function getAnggotaGudep($id_pangkalan)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		return $this->db->get('tb_anggota');
	}

	function potensi_muda($id_pangkalan,$param)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->where('tb_anggota.golongan', $param);
		return $this->db->get('tb_anggota');
	}

	function potensi_dewasa($id_pangkalan,$param)
	{
		$this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->where('tb_pangkalan.id_pangkalan', $id_pangkalan);
		$this->db->where('tb_anggota.tingkat', $param);
		return $this->db->get('tb_anggota');
	}


	function update_kwaran()
	{
		$nama_kwaran 	= $this->input->post('nama_kwaran');
		$data_input = [
			'nama_kwaran'			=> $nama_kwaran,
			'nomor_kwaran'			=> $this->input->post('nomor_kwaran'),
			'alamat_kwaran'			=> $this->input->post('alamat_kwaran'),
			'kamabiran'				=> $this->input->post('kamabiran'),
			'kakwaran'				=> $this->input->post('kakwaran'),
			'status_kepemilikan'	=> $this->input->post('status'),
			'sifat_kepemilikan'		=> $this->input->post('sifat'),
			'nomor_sk'		        => $this->input->post('nomor_sk'),
			'tgl_sk'		        => $this->input->post('tgl_sk'),
			'awal_bakti'		    => $this->input->post('awal_bakti'),
			'akhir_bakti'		    => $this->input->post('akhir_bakti')
		];

		$where = [
			'id_kwaran'		=> $this->session->userdata('ses_kwaran')
		];

		$this->db->where($where);
		$cek = $this->db->update('tb_kwaran', $data_input);

		if ($cek) {
			$res = array(
				'res'	=> 1
			);
			return $res;
		}

		return null;

	}

	function aksi_updatePangkalan($id_pangkalan)
	{
		$data = [
			'nama_pangkalan'		=> $this->input->post('nama_pangkalan'),
			'alamat_pangkalan'		=> $this->input->post('alamat_pangkalan'),
			'kamabigus'				=> $this->input->post('kamabigus'),
			'kagudep'				=> $this->input->post('kagudep'),
			'jumlah_pembina'		=> $this->input->post('jumlah_pembina')
		];

		$where = ['id_pangkalan' => $id_pangkalan];

		$this->db->where($where);
		$cek = $this->db->update('tb_pangkalan', $data);
		if ($cek) {
			$res = [
				'kode'		=> 'success',
				'msg'		=> 'Pangkalan Diperbarui'
			];
		}
		else
		{
			$res = [
				'kode'		=> 'error',
				'msg'		=> 'Gagal'
			];
		}

		return $res;
	}

}

/* End of file M_beranda.php */
/* Location: ./application/modules/beranda/models/M_beranda.php */