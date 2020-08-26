<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

	public function tambah($isi)
	{
		return $this->db->insert('tb_users', $isi);
	}
	public function edit_data($where,$table)
	{
		return $this->db->get($table,$where);
	}
	public function update_data($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_users', $data);
	}

	public function getAllUser()
	{
		return $this->db->get('tb_log')->result_array();
	}
	public function cariDataUser()
	{
		$keyword = $this->input->post('keyword', true);
        $this->db->like('tanggal', $keyword);
        $this->db->or_like('nama_user', $keyword);
        return $this->db->get('tb_log')->result_array();
	}
	public function getdataTabel($limit, $start)
    {
    	$this->db->order_by('id','DESC');
      	$query = $this->db->get('tb_log', $limit, $start);
      	return $query->result_array();
    }

    public function getMobil1()
    {
    	$this->db->select('*');
    	$this->db->from('tb_mobil_1');
    	$this->db->order_by('id', 'desc');
    	$this->db->limit(5);

 		return $this->db->get()->result_array();
    }

    public function getMobil2()
    {
    	$this->db->select('*');
    	$this->db->from('tb_mobil_2');
    	$this->db->order_by('id', 'desc');
    	$this->db->limit(5);

 		return $this->db->get()->result_array();
    }

}

/* End of file M_users.php */
/* Location: ./application/models/M_users.php */