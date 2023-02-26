<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensor_model extends CI_Model 
{
	function insert_data($data)
	{
		$this->db->insert('pressure', $data);
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}

	function get_data($sid, $flag)
	{
		$sql = "SELECT pressure_value FROM pressure WHERE sid = $sid AND flag = $flag ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		return $query->result()[0]->pressure_value;
	}
}
