<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_missioncontrol extends MY_Model{

        public function __construct(){
            parent::__construct();
        }

        public function getMenuByKode($kode){
            $this->db->select('a.ID_Menu, a.NamaMenu');
            $this->db->from('ms_menu a');
            $this->db->join('tr_authorizemenu b','a.ID_Menu = b.ID_Menu', 'inner');
            $this->db->where('b.ID_Karyawan', $kode);
            $query = $this->db->get();

            return $query->result();
        }

        public function getAllMenu(){
            $query = $this->db->get_where('ms_menu', array('FlagActive' => 'Y'));
            return $query->result();
        }

        public function getAllSubMenu(){
            $this->db->select('a.ID_SubMenu, a.NamaSubMenu, b.NamaMenu,a.ID_Menu,a.URL');
            $this->db->from('ms_submenu a');
            $this->db->join('ms_menu b', 'a.ID_Menu = b.ID_Menu', 'inner');
            $this->db->where('a.FlagActive','Y');

            $query = $this->db->get();

            return $query->result();
        }

        public function getAllSub(){
            $query = $this->db->get_where('ms_submenu', array('FlagActive' => 'Y'));
            return $query->result();
        }

        public function insertAuthMenu($data){
            $query = $this->db->insert_batch('tr_authorizemenu',$data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function insertAuthSubMenu($data){
            $query = $this->db->insert_batch('tr_authorizesubmenu', $data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function insertMasterMenu($data){
            $res = $this->db->insert('ms_menu',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function updateMasterMenu($kode,$data){
            $cond = array('ID_Menu' => $kode);
            $res = $this->db->update('ms_menu',$data,$cond);

            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function deleteMasterMenu($kode){
            $data = array('FlagActive' => 'N');
            $cond = array('ID_Menu' => $kode);
            $res = $this->db->update('ms_menu',$data,$cond);

            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function getSubFromMenu(){
            $query = $this->db->get_where('ms_menu', array('FlagActive' => 'Y', 'URL' => '#'));
            return $query->result();
        }

        public function insertSubMenu($data){
            $res = $this->db->insert('ms_submenu',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function updateSubMenu($id,$data){
            $cond = array('ID_SubMenu' => $id);
            $res = $this->db->update('ms_submenu',$data,$cond);

            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function deleteSubMenu($id){
            $data = array('FlagActive' => 'N');
            $cond = array('ID_SubMenu' => $id);
            $res = $this->db->update('ms_submenu', $data,$cond);

            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function getSubMenuByKode($n){
            $this->db->select('a.ID_SubMenu, a.NamaSubMenu');
            $this->db->from('ms_submenu a');
            $this->db->join('tr_authorizesubmenu b','a.ID_SubMenu = b.ID_SubMenu', 'inner');
            $this->db->where('b.ID_Karyawan', $n);
            $query = $this->db->get();

            return $query->result();
        }
    }