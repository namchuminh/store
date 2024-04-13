<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Đăng xuất thành công!');
		return redirect(base_url('admin/login/'));
	}

}

/* End of file DangNhap.php */
/* Location: ./application/controllers/DangNhap.php */