<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_karyawan extends CI_Model{
        public function getAllKaryawan(){
            $this->db->select('a.*,b.NamaRole');
            $this->db->from('ms_karyawan a');
            $this->db->join('ms_role b', 'a.ID_Role = b.ID_Role', 'inner');
            $this->db->where('a.FlagActive','Y');
            $q = $this->db->get();
            return $q->result();
        }

        public function getPendidikanKaryawan($id){

        }

        public function getKeluarga($id){

        }

        public function insertKaryawan($data){
            $q = $this->db->insert('ms_karyawan',$data);
            if($q) return true; else return false;
        }
    }