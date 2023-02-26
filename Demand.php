<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demand extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Demand_model", "dm");
	}

	public function index()
	{
		$this->load->view('welcome');
	}

	public function	set_demand($sid, $value)
	{
		$data = array(
			"sid" => $sid,
			"demand_pressure" => $value
		);

		return $this->dm->insert_data($data);
	}

	public function	get_demand($sid)
	{
		echo $this->dm->get_data($sid);
	}
}
