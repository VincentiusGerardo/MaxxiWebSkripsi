<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Model extends CI_Model{

        public function __construct(){
            parent::__construct();
        }

        public function getMenu($kode){
            $this->db->select('b.ID_Menu,b.NamaMenu,b.URL,b.Logo');
            $this->db->from('tr_authorizemenu a');
            $this->db->join('ms_menu b','a.ID_Menu = b.ID_Menu','inner');
            $this->db->where('a.ID_Karyawan', $kode);
            $this->db->where('b.FlagActive', 'Y');

            $query = $this->db->get();
            return $query->result();
            //$query = $this->db->get_compiled_select();
            //echo $query;
            /*
                SELECT b.ID_Menu,b.NamaMenu,b.URL,b.List
                FROM tr_authorizemenu a, ms_menu b
                WHERE a.ID_Menu = b.ID_Menu
                AND b.FlagActive = 'Y'
                AND a.ID_Karyawan = '$kode'
            $query = $this->db->get_where('ms_menu', array('ID_Role' => $role));
            return $query->result();
            */
        }

        public function getUserName($kode){
            $query = $this->db->get_where('ms_karyawan', array('ID_Karyawan' => $kode));
            return $query->row()->NamaKaryawan;
        }

        public function updatePass($pass,$kode){
            $data = array('Password' => password_hash($pass, PASSWORD_DEFAULT));
            $this->db->set($data);
            $this->db->where('ID_Karyawan', $kode);
            $query = $this->db->update('ms_karyawan');

            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function getStoredPass($kode){
            $cond = array('ID_Karyawan' => $kode);
            $q = $this->db->get_where('ms_karyawan',$cond);

            if($q->num_rows() > 0){
                $rs = $q->row();
                return $rs->Password;
            }else{
                return FALSE;
            }
        }

        public function validasi($pass,$kode){
            if(password_verify($pass, $this->getStoredPass($kode))){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function getKaryawan(){
            $query = $this->db->get_where('ms_karyawan', array('FlagActive' => 'Y'));
            return $query->result();
        }

        public function getRoleName($id){
            $query = $this->db->get_where('ms_role',array('ID_Role' => $id));
            return $query->row()->NamaRole;
        }
    }