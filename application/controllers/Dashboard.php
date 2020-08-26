<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(empty($this->session->userdata('Admin'))){
			redirect('Auth','refresh');
		}
		$this->load->model('M_users');
	}

	public function index()
	{
        // //config
        $this->db->from('tb_log');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $data['start'] = $this->uri->segment(3);
		$data['isitabel'] = $this->M_users->getdataTabel($config['per_page'], $data['start']);

		//end pagination

		$data['jumlahuser'] = $this->db->get('tb_users')->num_rows();
		$data['jumlahlogin'] = $this->db->get('tb_log')->num_rows();

		$data['mobil_1'] = $this->M_users->getMobil1();
		$data['mobil_2'] = $this->M_users->getMobil2();

		$data['title'] = 'MONITORING PENGHITUNG LAP RACE';
		$data['page'] = 'MONITORING PENGHITUNG LAP RACE ';
		$data['content'] = 'admin/dashboard';
		$this->load->view('admin/menu', $data);
	}

	public function tabel_log()
	{
		$data['isi'] = $this->M_users->getAllUser();
        if( $this->input->post('keyword') ) {
            $data['isi'] = $this->M_users->cariDataUser();
        }

		$data['title'] = 'Log Login';
		$data['page'] = 'Log Login';
		$data['content'] = 'admin/tabel_log';
		$this->load->view('admin/menu', $data);
	}

	public function profil()
	{
		$data['title'] = 'Profil';
		$data['page'] = 'Biodata';
		$data['content'] = 'admin/profil';
		$this->load->view('admin/menu', $data);
	}

	public function dashboard_realtime()
	{
		$mobil_1 = $this->M_users->getMobil1();
		$mobil_2 = $this->M_users->getMobil2();

		$data = [
			"mobil_1" => $mobil_1[0]['lap'],
			"waktu_1" => $mobil_1[0]['waktu'],
			"mobil_2" => $mobil_2[0]['lap'],
			"waktu_2" => $mobil_2[0]['waktu']
		];

		echo json_encode($data);
	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */