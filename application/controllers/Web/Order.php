<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_Order');
		$this->load->model('Web/Model_Product');
		$this->load->model('Web/Model_Setting');
	}


	public function addOrder(){

		if(!$this->session->userdata('menu') || (count($this->session->userdata('menu')) <= 0)){
			$this->session->set_flashdata('error', 'Vui lòng chọn món ăn vào menu trước!');
			return redirect(base_url());
		}

		date_default_timezone_set('Asia/Ho_Chi_Minh');	

		$this->session->set_userdata('thoigian', date('Y-m-d H:i:s'));

		$tongtien = 0;

		foreach ($this->session->userdata('menu') as $key => $value) {
			$dongia = $this->Model_Product->getById($value['masanpham'])[0]['GiaBan'] * $value['soluong'];
			$tongtien += $dongia;
		}

		$data = array(
			'noidung' => implode('', array_map(fn($i) => $i === 0 ? rand(1, 9) : rand(0, 9), range(0, 9)))
		);
		
		$this->session->set_userdata($data);

		$data['title'] = "Chi tiết hóa đơn";
		$data['detail'] = $this->session->userdata('menu');
		$data['setting'] = $this->Model_Setting->getAll();
		$data['sumOrder'] = $tongtien;
		return $this->load->view('Web/View_Order', $data);

	}

	private function syncBank($apikey,$sotaikhoan){
		$curl = curl_init();
	    $data = array(
	    	'bank_acc_id' => $sotaikhoan,
	    );
	    $postdata = json_encode($data);

	    curl_setopt_array($curl, array(
	        CURLOPT_URL => "https://oauth.casso.vn/v2/sync",
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        CURLOPT_CUSTOMREQUEST => "POST",
	        CURLOPT_POSTFIELDS => $postdata,
	        CURLOPT_HTTPHEADER => array(
	            "Authorization: Apikey ".$apikey,
	            "Content-Type: application/json"
	        ),
	    ));

	    $response = curl_exec($curl);
	    $err = curl_error($curl);

	    curl_close($curl);
	}

	private function historyBank($apikey){
		$curl = curl_init();

	    curl_setopt_array($curl, array(
	      CURLOPT_URL => "https://oauth.casso.vn/v2/transactions?fromDate=2024-04-01&page=1&pageSize=20&sort=DESC",
	      CURLOPT_RETURNTRANSFER => true,
	      CURLOPT_TIMEOUT => 30,
	      CURLOPT_CUSTOMREQUEST => "GET",
	      CURLOPT_HTTPHEADER => array(
	        "Authorization: Apikey ".$apikey,
	        "Content-Type: application/json"
	      ),
	    ));
	    
	    $response = curl_exec($curl);
	    $err = curl_error($curl);
	    
	    $response = json_decode($response, true);

	    curl_close($curl);

	    return $response['data']['records'];
	}

	public function checkPay()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$thoigian = $this->session->userdata('thoigian');

			if(!$this->session->userdata('menu') || (count($this->session->userdata('menu')) <= 0)){
				echo 'Vui lòng chọn món ăn vào menu trước!';
				return;
			}

			if(!$this->session->has_userdata('noidung')){
				echo 'Vui lòng chuyển khoản trước khi xác nhận thanh toán!';
				return;
			}

			$sotaikhoan = $this->Model_Setting->getAll()[0]['SoTaiKhoan'];
			$apikey = $this->Model_Setting->getAll()[0]['ApiGiaoDich'];

			$thanhtoan = 0;
			$mahoadon = 0;
			$this->syncBank($apikey,$sotaikhoan);
			foreach ($this->historyBank($apikey) as $item) {
		        if (strpos($item['description'], $this->session->userdata('noidung')) !== false){
		            if($item['amount'] < $this->session->userdata('sumMenu')){
		            	echo "Số tiền chuyển nhỏ hơn giá trị thanh toán!";
		            	return;
		            }else{
						$tongtien = 0;

						foreach ($this->session->userdata('menu') as $key => $value) {
							$dongia = $this->Model_Product->getById($value['masanpham'])[0]['GiaBan'] * $value['soluong'];
							$tongtien += $dongia;
						}


						$mahoadon = $this->Model_Order->insert($tongtien,1,$thoigian);

						foreach ($this->session->userdata('menu') as $key => $value) {
							$this->Model_Order->insertDetail($mahoadon,$value['masanpham'],$value['soluong']);
							$soluongmoi = $this->Model_Product->getById($value['masanpham'])[0]['SoLuong'] - $value['soluong'];
							$this->Model_Product->updateNumber($soluongmoi,$value['masanpham']);
						}

						$thanhtoan = 1;
		            }
		            break;
		        }
		    }

		    if($thanhtoan == 1){
		    	$this->session->unset_userdata('sumMenu');
				$this->session->unset_userdata('noidung');
				$this->session->unset_userdata('menu');
				$this->session->unset_userdata('thoigian');
				echo $mahoadon;
				return;
		    }else{
		    	echo "Hệ thống chưa nhận được tiền, vui lòng gặp nhân viên để được hỗ trợ!";
				return;
		    }
		}else{
			echo "Không được phép thực hiện!";
			return;
		}
	}
}

/* End of file Order.php */
/* Location: ./application/models/Order.php */