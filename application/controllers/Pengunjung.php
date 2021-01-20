<?php

defined('BASEPATH') OR exit('No direct script access allowed');

<<<<<<< HEAD
class Pengunjung extends CI_Controller {

=======
class Pengunjung extends CI_Controller { 
>>>>>>> 14a1d14574d0117cd0b575f642c306fe1519e357
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
<<<<<<< HEAD
            $this->load->model('Pengunjung_model');
            $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Pengunjung Datang | Perpustakaan BPS Kota Malang';
        $data['pengunjung'] = $this->Pengunjung_model->getAllPengunjung();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_pengunjung_datang',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function data_pengunjung_pulang() {
        $data['title'] = 'Data Pengunjung Pulang | Perpustakaan BPS Kota Malang';
        $data['pengunjung'] = $this->Pengunjung_model->getAllPengunjungPulang();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_pengunjung_pulang',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function pengunjung_keluar($id) {
        $this->Pengunjung_model->pengunjung_keluar($id);
        redirect('Pengunjung/index', 'refresh');
    }

    public function hapus_data_pengunjung_pulang($id) {
        $this->Pengunjung_model->hapus_data_pengunjung($id);
        redirect('Pengunjung/data_pengunjung_pulang','refresh');
    }

    public function hapus_data_pengunjung_datang($id) {
        $this->Pengunjung_model->hapus_data_pengunjung($id);
        redirect('Pengunjung/index','refresh');
    }

    public function form_export() {
        $data['title'] = 'Form Export Data Pengunjung | Perpustakaan BPS Kota Malang';
        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/form_export',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function cetak() {
        $data['title'] = 'Cetak Data Pengunjung | Perpustakaan BPS Kota Malang';
        $tgl_awal = $this->input->post('tanggal_awal');
        $tgl_akhir = $this->input->post('tanggal_akhir');

        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if($tgl_awal != "" && $tgl_akhir != "") {
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			$excel = new PHPExcel();

			$excel->getProperties()->setCreator('Perpustakaan BPS Kota Malang')
			->setLastModifiedBy('Perpustakaan BPS Kota Malang')
			->setTitle("Data Pengunjung Perpustakaan BPS Kota Malang")
			->setSubject("Admin")
			->setDescription("Data Pengunjung")
            ->setKeywords("Data Pengunjung Perpustakaan BPS Kota Malang");
            
            $style_col = array(
				'font' => array('bold' => true), 
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
				)
            );
            
            $style_row = array(
				'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
				)
            );
            
            $filename = "Data Buku Tamu\"$tgl_awal - $tgl_akhir.xlsx";
            $judul = "Buku Tamu $tgl_awal - $tgl_akhir";
            
            $excel->setActiveSheetIndex(0)->setCellValue('A1', $judul); 
			$excel->getActiveSheet()->mergeCells('A1:J1'); 
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

			$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Pengunjugn"); 
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "Jenis Kelamin"); 
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "Alamat"); 
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "Telepon"); 
			$excel->setActiveSheetIndex(0)->setCellValue('F3', "Email"); 
			$excel->setActiveSheetIndex(0)->setCellValue('G3', "Pekerjaan"); 
			$excel->setActiveSheetIndex(0)->setCellValue('H3', "Tanggal Kunjung"); 
			$excel->setActiveSheetIndex(0)->setCellValue('I3', "Jam Masuk"); 
            $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jam Keluar");
            $excel->setActiveSheetIndex(0)->setCellValue('K3', "Buku");

            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);		
            $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);

            $pengunjung= $this->Pengunjung_model->cetak($tgl_awal,$tgl_akhir)->result();

            $no = 1; 
            $numrow = 4;
            foreach($pengunjung as $data){ 
				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_pengunjung);
				$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jenis_kelamin);
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->alamat);
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telepon);
				$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->email);
				$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->pekerjaan);
				$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->tanggal);
				$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->jam_masuk);
                $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->jam_keluar);
                $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->judul_buku);
				
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
				
				$no++; 
				$numrow++; 
            }
            
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);

            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

			$excel->getActiveSheet(0)->setTitle("Data Pengunjung");
            $excel->setActiveSheetIndex(0);
            
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
			header("Content-Disposition: attachment; filename=\"$filename\""); 
			header("Cache-Control: max-age=0");

			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
        }
        else {

        }
    }

    public function s_data_pengunjung_datang() {
        $data['title'] = 'Data Pengunjung Datang | Perpustakaan BPS Kota Malang';
        $data['pengunjung'] = $this->Pengunjung_model->getAllPengunjung();

        $this->load->view('template/admin/header',$data);
        $this->load->view('supervisor/s_data_pengunjung_datang',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function s_pengunjung_keluar($id) {
        $this->Pengunjung_model->pengunjung_keluar($id);
        redirect('Pengunjung/s_data_pengunjung_datang', 'refresh');
    }

    public function s_hapus_data_pengunjung_datang($id) {
        $this->Pengunjung_model->hapus_data_pengunjung($id);
        redirect('Pengunjung/s_data_pengunjung_datang','refresh');
    }

    public function s_data_pengunjung_pulang() {
        $data['title'] = 'Data Pengunjung Pulang | Perpustakaan BPS Kota Malang';
        $data['pengunjung'] = $this->Pengunjung_model->getAllPengunjungPulang();

        $this->load->view('template/admin/header',$data);
        $this->load->view('supervisor/s_data_pengunjung_pulang',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function s_hapus_data_pengunjung_pulang($id) {
        $this->Pengunjung_model->hapus_data_pengunjung($id);
        redirect('Pengunjung/s_data_pengunjung_datang','refresh');
    }

}

/* End of file Pengunjung.php */

=======
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
>>>>>>> 14a1d14574d0117cd0b575f642c306fe1519e357
?>