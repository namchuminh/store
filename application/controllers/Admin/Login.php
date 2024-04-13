<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('login')){
			return redirect(base_url('admin/'));
		}
		$data = array();
		$this->load->model('Admin/Model_Login');
	}

	public function index()
	{	
		$data['title'] = "Đăng nhập tài khoản quản trị!";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $taikhoan = $this->input->post('taikhoan');
			$matkhau = md5($this->input->post('matkhau'));

			if($taikhoan == "" || $matkhau == ""){
				$data["error"] = "Tài khoản hoặc mật khẩu không được trống!";
				return $this->load->view('Admin/View_Login', $data);
			}


			if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $taikhoan)) {
			    $data["error"] = "Tài khoản không hợp lệ!";
				return $this->load->view('Admin/View_Login', $data);
			} 

			if($this->Model_Login->checkAccountAdmin($taikhoan, $matkhau) >= 1){
				$newdata = array(
					'id' => $this->Model_Login->getInfoByUsername($taikhoan)[0]['MaNhanVien'],
					'avatar' => $this->Model_Login->getInfoByUsername($taikhoan)[0]['HinhAnh'],
				    'username'  => $taikhoan,
				    'login' => True,
				    'fullname' => $this->Model_Login->getInfoByUsername($taikhoan)[0]['TenNhanVien'],
				    'phone' => $this->Model_Login->getInfoByUsername($taikhoan)[0]['SoDienThoai'],
				    'hometown' => $this->Model_Login->getInfoByUsername($taikhoan)[0]['QueQuan'],
				    'role' => $this->Model_Login->getInfoByUsername($taikhoan)[0]['PhanQuyen'],
				);
				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('success', 'Đăng nhập thành công!');
				return redirect(base_url('admin/'));
			}else{
				$data["error"] = "Tài khoản hoặc mật khẩu không đúng!";
				return $this->load->view('Admin/View_Login', $data);
			}

        }

		return $this->load->view('Admin/View_Login',$data);
	}
}

/* End of file DangNhap.php */
/* Location: ./application/controllers/DangNhap.php */