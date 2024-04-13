<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}

		$this->load->model('Admin/Model_Setting');
	}

	public function index()
	{	
		$data['title'] = "Cài đặt hệ thống";
		$data['detail'] = $this->Model_Setting->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenquan = $this->input->post('tenquan');
			$sodienthoai = $this->input->post('sodienthoai');
			$maqr = $this->Model_Setting->getAll()[0]['MaQR'];
			$giomocua = $this->input->post('giomocua');
			$giodongcua = $this->input->post('giodongcua');
			$diachiquan = $this->input->post('diachiquan');
			$maqrthanhtoan = $this->Model_Setting->getAll()[0]['MaQRThanhToan'];
			$chutaikhoan = $this->input->post('chutaikhoan');
			$sotaikhoan = $this->input->post('sotaikhoan');
			$apikeygiaodich = $this->input->post('apikeygiaodich');

			if(empty($tenquan) || empty($sodienthoai) || empty($giomocua) ||empty($giodongcua) || empty($diachiquan)){
				$data['error'] = "Vui lòng nhập đủ thông tin cài đặt!";
				return $this->load->view('Admin/View_Setting', $data);
			}

			$regex = '/^(?:(?:\+|00)84|0)?(3[2-9]|5[6|8|9]|7[0|6-9]|8[1-6]|9\d)(\d{7})$/';

			if (!preg_match($regex, $sodienthoai)) {
			    $data['error'] = "Số điện thoại không hợp lệ!";
				return $this->load->view('Admin/View_Setting', $data);
			} 

			if(!empty($_POST['maqr'])){
				$maqr = $this->input->post('maqr');
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('maqrthanhtoan')){
				$img = $this->upload->data();
				$maqrthanhtoan = base_url('uploads')."/".$img['file_name'];
			}

			if(!is_numeric($sotaikhoan)){
				$data['error'] = "Số tài khoản không hợp lệ!";
				return $this->load->view('Admin/View_Setting', $data);
			}

			$this->Model_Setting->update($tenquan,$sodienthoai,$maqr,$giomocua,$giodongcua,$diachiquan,$maqrthanhtoan,$chutaikhoan,$sotaikhoan,$apikeygiaodich);
			
			$data['success'] = "Lưu cài đặt thành công!";
			$data['detail'] = $this->Model_Setting->getAll();
			return $this->load->view('Admin/View_Setting', $data);
		}
		return $this->load->view('Admin/View_Setting', $data);
	}

}

/* End of file Password.php */
/* Location: ./application/controllers/Password.php */