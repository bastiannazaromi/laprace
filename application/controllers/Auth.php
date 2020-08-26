<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function loginproses()
	{
		$user = $this->input->post('username');
		$pass = md5($this->input->post('pw'));
		$this->load->model('M_login');
		$cek = $this->M_login->validasi($user,$pass);
		if($cek='valid'){
			redirect('Dashboard','refresh');
		} else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
			redirect('Auth','refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy($this->session->userdata('Admin'));
		redirect('Auth','refresh');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */