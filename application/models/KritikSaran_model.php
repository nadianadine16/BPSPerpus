<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class KritikSaran_model extends CI_Model {        
        public function getPengunjung() {
            $query = $this->db->get('pengunjung');
            return $query->result_array();
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
?>
