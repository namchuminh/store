<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('login')){
			return redirect(base_url('admin/login/'));
		}
		$this->load->model('Admin/Model_Category');
	}

	public function index()
	{
		$data['title'] = "Danh sách chuyên mục";
		$data['list'] = $this->Model_Category->getAll();
		return $this->load->view('Admin/View_Category', $data);
	}

	public function Add(){
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/category/'));
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$mota = $this->input->post('mota');
			$hinhanh = "";

			if(empty($tenchuyenmuc) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin chuyên mục!";
				return $this->load->view('Admin/View_CategoryAdd', $data);
			}

			$hinhanh = "";

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh loại món ăn!";
				return $this->load->view('Admin/View_CategoryAdd', $data);
			}

			$this->Model_Category->insert($hinhanh, $mota, $tenchuyenmuc);

			$this->session->set_flashdata('success', 'Thêm chuyên mục mới thành công!');
			return redirect(base_url('admin/category/'));

		}

		$data['title'] = "Thêm mới chuyên mục";
		return $this->load->view('Admin/View_CategoryAdd', $data);
	}

	public function Update($machuyenmuc){

		if(count($this->Model_Category->getById($machuyenmuc)) <= 0){
			$this->session->set_flashdata('error', 'Chuyên mục không tồn tại trong hệ thống!');
			return redirect(base_url('admin/category/'));
		}

		$data['title'] = "Cập nhật chuyên mục";
		$data['detail'] = $this->Model_Category->getById($machuyenmuc);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if($this->session->userdata('role') != 1){
				$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
				return redirect(base_url('admin/category/'));
			}

			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$mota = $this->input->post('mota');
			$hinhanh = $this->Model_Category->getById($machuyenmuc)[0]['HinhAnh'];

			if(empty($tenchuyenmuc) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin chuyên mục!";
				return $this->load->view('Admin/View_CategoryUpdate', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_Category->update($hinhanh, $mota, $tenchuyenmuc, $machuyenmuc);

			$data['success'] = "Cập nhật chuyên mục thành công!";
			$data['detail'] = $this->Model_Category->getById($machuyenmuc);
			return $this->load->view('Admin/View_CategoryUpdate', $data);
		}
		return $this->load->view('Admin/View_CategoryUpdate', $data);
	}

	public function Delete($machuyenmuc){
		if($this->session->userdata('role') != 1){
			$this->session->set_flashdata('error', 'Bạn không đủ quyền thực hiện!');
			return redirect(base_url('admin/category/'));
		}

		if(count($this->Model_Category->getById($machuyenmuc)) <= 0){
			$this->session->set_flashdata('error', 'Chuyên mục không tồn tại trong hệ thống!');
			return redirect(base_url('admin/category/'));
		}

		$this->Model_Category->delete($machuyenmuc);
		$this->session->set_flashdata('success', 'Xóa chuyên mục thành công!');
		return redirect(base_url('admin/category/'));

	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */