<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_berandaNew extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->level = $this->session->userdata('ses_level');
        $this->kwaran = $this->session->userdata('ses_kwaran');
        $this->pangkalan = $this->session->userdata('ses_pangkalan');
    }

    function countAnggota()
    {
        $this->db->select('*');
        $this->db->from('tb_anggota');
        $this->db->join('tb_kwaran', 'tb_anggota.id_kwaran = tb_kwaran.id_kwaran');
        $this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
        $this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
        switch ($this->level) {
            case ADMIN:
                break;
            case ADMIN_KWARAN:
                $this->db->where('tb_anggota.id_kwaran', $this->kwaran);
                break;
            case ADMIN_GUDEP:
                $this->db->where('tb_pangkalan.id_pangkalan', $this->pangkalan);
                break;
        }
        return $this->db->get();
    }

    function pramukaTingkat($golongan = null)
    {
        $query = "SELECT golongan from tb_golongan";
        $exclude = $this->db->query($query)->result();
        $exclude = array_column($exclude, 'golongan');

        $this->db->select('*');
        $this->db->from('tb_anggota');
        $this->db->join('tb_kwaran', 'tb_anggota.id_kwaran = tb_kwaran.id_kwaran');
        $this->db->join('tb_gudep', 'tb_gudep.id_gudep = tb_anggota.id_gudep');
        $this->db->join('tb_pangkalan', 'tb_gudep.id_pangkalan = tb_pangkalan.id_pangkalan');
        switch ($this->level) {
            case ADMIN:
                break;
            case ADMIN_KWARAN:
                $this->db->where('tb_anggota.id_kwaran', $this->kwaran);
                break;
            case ADMIN_GUDEP:
                $this->db->where('tb_pangkalan.id_pangkalan', $this->pangkalan);
                break;
        }

        if ($golongan) {
            $this->db->where('golongan', $golongan);
        } else {
            $this->db->where_not_in('golongan', $exclude);
        }
        $data = $this->db->get()->result();

        $query = "SELECT sub_tingkat from tb_tingkatan where tingkat = '$golongan'";
        $include = $this->db->query($query)->result();
        $include = array_column($include, 'sub_tingkat');
        return $this->getBreakdownGolongan($data, $include);
    }

    function getBreakdownGolongan($data, $include)
    {
        foreach ($include as $tingkat) {
            $total = 0;
            foreach ($data as $dat) {
                if (trim(strtoupper($dat->tingkat)) == strtoupper($tingkat)) {
                    $total++;
                }
            }

            $response[$tingkat] = $total;
        }
        $response['total']  = count($data);
        return $response;
    }

    // aksi
    function aksi_updatePangkalan($id_pangkalan)
    {
        $data = [
            'nama_pangkalan'        => $this->input->post('nama_pangkalan'),
            'alamat_pangkalan'        => $this->input->post('alamat_pangkalan'),
            'kamabigus'                => $this->input->post('kamabigus'),
            'kagudep'                => $this->input->post('kagudep'),
            'jumlah_pembina'        => $this->input->post('jumlah_pembina')
        ];

        $where = ['id_pangkalan' => $id_pangkalan];

        $this->db->where($where);
        $cek = $this->db->update('tb_pangkalan', $data);
        if ($cek) {
            $res = [
                'kode'        => 'success',
                'msg'        => 'Pangkalan Diperbarui'
            ];
        } else {
            $res = [
                'kode'        => 'error',
                'msg'        => 'Gagal'
            ];
        }
        return $res;
    }

    function update_kwaran()
    {
        $nama_kwaran     = $this->input->post('nama_kwaran');
        $data_input = [
            'nama_kwaran'            => $nama_kwaran,
            'nomor_kwaran'            => $this->input->post('nomor_kwaran'),
            'alamat_kwaran'            => $this->input->post('alamat_kwaran'),
            'kamabiran'                => $this->input->post('kamabiran'),
            'kakwaran'                => $this->input->post('kakwaran'),
            'status_kepemilikan'    => $this->input->post('status'),
            'sifat_kepemilikan'        => $this->input->post('sifat'),
            'nomor_sk'                => $this->input->post('nomor_sk'),
            'tgl_sk'                => $this->input->post('tgl_sk'),
            'awal_bakti'            => $this->input->post('awal_bakti'),
            'akhir_bakti'            => $this->input->post('akhir_bakti')
        ];

        $where = [
            'id_kwaran'        => $this->session->userdata('ses_kwaran')
        ];

        $this->db->where($where);
        $cek = $this->db->update('tb_kwaran', $data_input);
        return $cek ? [
            'kode'      => 'success',
            'msg'       => 'Berhasil'
        ] : [
            'kode'      => 'error',
            'msg'       => 'Gagal'
        ];
    }
}
