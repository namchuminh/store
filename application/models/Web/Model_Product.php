<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Product extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($masanpham){
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc FROM sanpham, chuyenmuc WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.MaSanPham = ? AND sanpham.TrangThai = 1";
		$result = $this->db->query($sql, array($masanpham));
		return $result->result_array();
	}

	public function getByCategoryId($machuyenmuc)
	{
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc FROM sanpham, chuyenmuc WHERE sanpham.Machuyenmuc = chuyenmuc.Machuyenmuc AND sanpham.Machuyenmuc = ? AND sanpham.TrangThai = 1 AND sanpham.SoLuong >= 1 ORDER BY sanpham.masanpham DESC";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result->result_array();
	}

	public function updateNumber($soluong,$masanpham){
		$sql = "UPDATE sanpham SET SoLuong = ? WHERE masanpham = ?";
		$result = $this->db->query($sql, array($soluong,$masanpham));
		return $result;
	}


}

/* End of file Model_Food.php */
/* Location: ./application/models/Model_Food.php */