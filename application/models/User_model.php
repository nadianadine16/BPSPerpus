<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model {        
        function login($username, $password) {
            $this->db->select('id_user, nama, nip, jenis_kelamin, telepon, username, password, status');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->limit(1);

            $query = $this->db->get();
            if($query->num_rows()==1) {
                return $query->result();
            }
            else {
                return false;
            }
        }
    }
?>
