<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Product extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc FROM sanpham, chuyenmuc WHERE sanpham.machuyenmuc = chuyenmuc.machuyenmuc AND sanpham.TrangThai = 1 ORDER BY sanpham.Masanpham DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($masanpham){
		$sql = "SELECT * FROM sanpham WHERE Masanpham = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($masanpham));
		return $result->result_array();
	}

	public function insert($tensanpham,$mota,$giaban,$machuyenmuc,$hinhanh){
		$sql = "INSERT INTO sanpham (tensanpham,MoTa,GiaBan,SoLuong,machuyenmuc,HinhAnh) VALUES(?, ?, ?, ?, ?, ?)";
		$result = $this->db->query($sql, array($tensanpham,$mota,$giaban,0,$machuyenmuc,$hinhanh));
		return $result;
	}

	public function update($tensanpham,$mota,$giaban,$soluong,$machuyenmuc,$hinhanh,$masanpham){
		$sql = "UPDATE sanpham SET tensanpham=?,MoTa=?,GiaBan=?,SoLuong=?,machuyenmuc=?,HinhAnh=? WHERE Masanpham = ?";
		$result = $this->db->query($sql, array($tensanpham,$mota,$giaban,$soluong,$machuyenmuc,$hinhanh,$masanpham));
		return $result;
	}

	public function delete($masanpham){
		$sql = "UPDATE sanpham SET TrangThai=? WHERE Masanpham = ?";
		$result = $this->db->query($sql, array(0,$masanpham));
		return $result;
	}

	public function import($soluong,$masanpham){
		$sql = "UPDATE sanpham SET SoLuong=? WHERE Masanpham = ?";
		$result = $this->db->query($sql, array($soluong,$masanpham));
		return $result;
	}

	public function getHistoryById($masanpham){
		$sql = "SELECT lichsunhap.*, nhanvien.TenNhanVien, nhacungcap.TenNhaCungCap FROM sanpham, lichsunhap, nhanvien, nhacungcap WHERE lichsunhap.MaNhaCungCap = nhacungcap.MaNhaCungCap AND lichsunhap.MaNhanVien = nhanvien.MaNhanVien AND lichsunhap.Masanpham = sanpham.Masanpham AND lichsunhap.Masanpham = ? ORDER BY lichsunhap.MaLichSuNhap DESC LIMIT 10";
		$result = $this->db->query($sql, array($masanpham));
		return $result->result_array();
	}
}

/* End of file Model_Food.php */
/* Location: ./application/models/Model_Food.php */