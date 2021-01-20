<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_saran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kritik_saran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Kritik dan Saran | Perpustakaan BPS Kota Malang';
        $data['kritik_saran'] = $this->Kritik_saran_model->data_kritik_saran();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_kritik_saran',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function hapus_kritik_saran($id) {
        $this->Kritik_saran_model->hapus_kritik_saran($id);
        redirect('Kritik_saran/index','refresh');
    }
    public function prosesKritik()
    {
        $data['title'] = 'Dashboard | kritik';
     
        $this->form_validation->set_rules('id_pengunjung', 'id_pengunjung', 'required');
        $this->form_validation->set_rules('KritikSaran', 'KritikSaran', 'required');   
        
        // $cek_email = $this->user_model->cek_email($email);
        if($this->form_validation->run() == FALSE) {
            redirect('user/contactus','refresh');
        }
        else {
            $this->Kritik_saran_model->tambah_kritik();
            redirect('user/index','refresh');
        }
    }
}

/* End of file Kritik_saran.php */

?>