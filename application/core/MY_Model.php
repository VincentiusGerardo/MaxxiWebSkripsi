<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Model extends CI_Model{
        public function __construct(){
            parent::__construct();      
        }
        
        public function getMenu($kode){
            $this->db->select('b.ID_Menu,b.NamaMenu,b.URL,b.List');
            $this->db->from('tr_authorizemenu a');
            $this->db->join('ms_menu b','a.ID_Menu = b.ID_Menu','inner');
            $this->db->where('a.KodeKaryawan', $kode);
            
            $query = $this->db->get();
            return $query->result();
            //$query = $this->db->get_compiled_select();
            //echo $query;
            /*
                SELECT b.ID_Menu,b.NamaMenu,b.URL,b.List
                FROM tr_authorizemenu a, ms_menu b
                WHERE a.ID_Menu = b.ID_Menu
                AND b.FlagActive = 'Y'
                AND a.KodeKaryawan = '$kode'
            $query = $this->db->get_where('ms_menu', array('ID_Role' => $role));
            return $query->result();
            */
        }
        
        public function getSubMenu($kode){
            $this->db->select('b.ID_SubMenu,b.NamaSubMenu,b.URL,b.List');
            $this->db->from('tr_authorizesubmenu a');
            $this->db->join('ms_submenu b','a.ID_SubMenu = b.ID_SubMenu','inner');
            $this->db->where('a.KodeKaryawan', $kode);
            
            $query = $this->db->get();
            return $query->result();
        }
        
        public function getUserName($kode){
            $query = $this->db->get_where('ms_karyawan', array('KodeKaryawan' => $kode));
            return $query->row()->NamaKaryawan;
        }
        
        public function updatePass($pass,$kode){
            $data = array('Password' => $this->hashPassword($pass));
            $this->db->set($data);
            $this->db->where('KodeKaryawan', $kode);
            $query = $this->db->update('ms_karyawan');
            
            return $query;
        }
        
        public function hashPassword($pass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            return $hash;
        }
    }