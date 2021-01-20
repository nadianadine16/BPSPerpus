<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model {
    var $CI = NULL;

    public function __construct() {
		$this->CI =& get_instance();
	}

    public function getAllPengunjung() {
        $status = 1;
        $this->db->select('*');
        $this->db->from('pengunjung');
        $this->db->join('buku', 'buku.id_buku = pengunjung.id_buku');
        $this->db->where(array('pengunjung.status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllPengunjungPulang() {
        $status = 2;
        $this->db->select('*');
        $this->db->from('pengunjung');
        $this->db->join('buku', 'buku.id_buku = pengunjung.id_buku');
        $this->db->where(array('pengunjung.status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pengunjung_keluar($id) {
        date_default_timezone_set('Asia/Jakarta');
        $data = date('Y-m-d H:i:s', time());

        $this->db->set('jam_keluar',$data);
        $this->db->set('status', 2);
        $this->db->where('id_pengunjung',$id);
        
        $this->db->update("pengunjung");
    }

    public function cetak($tgl_awal, $tgl_akhir) {
        $query=$this->CI->db->query("SELECT * FROM pengunjung as p join buku as b on p.id_buku = b.id_buku where p.status like '2' and p.tanggal BETWEEN '".$tgl_awal."' and '".$tgl_akhir."' GROUP by p.id_pengunjung ");
				return $query;
    }

    public function hapus_data_pengunjung($id) {
        return $this->db->delete('pengunjung',array("id_pengunjung"=>$id));
    }

}

/* End of file Pengunjugn_model.php */

?>
