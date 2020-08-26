<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function validasi($u, $p)
	{
		$this->db->where('username', $u);
		$this->db->where('password', $p);
		$data = $this->db->get('tb_user')->result();

		if(count($data)===1){
			$login = array('status' => 'login' ,
			'log_username'=> $u,
			'log_nama' => $data[0]->nama);
			
			
			$this->session->set_userdata('Admin', $login );
			return ($login) ? 'valid' : 'tidak valid' ;
		}
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */