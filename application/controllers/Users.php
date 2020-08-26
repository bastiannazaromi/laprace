<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(empty($this->session->userdata('Admin'))){
			redirect('Login','refresh');

		}
		$this->load->model('M_users');
	}
	
	public function index() 
	{
		// Function View index Controllers Users

		$data['isi'] = $this->db->get('tb_users')->result();

		$data['title'] = 'Tabel User';
		$data['page'] = 'Tabel User';
		$data['content'] = 'admin/tabel_user';
		$this->load->view('admin/menu', $data);
	}

	public function form_tambahuser()
	{
		$data['title'] = 'Form Tambah User';
		$data['page'] = 'Form Tambah User';
		$data['content'] = 'admin/form_tambahuser';
		$this->load->view('admin/menu', $data);
	}
	public function adduserpost()
	{
		$n = $this->input->post('nama');
		$p = $this->input->post('password');
		$x = $this->input->post('nil_x');
		$y = $this->input->post('nil_y');
		$w = $this->input->post('nil_w');
		$h = $this->input->post('nil_h');

		$data = array('nama' => $n ,
					  'password' => $p,
				      'nilai_x' => $x,
				      'nilai_y' => $y,
				      'nilai_w' => $w,
				      'nilai_h' => $h);

		$insert = $this->M_users->tambah($data);
		echo ($insert) ? 'sukses input user' : 'gagal' ;

		redirect('Users','refresh');
	}
	public function delete_user($id)
	{
		//fungsi untuk menghapus data di dalam tabel user
		$this->db->where('Id_user', $id);
		$delete =	$this->db->delete('tb_users');
		echo ($delete) ? 'sukses' : 'gagal' ;

		//setelah selesai sukses langsung kembali ke view tabel user
		redirect('Users','refresh');
	}
	public function edit_user($id)
	{
		$this->db->where('Id_user', $id);
		$data['isi'] = $this->db->get('tb_users')->row();
		$data['title'] = 'Form Edit User';
		$data['page'] = 'Form Edit User';
		$data['content'] = 'admin/form_edituser';
		$this->load->view('admin/menu', $data);
	}
	public function edituserpost($id)
	{
		$n = $this->input->post('nama');
		$p = $this->input->post('password');
		$x = $this->input->post('nil_x');
		$y = $this->input->post('nil_y');
		$w = $this->input->post('nil_w');
		$h = $this->input->post('nil_h');

		$data = array('nama' => $n ,
					  'password' => $p,
				      'nilai_x' => $x,
				      'nilai_y' => $y,
				      'nilai_w' => $w,
				      'nilai_h' => $h);

		$this->db->where('Id_user', $id);
        $update = $this->db->update('tb_users', $data);
		echo ($update) ? 'Sukses Edit' : 'Gagal Edit' ;
		
		redirect('Users','refresh');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */