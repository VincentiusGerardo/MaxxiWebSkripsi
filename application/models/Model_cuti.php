<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_cuti extends MY_Model{

        public function __construct(){
            parent::__construct();
        }

        public function getCuti($kode){
            $query = $this->db->get_where('tr_cuti',array('ID_Karyawan' => $kode));
            return $query->result();
        }

        public function insertCuti(){

        }

        public function updateCuti(){

        }
    }