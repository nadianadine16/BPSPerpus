<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_saran_model extends CI_Model {

    public function data_kritik_saran() {
        $this->db->select('*');
        $this->db->from('kritik_saran');
        $this->db->join('pengunjung', 'pengunjung.id_pengunjung = kritik_saran.id_pengunjung');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hapus_kritik_saran($id) {
        return $this->db->delete('kritik_saran',array("id_kritiksaran"=>$id));
    }
    public function tambah_kritik(){
        $this->id_kritiksaran=uniqid();
        $data = [
            "KritikSaran" => $this->input->post('KritikSaran', true),
            "id_pengunjung" => $this->input->post('id_pengunjung', true)
        ];
        $this->db->insert('kritik_saran', $data);
    }
}

/* End of file Kritik_saran_model.php */

?>