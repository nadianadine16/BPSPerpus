<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Buku_model->getAllBuku();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_data_buku() {
        $data['title'] = 'Tambah Data Buku | Perpustakaan BPS Kota Malang';
        $data['kategori'] = $this->Buku_model->getAllKategoriBuku();
        $data['status'] = ['Tersedia Softcopy','Belum Tersedia Softcopy'];

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('nomor_katalog', 'Nomor Katalog', 'required');
        $this->form_validation->set_rules('tahun_rilis', 'Tahun', 'required');
        $this->form_validation->set_rules('id_kategori', 'Katgeori Buku', 'required');
        $this->form_validation->set_rules('letak', 'letak', 'required');
        $this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_buku',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Buku_model->tambah_data_buku();
            redirect('Buku/index','refresh');
        }
    }

    public function edit_data_buku($id) {
        $data['title'] = 'Edit Data Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Buku_model->getBukuById($id);
        $data['kategori'] = $this->Buku_model->getAllKategoriBuku();
        $data['status'] = ['Tersedia Softcopy', 'Belum Tersedia Softcopy'];

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('nomor_katalog', 'Nomor Katalog', 'required');
        $this->form_validation->set_rules('tahun_rilis', 'Tahun', 'required');
        $this->form_validation->set_rules('id_kategori', 'Katgeori Buku', 'required');
        $this->form_validation->set_rules('letak', 'letak', 'required');
        $this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_buku', $data);
            $this->load->view('template/admin/footer');
        }
        else {
            $this->Buku_model->edit_data_buku($id);
            redirect('Buku/index','refresh');
        }
    }

    public function hapus_data_buku($id) {
        $this->Buku_model->hapus_data_buku($id);
        redirect('Buku/index','refresh');
    }

    public function detail_buku($id) {
        $data['title'] = 'Detail Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Buku_model->detail_buku($id);

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/detail_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function s_data_buku() {
        $data['title'] = 'Data Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Buku_model->getAllBuku();

        $this->load->view('template/admin/header',$data);
        $this->load->view('supervisor/s_data_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function s_tambah_data_buku() {
        $data['title'] = 'Tambah Data Buku | Perpustakaan BPS Kota Malang';
        $data['kategori'] = $this->Buku_model->getAllKategoriBuku();
        $data['status'] = ['Tersedia Softcopy','Belum Tersedia Softcopy'];

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('nomor_katalog', 'Nomor Katalog', 'required');
        $this->form_validation->set_rules('tahun_rilis', 'Tahun', 'required');
        $this->form_validation->set_rules('id_kategori', 'Katgeori Buku', 'required');
        $this->form_validation->set_rules('letak', 'letak', 'required');
        $this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('supervisor/s_tambah_data_buku',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Buku_model->tambah_data_buku();
            redirect('Buku/s_data_buku','refresh');
        }
    }

    public function s_edit_data_buku($id) {
        $data['title'] = 'Edit Data Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Buku_model->getBukuById($id);
        $data['kategori'] = $this->Buku_model->getAllKategoriBuku();
        $data['status'] = ['Tersedia Softcopy', 'Belum Tersedia Softcopy'];

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('nomor_katalog', 'Nomor Katalog', 'required');
        $this->form_validation->set_rules('tahun_rilis', 'Tahun', 'required');
        $this->form_validation->set_rules('id_kategori', 'Katgeori Buku', 'required');
        $this->form_validation->set_rules('letak', 'letak', 'required');
        $this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('supervisor/s_edit_data_buku', $data);
            $this->load->view('template/admin/footer');
        }
        else {
            $this->Buku_model->edit_data_buku($id);
            redirect('Buku/s_data_buku','refresh');
        }
    }

    public function s_hapus_data_buku($id) {
        $this->Buku_model->hapus_data_buku($id);
        redirect('Buku/s_data_buku','refresh');
    }

    public function s_detail_buku($id) {
        $data['title'] = 'Detail Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Buku_model->detail_buku($id);

        $this->load->view('template/admin/header',$data);
        $this->load->view('supervisor/s_detail_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

}

/* End of file Buku.php */

?>