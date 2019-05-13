<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_karyawan extends CI_Model{
        public function getAllKaryawan(){
            $this->db->select('a.*,b.NamaRole');
            $this->db->from('ms_karyawan a');
            $this->db->join('ms_role b', 'a.ID_Role = b.ID_Role', 'inner');
            $this->db->where('a.FlagActive','Y');
            $this->db->order_by("a.ID_Karyawan", "asc");
            $q = $this->db->get();
            return $q->result();
        }
        
        public function insertKaryawan($data){
            $q = $this->db->insert('ms_karyawan',$data);
            if($q) return true; else return false;
        }

        public function updateKaryawan($id,$data){
            $cond = array('ID_Karyawan' => $id);
            $q = $this->db->update('ms_karyawan',$data,$cond);
            if($q) return true; else return false;
        }

        public function deleteKaryawan($id){
            $cond = array('FlagActive' => 'N');
            $kode = array('ID_Karyawan' => $id);
            $q = $this->db->update('ms_karyawan',$cond,$kode);
            if($q) return true; else return false;
        }
    }