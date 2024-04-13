<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_Category');
		$this->load->model('Web/Model_Product');
		$this->load->model('Web/Model_Setting');
	}

	public function index()
	{
		$data['title'] = "Danh sách sản phẩm";
		$data['category'] = $this->Model_Category->getAll();
		$data['menu'] = $this->session->userdata('menu');
		$data['setting'] = $this->Model_Setting->getAll();

		if(isset($_GET['code'])){
			$masanpham = $this->input->get('code');
			if(count($this->Model_Product->getById($masanpham)) <= 0){
				$this->session->set_flashdata('error', 'Sản phẩm không tồn tại trong hệ thống!');
				return redirect(base_url());
			}

			$data['qrcode'] = True;
			$data['detail'] = $this->Model_Product->getById($masanpham);
			return $this->load->view('Web/View_Home', $data);

		}

		return $this->load->view('Web/View_Home', $data);
	}


	public function addMenu(){
		// Bắt đầu session nếu chưa được bắt đầu
	    if (!$this->session->userdata('menu')) {
	        $this->session->set_userdata('menu', array());
	    }

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$masanpham = $this->input->post('masanpham');
			$soluong = $this->input->post('soluong');
			$code = $this->input->post('code');

			if(count($this->Model_Product->getById($masanpham)) <= 0){
				$this->session->set_flashdata('error', 'Sản phẩm không tồn tại trong hệ thống!');
				return redirect(base_url());
			}

			if(!is_numeric($soluong) || ($soluong <= 0)){
				if($code == $masanpham){
		        	$this->session->set_flashdata('error', 'Vui lòng nhập số lượng hợp lệ!');
					return redirect(base_url().'?code='.$masanpham);
		        }else{
		        	$this->session->set_flashdata('error', 'Vui lòng nhập số lượng hợp lệ!');
					return redirect(base_url());
		        }
			}

			if($soluong > $this->Model_Product->getById($masanpham)[0]['SoLuong']){
				if($code == $masanpham){
		        	$this->session->set_flashdata('error', 'Số lượng chỉ còn tối đa '.$this->Model_Product->getById($masanpham)[0]['SoLuong'].' sản phẩm!');
					return redirect(base_url().'?code='.$masanpham);
		        }else{
		        	$this->session->set_flashdata('error', 'Số lượng chỉ còn tối đa '.$this->Model_Product->getById($masanpham)[0]['SoLuong'].' sản phẩm!');
					return redirect(base_url());
		        }
			}

			// Lấy menu từ session
	        $menu = $this->session->userdata('menu');

	        // Kiểm tra nếu đã có trong menu
	        $found = false;
	        foreach ($menu as &$item) {
	            if ($item['masanpham'] == $masanpham) {
	                // Nếu đã có trong menu, cộng số lượng
	                $item['soluong'] += $soluong;

	                if($item['soluong'] > $this->Model_Product->getById($masanpham)[0]['SoLuong']){
	                	if($code == $masanpham){
				        	$this->session->set_flashdata('error', 'Bạn đã đặt quá số lượng '.$this->Model_Product->getById($masanpham)[0]['SoLuong'].' sản phẩm!');
							return redirect(base_url().'?code='.$masanpham);
				        }else{
				        	$this->session->set_flashdata('error', 'Bạn đã đặt quá số lượng '.$this->Model_Product->getById($masanpham)[0]['SoLuong'].' sản phẩm!');
							return redirect(base_url());
				        }
					}

	                $found = true;
	                break;
	            }
	        }

	        if (!$found) {
	            // Nếu sản phẩm chưa có trong menu, thêm mới vào session
	            $menu[] = array(
	                'masanpham' => $masanpham,
	                'hinhanh' => $this->Model_Product->getById($masanpham)[0]['HinhAnh'],
	                'tensanpham' => $this->Model_Product->getById($masanpham)[0]['TenSanPham'],
	                'soluong' => $soluong,
	                'giaban' => $this->Model_Product->getById($masanpham)[0]['GiaBan']
	            );
	        }

	       	$tongtien = 0;

	       	foreach ($menu as &$item) {
	       		$tongtien += $item['soluong'] * $item['giaban'];
	       	}


	        // Lưu menu vào session
	        $this->session->set_userdata('menu', $menu);
	        $this->session->set_userdata('sumMenu', $tongtien);

	        if($code == $masanpham){
	        	$this->session->set_flashdata('success', 'Thêm sản phẩm vào menu thành công!');
				return redirect(base_url().'?code='.$masanpham);
	        }else{
	        	$this->session->set_flashdata('success', 'Thêm sản phẩm vào menu thành công!');
				return redirect(base_url());
	        }
		}
	}

	public function deleteMenu($masanpham) {
	    // Bắt đầu session nếu chưa được bắt đầu
	    if (!$this->session->userdata('menu')) {
	        $this->session->set_flashdata('error', 'Menu chưa được tạo!');
	        return redirect(base_url());
	    }

	    // Lấy menu từ session
	    $menu = $this->session->userdata('menu');

	    // Tìm kiếm sản phẩm trong menu
	    $found_key = array_search($masanpham, array_column($menu, 'masanpham'));

	    if ($found_key !== false) {
	        // Nếu sản phẩm tồn tại trong menu, xóa sản phẩm
	        unset($menu[$found_key]);
	        $this->session->set_userdata('menu', array_values($menu));

	        $tongtien = 0;

	       	foreach ($menu as &$item) {
	       		$tongtien += $item['soluong'] * $item['giaban'];
	       	}

	       	$this->session->set_userdata('sumMenu', $tongtien);

	        $this->session->set_flashdata('success', 'Đã xóa sản phẩm khỏi menu!');
	    } else {
	        // Nếu sản phẩm không tồn tại trong menu
	        $this->session->set_flashdata('error', 'Sản phẩm không có trong menu!');
	    }

	    return redirect(base_url());
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */