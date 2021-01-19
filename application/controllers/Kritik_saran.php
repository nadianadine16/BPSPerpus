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

}

/* End of file Kritik_saran.php */

?>