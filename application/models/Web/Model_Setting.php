<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Setting extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		$sql = "SELECT * FROM cauhinh";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file Model_Setting.php */
/* Location: ./application/models/Model_Setting.php */