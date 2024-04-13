<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}

		$this->load->model('Admin/Model_Order');
	}

	public function index()
	{
		$data['title'] = "Danh sách hóa đơn";
		$data['list'] = $this->Model_Order->getAll();
		return $this->load->view('Admin/View_Order', $data);
	}

	public function Pay($mahoadon){
		if(count($this->Model_Order->getById($mahoadon)) <= 0){
			$this->session->set_flashdata('error', 'Hóa đơn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/order/'));
		}

		$this->Model_Order->pay($mahoadon);

		$this->session->set_flashdata('success', 'Xác nhận thanh toán hóa đơn thành công!');
		return redirect(base_url('admin/order/'));
	}

	public function Detail($mahoadon){
		if(count($this->Model_Order->getById($mahoadon)) <= 0){
			$this->session->set_flashdata('error', 'Hóa đơn không tồn tại trong hệ thống!');
			return redirect(base_url('admin/order/'));
		}

		$data['title'] = "Chi tiết hóa đơn";
		$data['detail'] = $this->Model_Order->getDetailById($mahoadon);
		$data['order'] = $this->Model_Order->getById($mahoadon);
		return $this->load->view('Admin/View_OrderDetail', $data);
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/Order.php */