<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

	function getall($table,$order)
	{
		$this->db->order_by($order['kolom'] , $order['urutan']);
		return $this->db->get($table);
	}	

	function getWhere($table,$where,$order=false)
	{
		$this->db->order_by($order['kolom'] , $order['urutan']);
		return $this->db->get_where($table, $where);
	}

	function input($table,$data)
	{
		$this->db->insert($table, $data);
	}

	function delete($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update($table,$where,$data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}

/* End of file M_master.php */
/* Location: ./application/models/M_master.php */