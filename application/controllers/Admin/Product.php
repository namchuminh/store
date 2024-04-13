<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}

		$this->load->model('Admin/Model_Category');
		$this->load->model('Admin/Model_Product');
		$this->load->model('Admin/Model_Supplier');
	}

	public function index()
	{
		$data['title'] = "Quản lý sản phẩm";
		$data['list'] = $this->Model_Product->getAll();
		return $this->load->view('Admin/View_Product', $data);
	}

	public function Add()
	{
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/product/'));
		}

		$data['title'] = "Thêm mới sản phẩm";
		$data['category'] = $this->Model_Category->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tensanpham = $this->input->post('tensanpham');
			$giaban = $this->input->post('giaban');
			$chuyenmuc = $this->input->post('chuyenmuc');
			$mota = $this->input->post('mota');

			if(empty($tensanpham) || empty($giaban) || empty($chuyenmuc) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin sản phẩm!";
				return $this->load->view('Admin/View_ProductAdd', $data);
			}

			if (!ctype_digit($giaban)) {
			    $data['error'] = "Vui lòng chọn giá bán hợp lệ!";
				return $this->load->view('Admin/View_ProductAdd', $data);
			}

			$hinhanh = "";

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh sản phẩm!";
				return $this->load->view('Admin/View_ProductAdd', $data);
			}

			$this->Model_Product->insert($tensanpham,$mota,$giaban,$chuyenmuc,$hinhanh);

			$this->session->set_flashdata('success', 'Thêm sản phẩm mới thành công!');

			return redirect(base_url('admin/product/'));


		}
		return $this->load->view('Admin/View_ProductAdd', $data);
	}

	public function Update($masanpham)
	{
		if(count($this->Model_Product->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'Sản phẩm không tồn tại trong hệ thống!');
			return redirect(base_url('admin/product/'));
		}

		$data['title'] = "Cập nhật sản phẩm";
		$data['category'] = $this->Model_Category->getAll();
		$data['detail'] = $this->Model_Product->getById($masanpham);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			if($this->session->userdata('role') != 1){
				$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
				return redirect(base_url('admin/product/'));
			}

			$tensanpham = $this->input->post('tensanpham');
			$giaban = $this->input->post('giaban');
			$soluong = $this->input->post('soluong');
			$chuyenmuc = $this->input->post('chuyenmuc');
			$mota = $this->input->post('mota');

			if(empty($tensanpham) || empty($giaban) || empty($chuyenmuc) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin sản phẩm!";
				return $this->load->view('Admin/View_ProductUpdate', $data);
			}

			if (!ctype_digit($giaban)) {
			    $data['error'] = "Vui lòng chọn giá bán hợp lệ!";
				return $this->load->view('Admin/View_ProductUpdate', $data);
			}

			if (!ctype_digit($soluong)) {
			    $data['error'] = "Vui lòng nhập số lượng hợp lệ!";
				return $this->load->view('Admin/View_ProductUpdate', $data);
			}

			$hinhanh = $this->Model_Product->getById($masanpham)[0]['HinhAnh'];

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}


			$this->Model_Product->update($tensanpham,$mota,$giaban,$soluong,$chuyenmuc,$hinhanh,$masanpham);
			$data['detail'] = $this->Model_Product->getById($masanpham);
			$data['success'] = "Cập nhật thông tin sản phẩm thành công!";
			return $this->load->view('Admin/View_ProductUpdate', $data);

		}
		return $this->load->view('Admin/View_ProductUpdate', $data);
	}

	public function Delete($masanpham){

		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/product/'));
		}

		if(count($this->Model_Product->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'sản phẩm không tồn tại trong hệ thống!');
			return redirect(base_url('admin/product/'));
		}

		$this->Model_Product->delete($masanpham);
		$this->session->set_flashdata('success','Xóa sản phẩm khỏi hệ thống thành công!');
		return redirect(base_url('admin/product/'));
	}

	public function import($masanpham){
		if(count($this->Model_Product->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'sản phẩm không tồn tại trong hệ thống!');
			return redirect(base_url('admin/product/'));
		}

		$data['title'] = "Nhập thêm số lượng sản phẩm";
		$data['detail'] = $this->Model_Product->getById($masanpham);
		$data['supplier'] = $this->Model_Supplier->getAll();

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$soluongcu = $this->Model_Product->getById($masanpham)[0]['SoLuong'];
			$soluongnhap = $this->input->post('soluongnhap');
			$tongtien = $this->input->post('tongtien');
			$manhacungcap = $this->input->post('manhacungcap');

			if(empty($soluongnhap) || empty($tongtien) || empty($manhacungcap)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ProductImport', $data);
			}

			if (!ctype_digit($soluongnhap)) {
			    $data['error'] = "Vui lòng chọn số lượng nhập hợp lệ!";
				return $this->load->view('Admin/View_ProductUpdate', $data);
			}

			if (!ctype_digit($tongtien)) {
			    $data['error'] = "Vui lòng chọn tổng tiền nhập hợp lệ!";
				return $this->load->view('Admin/View_ProductUpdate', $data);
			}

			$manhanvien = $this->session->userdata('id');
			$this->Model_Supplier->insertHistory($manhanvien,$manhacungcap,$masanpham,$soluongcu,$soluongnhap,$tongtien);

			$soluong = $soluongcu + $soluongnhap;
			$this->Model_Product->import($soluong,$masanpham);

			$this->session->set_flashdata('success', 'Nhập thêm số lượng cho sản phẩm thành công!');
			return redirect(base_url('admin/product/'));
		}

		return $this->load->view('Admin/View_ProductImport', $data);
	}

	public function History($masanpham){

		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/product/'));
		}

		if(count($this->Model_Product->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'sản phẩm không tồn tại trong hệ thống!');
			return redirect(base_url('admin/product/'));
		}

		$data['title'] = "Lịch sử nhập sản phẩm";
		$data['detail'] = $this->Model_Product->getById($masanpham);
		$data['history'] = $this->Model_Product->getHistoryById($masanpham);
		return $this->load->view('Admin/View_ProductHistory', $data);
	}


}

/* End of file Food.php */
/* Location: ./application/controllers/Food.php */