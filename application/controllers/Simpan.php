<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan extends CI_Controller {

	public function save()
	{
		$tanggal = date('Y-m-d H:i:s');

                $ket_mobil = $this->input->get('ket_mobil'); // harus sama dengan yg di arduiono IDE
                $lap = $this->input->get('lap');
                $waktu = $this->input->get('waktu');

                $data = [
                	"lap" => $lap,
                	"waktu" => $waktu
                ];

                if ($ket_mobil == "1")
                {
                	$this->db->insert('tb_mobil_1', $data);
                }
                else if ($ket_mobil == "2")
                {
                	$this->db->insert('tb_mobil_2', $data);
                }

                echo "Sukses";

        }

}

/* End of file Simpan.php */
/* Location: ./application/controllers/Simpan.php */