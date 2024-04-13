<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Order extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($mahoadon)
	{
	    $sql = "SELECT * FROM hoadon WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

	public function getDetailById($mahoadon){
		$sql = "SELECT chitiethoadon.*, sanpham.TenSanPham, sanpham.GiaBan, sanpham.HinhAnh FROM chitiethoadon, sanpham WHERE chitiethoadon.Masanpham = sanpham.Masanpham AND chitiethoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

	public function insert($tongtien, $thanhtoan, $thoigian){
	    $data = array(
	        'TongTien' => $tongtien,
	        'ThanhToan' => $thanhtoan,
	        'ThoiGian' => $thoigian
	    );
	    $this->db->insert('hoadon', $data);
	    
	    // Trả về ID vừa chèn vào cơ sở dữ liệu
	    return $this->db->insert_id();
	}


	public function insertDetail($mahoadon, $masanpham, $soluong){
	    $data = array(
	        'MaHoaDon' => $mahoadon,
	        'MaSanPham' => $masanpham,
	        'SoLuong' => $soluong
	    );
	    $this->db->insert('chitiethoadon', $data);
	    
	    // Trả về ID vừa chèn vào cơ sở dữ liệu
	    return $this->db->insert_id();
	}

	public function pay($mahoadon){
		$sql = "UPDATE hoadon SET ThanhToan = 1 WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result;
	}

}