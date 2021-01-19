<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Kategori Buku | Perpustakaan BPS Kota Malang';
        $data['kategori'] = $this->Kategori_buku_model->getAllKategoriBuku();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_kategori_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_kategori_buku() {
        $data['title'] = 'Tambah Data Kategori Buku | Perpustakaan BPS Kota Malang';

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_kategori_buku',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Kategori_buku_model->tambah_data_kategori_buku();
            redirect('Kategori_buku/index','refresh');
        }
    }

    public function edit_data_kategori_buku($id) {
        $data['title'] = 'Edit Data Kategori Buku | Perpustakaan BPS Kota Malang';
        $data['kategori_buku'] = $this->Kategori_buku_model->getKategoriBukuById($id);
        
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_kategori_buku',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Kategori_buku_model->edit_data_kategori_buku($id);
            redirect('Kategori_buku/index','refresh');
        }
    }

    public function hapus_data_kategori_buku($id) {
        $this->Kategori_buku_model->hapus_data_kategori_buku($id);
        redirect('Kategori_buku/index','refresh');
    }
}

/* End of file Kategori_buku.php */

?>