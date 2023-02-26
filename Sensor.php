<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Sensor_model", "sm");
	}

	public function index()
	{
		$this->load->view('welcome');
	}

	public function	set_pressure($sid, $value)
	{
		$data = array(
			"sid" => $sid,
			"pressure_value" => $value,
			"flag" => 1
		);

		$result = $this->sm->insert_data($data);
		if($result)
		{
			$this->load->model("Demand_model", "dm");
			$this->dm->update_status($sid);
		}

		return $result;
	}

	public function	get_pressure($sid, $flag)
	{
		echo $this->sm->get_data($sid, $flag);
	}
}
