<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller { 
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Buku_model');
            $this->load->model('KategoriBuku_model');
            $this->load->model('Pengunjung_model');
            $this->load->library('form_validation');
    }   
    public function bukuTamu(){
        $data['title'] = 'Buku Tamu';
        $data['judulBuku'] = $this->Buku_model->getBuku();
        $data['kategori'] = $this->KategoriBuku_model->getAllKategoriBuku();
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        
        $this->load->view("template/user/header",$data);
        $this->load->view("user/bukutamu",$data);
        
    }
    public function tambahPengunjung(){
        $data['title'] = 'Buku Tamu';
        $data['judulBuku'] = $this->Buku_model->getBuku();
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama_pengunjung', 'nama_pengunjung', 'required');
        // $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        // $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        // $this->form_validation->set_rules('jam_masuk', 'jam_masuk', 'required');
        $this->form_validation->set_rules('id_buku', 'id_buku', 'required');


        if($this->form_validation->run() == FALSE) {
            $this->load->view("template/user/header",$data);
            $this->load->view("user/bukutamu",$data);
            $this->load->view("template/user/footer",$data);
        }
        else {
            $cek = $this->db->query("SELECT * FROM pengunjung where email='".$this->input->post('email')."'")->num_rows();
            if ($cek<=0){
                $this->Pengunjung_model->tambah_pengunjung();
                redirect('user/dashboard_user','refresh');   
            }
            else{
            $data['pesan'] = 'Email anda telah digunakan';
            $this->load->view("template/user/header",$data);
            $this->load->view("user/bukutamu",$data);
            $this->load->view("template/user/footer",$data);
            }
        }
    }  
}
?>