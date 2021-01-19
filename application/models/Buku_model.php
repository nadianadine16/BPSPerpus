<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    public function getAllBuku() {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_data_buku() {
        $this->id_buku = uniqid();
        $data = [
            "judul_buku" => $this->input->post('judul_buku', true),
            "nomor_katalog" => $this->input->post('nomor_katalog', true),
            "isbn" => $this->input->post('isbn', true),
            "tahun_rilis" => $this->input->post('tahun_rilis', true),
            "id_kategori" => $this->input->post('id_kategori', true),
            "letak" => $this->input->post('letak', true),
            "jumlah_halaman" => $this->input->post('jumlah_halaman', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "status" => $this->input->post('status'),
            "cover" => $this->uploadCoverBuku(),
            "file_buku" => $this->uploadFileBuku()
        ];
        $this->db->insert('buku', $data);
    }

    public function uploadCoverBuku() {
        $config['upload_path'] = './upload/buku/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->id_buku;
        $config['overwrite'] = true;
        // $config['max_size'] = 1024;

        $this->upload->initialize($config);
        $this->load->library('upload',$config);
        if($this->upload->do_upload('cover')) {
            return $this->upload->data("file_name");
        }
    }

    public function uploadFileBuku() {
        $config['upload_path'] = './upload/buku/';
        $config['allowed_types'] = 'pdf|docx';
        $config['file_name'] = $this->id_buku;
        $config['overwrite'] = true;
        // $config['max_size'] = 1024;

        $this->upload->initialize($config);
        $this->load->library('upload',$config);
        if($this->upload->do_upload('file_buku')) {
            return $this->upload->data("file_name");
        }
    }

    public function getBukuById($id) {
        $query=$this->db->get_where('buku',array('id_buku'=>$id));
        return $query->row_array();
    }

    public function edit_data_buku($id) {
        $post=$this->input->post();
        $this->id_buku = $post["id_buku"];
        $this->judul_buku = $post["judul_buku"];
        $this->nomor_katalog = $post["nomor_katalog"];
        $this->isbn = $post["isbn"];
        $this->tahun_rilis = $post["tahun_rilis"];
        $this->id_kategori = $post["id_kategori"];
        $this->letak = $post["letak"];
        $this->jumlah_halaman = $post["jumlah_halaman"];
        $this->deskripsi = $post["deskripsi"];
        $this->status = $post["status"];
        $this->cover = $this->uploadCoverBuku();
        
        $this->db->update('buku',$this, array('id_buku' => $post['id_buku']));
    }

    public function hapus_data_buku($id) {
        return $this->db->delete('buku',array("id_buku"=>$id));
    }

    public function detail_buku($id) {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori');
        $this->db->where('buku.id_buku', $id);
        return $this->db->get()->result_array();
    }

    public function getAllKategoriBuku() {
        $query = $this->db->get('kategori_buku');
        return $query->result_array();
    }
}

/* End of file Buku.php */

?>