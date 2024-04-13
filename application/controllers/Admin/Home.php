<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}

		$this->load->model('Admin/Model_Home');
	}

	public function index()
	{
		$data['title'] = "Trang quản trị!";
		$data['order'] = $this->Model_Home->getOrder()[0]['soluong'];
		$data['orderToday'] = $this->Model_Home->getOrderToday()[0]['soluong'];
		$data['product'] = $this->Model_Home->getProduct()[0]['soluong'];
		$data['revenueMonth'] = $this->Model_Home->getMonth()[0]['tongtien'];
		$data['revenueDay'] = $this->Model_Home->getDay()[0]['tongtien'];
		$data['revenueWeek'] = $this->Model_Home->getWeek()[0]['tongtien'];
		$data['importMonth'] = $this->Model_Home->getImportMonth()[0]['tongtien'];
		$data['importWeek'] = $this->Model_Home->getImportWeek()[0]['tongtien'];
		$data['importDay'] = $this->Model_Home->getImportDay()[0]['tongtien'];
		$data['orderMonth'] = $this->Model_Home->getOrderMonth()[0]['soluong'];
		$data['orderWeek'] = $this->Model_Home->getOrderWeek()[0]['soluong'];
		$data['category'] = $this->Model_Home->getCategory()[0]['soluong'];
		$data['list'] = $this->Model_Home->getOrderList();
		return $this->load->view('Admin/View_Home', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */