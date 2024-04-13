<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Staff extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM nhanvien WHERE TrangThai = 1 ORDER BY PhanQuyen DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($manhanvien){
		$sql = "SELECT * FROM nhanvien WHERE TrangThai = 1 AND MaNhanVien = ?";
		$result = $this->db->query($sql, array($manhanvien));
		return $result->result_array();
	}

	public function getByUsername($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE TrangThai = 1 AND TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function insert($tennhanvien,$hinhanh,$taikhoan,$matkhau,$sodienthoai,$quequan,$phanquyen){
		$sql = "INSERT INTO nhanvien (TenNhanVien,HinhAnh,TaiKhoan,MatKhau,SoDienThoai,QueQuan,PhanQuyen) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$result = $this->db->query($sql, array($tennhanvien,$hinhanh,$taikhoan,$matkhau,$sodienthoai,$quequan,$phanquyen));
		return $result;
	}

	public function update($tennhanvien,$hinhanh,$taikhoan,$matkhau,$sodienthoai,$quequan,$phanquyen,$manhanvien){
		$sql = "UPDATE nhanvien SET TenNhanVien=?,HinhAnh=?,TaiKhoan=?,MatKhau=?,SoDienThoai=?,QueQuan=?,PhanQuyen=? WHERE MaNhanVien = ?";
		$result = $this->db->query($sql, array($tennhanvien,$hinhanh,$taikhoan,$matkhau,$sodienthoai,$quequan,$phanquyen,$manhanvien));
		return $result;
	}

	public function delete($manhanvien){
		$sql = "UPDATE nhanvien SET TrangThai=0 WHERE MaNhanVien = ?";
		$result = $this->db->query($sql, array($manhanvien));
		return $result;
	}

	public function updatePassword($matkhau,$manhanvien){
		$sql = "UPDATE nhanvien SET MatKhau = ? WHERE MaNhanVien = ?";
		$result = $this->db->query($sql, array($matkhau,$manhanvien));
		return $result;
	}

	public function checkPassword($matkhau,$manhanvien){
		$sql = "SELECT * FROM nhanvien WHERE MatKhau = ? AND MaNhanVien = ?";
		$result = $this->db->query($sql, array($matkhau,$manhanvien));
		return $result->result_array();
	}


}

/* End of file Model_Staff.php */
/* Location: ./application/models/Model_Staff.php */