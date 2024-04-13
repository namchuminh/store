<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Order extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM hoadon ORDER BY MaHoaDon DESC LIMIT 25";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($mahoadon)
	{
	    $sql = "SELECT * FROM hoadon WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

	public function pay($mahoadon){
		$sql = "UPDATE hoadon SET ThanhToan = 1 WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result;
	}

	public function getDetailById($mahoadon){
		$sql = "SELECT chitiethoadon.*, sanpham.TenSanPham, sanpham.GiaBan, sanpham.HinhAnh FROM chitiethoadon, sanpham WHERE chitiethoadon.Masanpham = sanpham.Masanpham AND chitiethoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

}

/* End of file Model_Order.php */
/* Location: ./application/models/Model_Order.php */