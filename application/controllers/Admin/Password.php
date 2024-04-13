<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}

		$this->load->model('Admin/Model_Staff');
	}

	public function index()
	{	
		$data['title'] = "Đổi mật khẩu";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$matkhaucu = $this->input->post('matkhaucu');
			$matkhaumoi = $this->input->post('matkhaumoi');
			$matkhaumoi2 = $this->input->post('matkhaumoi2');

			if(empty($matkhaucu) || empty($matkhaumoi) || empty($matkhaumoi2)){
				$data['error'] = "Vui lòng nhập đủ thông tin mật khẩu!";
				return $this->load->view('Admin/View_Password', $data);
			}

			if(count($this->Model_Staff->checkPassword(md5($matkhaucu),$this->session->userdata('id'))) <= 0){
				$data['error'] = "Mật khẩu cũ không đúng!";
				return $this->load->view('Admin/View_Password', $data);
			}

			if($matkhaumoi !== $matkhaumoi2){
				$data['error'] = "Nhập lại mật khẩu không trùng khớp!";
				return $this->load->view('Admin/View_Password', $data);
			}

			$this->Model_Staff->updatePassword(md5($matkhaumoi),$this->session->userdata('id'));

			$data['success'] = "Đổi mật khẩu thành công!";
			return $this->load->view('Admin/View_Password', $data);
		}
		return $this->load->view('Admin/View_Password', $data);
	}

}

/* End of file Password.php */
/* Location: ./application/controllers/Password.php */