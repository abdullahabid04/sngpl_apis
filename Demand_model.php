<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demand_model extends CI_Model 
{
	function insert_data($data)
	{
		$this->db->insert('demand_pressure', $data);
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}

	function get_data($sid)
	{
		$sql = "SELECT demand_pressure FROM demand_pressure WHERE sid = $sid ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		return $query->result()[0]->demand_pressure;
	}

	function update_status($sid)
	{
		$sql = "SELECT id FROM demand_pressure WHERE sid = $sid ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		$id = $query->result()[0]->id;

		$sql = "UPDATE demand_pressure SET status = 1 WHERE id = $id";
		$this->db->query($sql);
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}
}
