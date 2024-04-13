<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}
		$this->load->model('Admin/Model_Supplier');
		$this->load->model('Admin/Model_Category');
	}

	public function index()
	{
		$data['title'] = "Danh sách nhà cung cấp";
		$data['list'] = $this->Model_Supplier->getAll();
		return $this->load->view('Admin/View_Supplier', $data);
	}

	public function Add()
	{
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/supplier/'));
		}

		$data['title'] = "Thêm nhà cung cấp";
		$data['category'] = $this->Model_Category->getAll();

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tennhacungcap = $this->input->post('tennhacungcap');
			$mota = $this->input->post('mota');
			$loaimonan = $this->input->post('loaimonan');

			if(empty($tennhacungcap) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin nhà cung cấp!";
				return $this->load->view('Admin/View_SupplierAdd', $data);
			}

			$hinhanh = "";

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh nhà cung cấp!";
				return $this->load->view('Admin/View_SupplierAdd', $data);
			}

			if(empty($loaimonan) || (count($loaimonan) <= 0)){
				$data['error'] = "Vui lòng chọn loại món ăn cung cấp!";
				return $this->load->view('Admin/View_SupplierAdd', $data);
			}

			$manhacungcap = $this->Model_Supplier->insert($tennhacungcap,$hinhanh,$mota);

			foreach ($loaimonan as $key => $value) {
				$this->Model_Supplier->insert_category($value,$manhacungcap);
			}

			$this->session->set_flashdata('success', 'Thêm nhà cung cấp mới thành công!');

			return redirect(base_url('admin/supplier/'));

		}
		return $this->load->view('Admin/View_SupplierAdd', $data);
	}

	public function Update($manhacungcap)
	{

		if(count($this->Model_Supplier->getById($manhacungcap)) <= 0){
			$this->session->set_flashdata('error', 'Nhà cung cấp không tồn tại trong hệ thống!');
			return redirect(base_url('admin/supplier/'));
		}

		$data['title'] = "Cập nhật nhà cung cấp";
		$data['category'] = $this->Model_Category->getAll();
		$data['detail'] = $this->Model_Supplier->getById($manhacungcap);
		$data['getCategory'] = $this->Model_Supplier->getCategory($manhacungcap);

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if($this->session->userdata('role') != 1){
				$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
				return redirect(base_url('admin/supplier/'));
			}

			$tennhacungcap = $this->input->post('tennhacungcap');
			$mota = $this->input->post('mota');
			$loaimonan = $this->input->post('loaimonan');
			$trangthai = $this->input->post('trangthai');
			$hinhanh = $this->Model_Supplier->getById($manhacungcap)[0]['HinhAnh'];

			if(empty($tennhacungcap) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin nhà cung cấp!";
				return $this->load->view('Admin/View_SupplierUpdate', $data);
			}

			if(empty($loaimonan) || (count($loaimonan) <= 0)){
				$data['error'] = "Vui lòng chọn loại món ăn cung cấp!";
				return $this->load->view('Admin/View_SupplierUpdate', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_Supplier->update($tennhacungcap,$hinhanh,$mota,$trangthai,$manhacungcap);

			$this->Model_Supplier->delete_category($manhacungcap);

			foreach ($loaimonan as $key => $value) {
				$this->Model_Supplier->insert_category($value,$manhacungcap);
			}

			$data['success'] = "Cập nhật nhà cung cấp thành công!";
			$data['detail'] = $this->Model_Supplier->getById($manhacungcap);
			$data['getCategory'] = $this->Model_Supplier->getCategory($manhacungcap);
			return $this->load->view('Admin/View_SupplierUpdate', $data);

		}
	
		return $this->load->view('Admin/View_SupplierUpdate', $data);

	}

	public function Delete($manhacungcap)
	{
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/supplier/'));
		}

		if(count($this->Model_Supplier->getById($manhacungcap)) <= 0){
			$this->session->set_flashdata('error', 'Nhà cung cấp không tồn tại trong hệ thống!');
			return redirect(base_url('admin/supplier/'));
		}

		$this->Model_Supplier->delete($manhacungcap);
		$this->session->set_flashdata('success', 'Xóa nhà cung cấp thành công!');
		return redirect(base_url('admin/supplier/'));

	}

	public function History($manhacungcap){
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/supplier/'));
		}

		if(count($this->Model_Supplier->getById($manhacungcap)) <= 0){
			$this->session->set_flashdata('error', 'Nhà cung cấp không tồn tại trong hệ thống!');
			return redirect(base_url('admin/supplier/'));
		}

		$data['detail'] = $this->Model_Supplier->getById($manhacungcap);
		$data['history'] = $this->Model_Supplier->getHistory($manhacungcap);
		$data['title'] = "Lịch sử nhập nhà cung cấp";
		return $this->load->view('Admin/View_SupplierHistory', $data);
	}

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */