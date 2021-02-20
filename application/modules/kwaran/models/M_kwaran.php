<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kwaran extends CI_Model {

	function getGudep($id_kwaran)
	{
		$this->db->join('tb_pangkalan', 'tb_pangkalan.id_pangkalan = tb_gudep.id_pangkalan');
		$this->db->join('tb_kwaran', 'tb_pangkalan.kwaran = tb_kwaran.id_kwaran');
		$this->db->where('tb_pangkalan.kwaran', $id_kwaran);
		return $this->db->get('tb_gudep');
	}

	function getall()
	{
		$this->db->order_by('nomor_kwaran', 'asc');
		return $this->db->get('tb_kwaran')->result();
	}	


	function input_kwaran()
	{
		$id_kwaran  	= $this->input->post('id_kwaran');

		if ($id_kwaran == null) {
			$data = $this->_aksi_input();
		}
		else
		{
			$where = ['id_kwaran' => $id_kwaran];
			$data_update = [
				'nama_kwaran'			=> $this->input->post('nama_kwaran'),
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
			$cek = $this->_update_kwaran($where,$data_update);
			if (!$cek) {
				$data = [
					'success'	=> 1,
					'message'	=> "Kwaran Berhasil Diupdate"
				];
			}
		}
		return $data;
	}	

	function _aksi_input()
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

		$cek_nama = $this->db->get_where('tb_kwaran', ['nama_kwaran' => $nama_kwaran])->num_rows();

		if ($cek_nama > 0) {
			$hasil = [
				'success'	=> 0,
				'message'	=> "nama kwaran sudah terdaftar"
			];
		}
		else
		{
			$cek  = $this->M_master->input('tb_kwaran',$data_input);
			if (!$cek) {
				$hasil = [
					'success'	=> 1,
					'message'	=> "Kwaran Berhasil Didaftarkan"
				];
			}
			else
			{
				$hasil = [
					'success'	=> 0,
					'message'	=> "Gagal input"
				];
			}
		}

		return $hasil;
	}

	function _update_kwaran($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_kwaran', $data);
	}

}

/* End of file M_kwaran.php */
/* Location: ./application/modules/kwaran/models/M_kwaran.php */