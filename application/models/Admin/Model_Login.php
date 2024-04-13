<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Login extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function checkAccountAdmin($taikhoan, $matkhau){
		$sql = "SELECT * FROM nhanvien WHERE TaiKhoan = ? AND MatKhau = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($taikhoan, $matkhau));
		return $result->num_rows();
	}

	public function getInfoByUsername($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

}

/* End of file DangNhap.php */
/* Location: ./application/models/DangNhap.php */