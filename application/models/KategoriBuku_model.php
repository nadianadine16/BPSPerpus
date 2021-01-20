<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class KategoriBuku_model extends CI_Model {
        public function getAllKategoriBuku() {
            $query = $this->db->get('kategori_buku');
            return $query->result_array();
        }
    }
?>
