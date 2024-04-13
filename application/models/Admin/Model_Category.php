<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Category extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 ORDER BY machuyenmuc DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($machuyenmuc){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 AND machuyenmuc = ? ORDER BY machuyenmuc DESC";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result->result_array();
	}

	public function insert($hinhanh, $mota, $tenchuyenmuc){
		$sql = "INSERT INTO chuyenmuc (HinhAnh,MoTa,tenchuyenmuc) VALUES(?, ?, ?)";
		$result = $this->db->query($sql, array($hinhanh, $mota, $tenchuyenmuc));
		return $result;
	}

	public function update($hinhanh, $mota, $tenchuyenmuc, $machuyenmuc){
		$sql = "UPDATE chuyenmuc SET HinhAnh=?,MoTa=?,tenchuyenmuc=? WHERE machuyenmuc = ?";
		$result = $this->db->query($sql, array($hinhanh, $mota, $tenchuyenmuc,$machuyenmuc));
		return $result;
	}

	public function delete($machuyenmuc){
		$sql = "UPDATE chuyenmuc SET TrangThai=0 WHERE machuyenmuc = ?";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result;
	}
	

}

/* End of file Model_Category.php */
/* Location: ./application/models/Model_Category.php */