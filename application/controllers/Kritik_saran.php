<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_saran extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Pengunjung_model');
        $this->load->model('KritikSaran_model');
        $this->load->library('form_validation');
    }  
    public function contactus(){
        $data['title'] = 'Contact Us';
        $data['pengunjung'] = $this->Pengunjung_model->getPengunjung();

        $this->load->view("template/user/header",$data);
        $this->load->view("user/contactus",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function prosesKritik()
    {
        $data['title'] = 'Dashboard | kritik';
     
        $this->form_validation->set_rules('id_pengunjung', 'id_pengunjung', 'required');
        $this->form_validation->set_rules('KritikSaran', 'KritikSaran', 'required');   
        
        // $cek_email = $this->user_model->cek_email($email);
        if($this->form_validation->run() == FALSE) {
            redirect('Kritik_saran/contactus','refresh');
        }
        else {
            $this->KritikSaran_model->tambah_kritik();
            redirect('user/dashboard_user','refresh');
        }
    }
}
?>