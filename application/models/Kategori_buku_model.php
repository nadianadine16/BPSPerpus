<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_buku_model extends CI_Model {

    public function getAllKategoriBuku() {
        $query = $this->db->get('kategori_buku');
        return $query->result_array();
    }

    
    public function tambah_data_kategori_buku() {
        $this->id_kategori = uniqid();
        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true),
        ];
        $this->db->insert('kategori_buku', $data);
    }

    public function getKategoriBukuById($id) {
        $query=$this->db->get_where('kategori_buku',array('id_kategori'=>$id));
        return $query->row_array();
    }

    public function edit_data_kategori_buku($id) {
        $post=$this->input->post();
        $this->id_kategori = $post["id_kategori"];
        $this->nama_kategori = $post["nama_kategori"];

        $this->db->update('kategori_buku',$this, array('id_kategori' => $post['id_kategori']));
    }

    public function hapus_data_kategori_buku($id) {
        return $this->db->delete('kategori_buku',array("id_kategori"=>$id));
    }

}

/* End of file Kategori_buku_model.php */

?>