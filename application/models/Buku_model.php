<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Buku_model extends CI_Model {
        public function getBuku() {
            $query = $this->db->get('buku');
            return $query->result_array();
        }
        public function detail_buku($id){
            $this->db->select('*');
            $this->db->from('buku');
            $this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori');
            $this->db->where('buku.id_buku', $id);
            return $this->db->get()->result_array();
        }
        public function search(){
            $keyword=$this->input->post('keyword');
            $this->db->like('judul_buku', $keyword);
            return $this->db->get('buku')->result_array();
        }
        
    }
?>