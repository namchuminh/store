<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Supplier extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM nhacungcap WHERE TrangThai != 0 ORDER BY MaNhaCungCap DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($manhacungcap){
		$sql = "SELECT * FROM nhacungcap WHERE TrangThai != 0 AND MaNhaCungCap = ?";
		$result = $this->db->query($sql, array($manhacungcap));
		return $result->result_array();
	}

	public function insertHistory($manhanvien,$manhacungcap,$masanpham,$soluongcu,$soluongmoi,$tongtien){
		$sql = "INSERT INTO lichsunhap (MaNhanVien,MaNhaCungCap,masanpham,SoLuongCu,SoLuongMoi,TongTien) VALUES($manhanvien,$manhacungcap,$masanpham,$soluongcu,$soluongmoi,$tongtien)";
		$result = $this->db->query($sql);
		return $result;
	}

	public function insert($tennhacungcap, $hinhanh, $mota){
	    $data = array(
	        'TenNhaCungCap' => $tennhacungcap,
	        'HinhAnh' => $hinhanh,
	        'MoTa' => $mota
	    );
	    $this->db->insert('nhacungcap', $data);
	    
	    // Trả về ID vừa chèn vào cơ sở dữ liệu
	    return $this->db->insert_id();
	}

	public function update($tennhacungcap,$hinhanh,$mota,$trangthai, $manhacungcap){
		$sql = "UPDATE nhacungcap SET TenNhaCungCap = ?, HinhAnh = ?, MoTa = ?, TrangThai = ? WHERE MaNhaCungCap = ?";
		$result = $this->db->query($sql, array($tennhacungcap,$hinhanh,$mota,$trangthai,$manhacungcap));
		return $result;
	}

	public function insert_category($machuyenmuc,$manhacungcap){
		$sql = "INSERT INTO ncc_chuyenmuc (machuyenmuc,MaNhaCungCap) VALUES(?,?)";
		$result = $this->db->query($sql, array($machuyenmuc,$manhacungcap));
		return $result;
	}

	public function getCategory($manhacungcap){
		$sql = "SELECT MaChuyenMuc FROM ncc_chuyenmuc WHERE MaNhaCungCap = ?";
		$result = $this->db->query($sql, array($manhacungcap));
		
		$data = array();
		foreach ($result->result_array() as $key => $value) {
			array_push($data,$value['MaChuyenMuc']);
		}	

		return $data;
	}

	public function delete_category($manhacungcap){
		$sql = "DELETE FROM ncc_chuyenmuc WHERE MaNhaCungCap = ?";
		$result = $this->db->query($sql, array($manhacungcap));
		return $result;
	}

	public function delete($manhacungcap){
		$sql = "UPDATE nhacungcap SET TrangThai = 0 WHERE MaNhaCungCap = ?";
		$result = $this->db->query($sql, array($manhacungcap));
		return $result;
	}

	public function getHistory($manhacungcap){
		$sql = "SELECT lichsunhap.*, nhanvien.TenNhanVien, nhacungcap.TenNhaCungCap, sanpham.TenSanPham FROM sanpham, lichsunhap, nhanvien, nhacungcap WHERE lichsunhap.MaNhaCungCap = nhacungcap.MaNhaCungCap AND lichsunhap.MaNhanVien = nhanvien.MaNhanVien AND lichsunhap.masanpham = sanpham.masanpham AND lichsunhap.MaNhaCungCap = ?  ORDER BY lichsunhap.MaLichSuNhap DESC LIMIT 10";
		$result = $this->db->query($sql, array($manhacungcap));
		return $result->result_array();
	}

}

/* End of file Model_Supplier.php */
/* Location: ./application/models/Model_Supplier.php */