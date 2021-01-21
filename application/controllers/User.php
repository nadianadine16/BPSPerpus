<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('User_model');
            $this->load->model('Buku_model');
            $this->load->library('form_validation');
            $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Perpustakaan BPS Kota Malang';

        $this->load->view("template/user/header",$data);
        $this->load->view("User/index",$data);
        $this->load->view("template/user/footer",$data);
    }

    public function login_user() 
    {
        $data['title'] = 'Login | Perpustakaan BPS Kota Malang';
        $this->load->view('login/index', $data);
    }

    public function proses_login()
    {
        $data['title'] = 'Login | Perpustakaan BPS Kota Malang';

        $username=htmlspecialchars($this->input->post('uname1'));
        $password=htmlspecialchars($this->input->post('pwd1'));
            
        $cek_login = $this->User_model->login($username,$password);

        if($cek_login) {
            foreach ($cek_login as $row);
                $this->session->set_userdata('user', $row->username);
                $this->session->set_userdata('id_user', $row->id_user);
                $this->session->set_userdata('nama', $row->nama);
                $this->session->set_userdata('status', $row->status);
                $this->session->set_userdata('nip', $row->nip);
                $this->session->set_userdata('jenis_kelamin', $row->jenis_kelamin);
                $this->session->set_userdata('telepon', $row->telepon);

                if($this->session->userdata('status') == 1) {
                    redirect('User/dashboard_admin');
                }
                else if($this->session->userdata('status') == 2) {
                    redirect('User/dashboard_supervisor');
                }
            }
        else {
            $data['pesan'] = 'Username dan Password Anda Salah';
            $data['title'] = 'Login | Perpustakaan BPS Kota Malang';
            $this->load->view('login/index', $data);
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('User','refresh');
    }

    public function dashboard_admin() {
        $data['title'] = 'Dashboard Admin | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->User_model->hitung_buku();
        $data['pengunjung_datang'] = $this->User_model->hitung_pengunjung_datang();
        $data['pengunjung_pulang'] = $this->User_model->hitung_pengunjung_pulang();
        $data['admin'] = $this->User_model->hitung_admin();
        $data['supervisor'] = $this->User_model->hitung_supervisor();
        $data['kategori_buku'] = $this->User_model->hitung_kategori_buku();
        $data['kritik_saran'] = $this->User_model->hitung_kritik_saran();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function data_admin() {
        $data['title'] = 'Data Admin | Perpustakaan BPS Kota Malang';
        $data['admin'] = $this->User_model->getAllAdmin();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_admin',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_data_admin() {
        $data['title'] = 'Tambah Data Admin | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_admin',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->User_model->tambah_data_admin();
            redirect('User/data_admin','refresh');
        }
    }

    public function edit_data_admin($id) {
        $data['title'] = 'Edit Data Admin | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        $data['admin'] = $this->User_model->getAdminById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_admin', $data);
            $this->load->view('template/admin/footer');
        }
        else {
            $this->User_model->edit_data_admin($id);
            redirect('User/data_admin','refresh');
        }
    }

    public function hapus_data_admin($id) {
        $this->User_model->hapus_data_admin($id);
        redirect('User/data_admin','refresh');
    }

    public function data_supervisor() {
        $data['title'] = 'Data Supervisor | Perpustakaan BPS Kota Malang';
        $data['supervisor'] = $this->User_model->getAllSupervisor();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_supervisor',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_data_supervisor() {
        $data['title'] = 'Tambah Data Supervisor | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_supervisor',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->User_model->tambah_data_supervisor();
            redirect('User/data_supervisor','refresh');
        }
    }

    public function edit_data_supervisor($id) {
        $data['title'] = 'Edit Data Supervisor | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        $data['admin'] = $this->User_model->getSupervisorById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_supervisor', $data);
            $this->load->view('template/admin/footer');
        }
        else {
            $this->User_model->edit_data_supervisor($id);
            redirect('User/data_supervisor','refresh');
        }
    }

    public function hapus_data_supervisor($id) {
        $this->User_model->hapus_data_supervisor($id);
        redirect('User/data_supervisor','refresh');
    }

    public function contactus(){
        $data['title'] = 'Contact Us';
        $data['pengunjung'] = $this->User_model->getPengunjung();

        $this->load->view("template/user/header",$data);
        $this->load->view("user/contactus",$data);
        $this->load->view("template/user/footer",$data);
    }

    public function bukuTamu(){
        $data['title'] = 'Buku Tamu';
        $data['judulBuku'] = $this->User_model->getBuku();
        $data['kategori'] = $this->User_model->getKategori();
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        
        $this->load->view("template/user/header",$data);
        $this->load->view("user/bukutamu",$data);
    }

    public function tambah_pengunjung(){
        $data['title'] = 'Buku Tamu | Perpustakaan BPS Kota Malang';
        $data['judulBuku'] = $this->User_model->getBuku();
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama_pengunjung', 'nama_pengunjung', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('id_buku', 'id_buku', 'required');


        if($this->form_validation->run() == FALSE) {
            $this->load->view("template/user/header",$data);
            $this->load->view("user/bukutamu",$data);
            $this->load->view("template/user/footer",$data);
        }
        else {
            $cek = $this->db->query("SELECT * FROM pengunjung where email='".$this->input->post('email')."'")->num_rows();
            if ($cek<=0){
                $this->User_model->tambah_pengunjung();
                redirect('User/index','refresh');   
            }
            else{
            $data['pesan'] = 'Email anda telah digunakan';
            $this->load->view("template/user/header",$data);
            $this->load->view("user/bukutamu",$data);
            $this->load->view("template/user/footer",$data);
            }
        }
    }

    public function buku() {
        $config['base_url'] = site_url('user/buku'); //site url
        $config['total_rows'] = $this->db->count_all('buku'); //total row
        $config['per_page'] = 8;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['title'] = 'Buku';
        $data['dataBuku'] = $this->Buku_model->getBukuByPage($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view("template/user/header",$data);
        $this->load->view("user/buku",$data);
        $this->load->view("template/user/footer",$data);
    }

    public function detail_buku($id) {
        $data['title'] = 'Detail Buku';
        $data['dataBuku'] = $this->User_model->detail_buku($id);
        $this->load->view("template/user/header",$data);
        $this->load->view("user/detail_buku",$data);
        $this->load->view("template/user/footer",$data);
    }

    public function dashboard_supervisor() {
        $data['title'] = 'Dashboard Supervisor | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->User_model->hitung_buku();
        $data['pengunjung_datang'] = $this->User_model->hitung_pengunjung_datang();
        $data['pengunjung_pulang'] = $this->User_model->hitung_pengunjung_pulang();

        $this->load->view('template/admin/header',$data);
        $this->load->view('supervisor/index',$data);
        $this->load->view('template/admin/footer',$data);
    }
}

/* End of file User.php */

?>