<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}

		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/'));
		}

		$this->load->model('Admin/Model_Staff');
	}

	public function index()
	{
		$data['title'] = "Danh sách nhân viên";
		$data['list'] = $this->Model_Staff->getAll();
		return $this->load->view('Admin/View_Staff', $data);
	}

	public function Add()
	{
		$data['title'] = "Thêm mới nhân viên";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tennhanvien = $this->input->post('tennhanvien');
			$sodienthoai = $this->input->post('sodienthoai');
			$quequan = $this->input->post('quequan');
			$taikhoan = $this->input->post('taikhoan');
			$matkhau = $this->input->post('matkhau');
			$phanquyen = $this->input->post('phanquyen');
			$hinhanh = "";

			if(empty($tennhanvien) || empty($sodienthoai) || empty($quequan) || empty($taikhoan) || empty($matkhau)){
				$data['error'] = "Vui lòng nhập đủ thông tin nhân viên!";
				return $this->load->view('Admin/View_StaffAdd', $data);
			}

			$regex = '/^(?:(?:\+|00)84|0)?(3[2-9]|5[6|8|9]|7[0|6-9]|8[1-6]|9\d)(\d{7})$/';

			if (!preg_match($regex, $sodienthoai)) {
			    $data['error'] = "Số điện thoại không hợp lệ!";
				return $this->load->view('Admin/View_StaffAdd', $data);
			} 


			if (count($this->Model_Staff->getByUsername($taikhoan)) >= 1) {
			    $data['error'] = "Tài khoản đã tồn tại trong hệ thống!";
				return $this->load->view('Admin/View_StaffAdd', $data);
			} 

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh nhân viên!";
				return $this->load->view('Admin/View_StaffAdd', $data);
			}

			$this->Model_Staff->insert($tennhanvien,$hinhanh,$taikhoan,md5($matkhau),$sodienthoai,$quequan,$phanquyen);

			$this->session->set_flashdata('success', 'Thêm nhân viên mới thành công!');
			return redirect(base_url('admin/staff/'));

		}
		return $this->load->view('Admin/View_StaffAdd', $data);
	}

	public function Update($manhanvien)
	{
		if(count($this->Model_Staff->getById($manhanvien)) <= 0){
			$this->session->set_flashdata('error', 'Nhân viên không tồn tại trong hệ thống!');
			return redirect(base_url('admin/staff/'));
		}

		$data['title'] = "Thêm mới nhân viên";
		$data['detail'] = $this->Model_Staff->getById($manhanvien);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tennhanvien = $this->input->post('tennhanvien');
			$sodienthoai = $this->input->post('sodienthoai');
			$quequan = $this->input->post('quequan');
			$taikhoan = $this->Model_Staff->getById($manhanvien)[0]['TaiKhoan'];
			$matkhau = $this->Model_Staff->getById($manhanvien)[0]['MatKhau'];
			$phanquyen = $this->input->post('phanquyen');
			$hinhanh = $this->Model_Staff->getById($manhanvien)[0]['HinhAnh'];

			if(empty($tennhanvien) || empty($sodienthoai) || empty($quequan)){
				$data['error'] = "Vui lòng nhập đủ thông tin nhân viên!";
				return $this->load->view('Admin/View_StaffUpdate', $data);
			}

			$regex = '/^(?:(?:\+|00)84|0)?(3[2-9]|5[6|8|9]|7[0|6-9]|8[1-6]|9\d)(\d{7})$/';

			if (!preg_match($regex, $sodienthoai)) {
			    $data['error'] = "Số điện thoại không hợp lệ!";
				return $this->load->view('Admin/View_StaffUpdate', $data);
			} 

			if(!empty($_POST['matkhau'])){
				$matkhau = md5($this->input->post('matkhau'));
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_Staff->update($tennhanvien,$hinhanh,$taikhoan,$matkhau,$sodienthoai,$quequan,$phanquyen,$manhanvien);

			$data['detail'] = $this->Model_Staff->getById($manhanvien);
			$data['success'] = "Cập nhật nhân viên thành công!";
			return $this->load->view('Admin/View_StaffUpdate', $data);
		}
		return $this->load->view('Admin/View_StaffUpdate', $data);
	}

	public function Delete($manhanvien)
	{
		if(count($this->Model_Staff->getById($manhanvien)) <= 0){
			$this->session->set_flashdata('error', 'Nhân viên không tồn tại trong hệ thống!');
			return redirect(base_url('admin/staff/'));
		}

		if($this->Model_Staff->getByUsername($this->session->userdata('username'))[0]['MaNhanVien'] == $manhanvien){
			$this->session->set_flashdata('error', 'Quản lý không được phép xóa chính mình khỏi hệ thống!');
			return redirect(base_url('admin/staff/'));
		}

		$this->Model_Staff->delete($manhanvien);
		$this->session->set_flashdata('success', 'Xóa nhân viên thành công!');
		return redirect(base_url('admin/staff/'));
	}

}

/* End of file Staff.php */
/* Location: ./application/controllers/Staff.php */