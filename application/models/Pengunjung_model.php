<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pengunjung_model extends CI_Model {        
        public function getPengunjung() {
            $query = $this->db->get('pengunjung');
            return $query->result_array();
        }
        public function tambah_pengunjung(){
            $this->id_pengunjung=uniqid();
            $data = [
                "nama_pengunjung" => $this->input->post('nama_pengunjung', true),
                "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
                "alamat" => $this->input->post('alamat', true),
                "telepon" => $this->input->post('telepon', true),
                "email" => $this->input->post('email', true),
                "pekerjaan" => $this->input->post('pekerjaan', true),
                "id_buku" => $this->input->post('id_buku', true)
            ];
            $this->db->set('tanggal', 'NOW()', FALSE);
            $this->db->set('jam_masuk', 'NOW()', FALSE);
            $this->db->insert('pengunjung', $data);
        }
    }
?>
