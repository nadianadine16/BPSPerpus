<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($username, $password) {
        $this->db->select('id_user, nama, nip, jenis_kelamin, telepon, username, password, status');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows()==1) {
            return $query->result();
        }
        else {
            return false;
        }
    }

    public function hitung_admin() {
        return $this->db->get_where('user', array('status' => '1'))->num_rows();
    }

    public function hitung_supervisor() {
        return $this->db->get_where('user', array('status' => '2'))->num_rows();
    }

    public function hitung_kritik_saran() {
        return $this->db->count_all('kritik_saran');
    }

    public function hitung_pengunjung_datang() {
        return $this->db->get_where('pengunjung', array('status' => '1'))->num_rows();
    }

    public function hitung_pengunjung_pulang() {
        return $this->db->get_where('pengunjung', array('status' => '2'))->num_rows();
    }

    public function hitung_buku() {
        return $this->db->count_all('buku');
    }

    public function hitung_kategori_buku() {
        return $this->db->count_all('kategori_buku');
    }

    public function tambah_data_admin() {
        $this->id_user = uniqid();
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "telepon" => $this->input->post('telepon', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "status" => $this->input->post('status')
        ];
        $this->db->insert('user', $data);
    }

    public function getAllAdmin() {
        $status = 1;
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAdminById($id) {
        $query=$this->db->get_where('user',array('id_user'=>$id));
        return $query->row_array();
    }

    public function edit_data_admin($id) {
        $post=$this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->telepon = $post["telepon"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        
        $this->db->update('user',$this, array('id_user' => $post['id_user']));
    }

    public function hapus_data_admin($id) {
        return $this->db->delete('user',array("id_user"=>$id));
    }

    public function getAllSupervisor() {
        $status = 2;
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_data_supervisor() {
        $this->id_user = uniqid();
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "telepon" => $this->input->post('telepon', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "status" => $this->input->post('status')
        ];
        $this->db->insert('user', $data);
    }

    public function getSupervisorById($id) {
        $query=$this->db->get_where('user',array('id_user'=>$id));
        return $query->row_array();
    }

    public function edit_data_supervisor($id) {
        $post=$this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->telepon = $post["telepon"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        
        $this->db->update('user',$this, array('id_user' => $post['id_user']));
    }

    public function hapus_data_supervisor($id) {
        return $this->db->delete('user',array("id_user"=>$id));
    }

    public function getBuku() {
        $query = $this->db->get('buku');
        return $query->result_array();
    }
    public function getKategori() {
        $query = $this->db->get('kategori_buku');
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
    public function detail_buku($id){
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori');
        $this->db->where('buku.id_buku', $id);
        return $this->db->get()->result_array();
    }
}

/* End of file User_model.php */

?>
