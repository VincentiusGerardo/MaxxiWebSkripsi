<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Model extends CI_Model{
        public function __construct(){
            parent::__construct();      
        }
        
        public function getMenu($role){
            $query = $this->db->get_where('ms_menu', array('ID_Role' => $role));
            return $query->result();
        }
        
        public function getSubMenu($role){
            $query = $this->db->get_where('ms_submenu', array('ID_Role' => $role));
            return $query->result();
        }
        
        public function getUserName($kode){
            $query = $this->db->get_where('ms_karyawan', array('KodeKaryawan' => $kode));
            return $query->row()->NamaKaryawan;
        }
    }