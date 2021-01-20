<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Buku_model');
            $this->load->library('form_validation');
    }   
    public function buku(){
        $data['title'] = 'Buku';
        $data['dataBuku'] = $this->Buku_model->getBuku();
        
        $this->load->view("template/user/header",$data);
        $this->load->view("user/buku",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function detail_buku($id){
        $data['title'] = 'Detail Buku';
        $data['dataBuku'] = $this->Buku_model->detail_buku($id);
        $this->load->view("template/user/header",$data);
        $this->load->view("user/detail_buku",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function cari(){
        $data['title'] = 'Buku Search';
        $data['dataBuku'] = $this->Buku_model->getBuku();
        if($this->input->post('submit')){
            $keyword=  $this->input->post('keyword');
            $data['dataBuku'] = $this->Buku_model->search();
        }
        $this->load->view("template/user/header",$data);
        $this->load->view("user/buku",$data);
        $this->load->view("template/user/footer",$data);
        
    }
}
?>

