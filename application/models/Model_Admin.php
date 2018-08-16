<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_Admin extends MY_Model{

        public function __construct(){
            parent::__construct();
        }
        
        /* Fleet */
        
        public function getFleet(){
            $query = $this->db->get_where('ms_fleet', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertFleet(){
            //$this->form_validation->set_rules();
            
            /*if($this->form_validation->run() == TRUE){
                
            }else{
                
            }*/
        }
        
        public function updateFleet(){
            
        }
        
        public function deleteFleet(){
            
        }
        
        /* Services */
        
        public function getServices(){
            $query = $this->db->get_where('ms_services', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertServices(){
            
        }
        
        public function updateServices(){
            
        }
        
        public function deleteServices(){
            
        }
        
        /* About */
        
        public function getAbout(){
            $query = $this->db->get_where('ms_about', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertAbout(){
            
        }
        
        public function updateAbout(){
            
        }
        
        public function deleteAbout(){
            
        }
        
        /* Facility */
        
        public function getFacility(){
            $query = $this->db->get_where('ms_facility', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertFacility(){
            
        }
        
        public function updateFacility(){
            
        }
        
        public function deleteFacility(){
            
        }
        
        /* Customers */
        
        public function getCustomers(){
            $query = $this->db->get_where('ms_customer', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertCustomers(){
            
        }
        
        public function updateCustomers(){
            
        }
        
        public function deleteCustomers(){
            
        }
        
        /* Experience Gallery */
        
        public function getExperience(){
            $query = $this->db->get_where('ms_experience', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertExperience(){
            
        }
        
        public function updateExperience(){
            
        }
        
        public function deleteExperience(){
            
        }
        
        /* Mission Control */
        
        public function getKaryawan(){
            $query = $this->db->get_where('ms_karyawan', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function getMenuByKode($kode){
            $this->db->select('a.ID_Menu, a.NamaMenu');
            $this->db->from('ms_menu a');
            $this->db->join('tr_authorizemenu b','a.ID_Menu = b.ID_Menu', 'inner');
            $this->db->where('b.KodeKaryawan', $kode);
            $query = $this->db->get();
            
            return $query->result();
        }
        
        public function getAllMenu(){
            $query = $this->db->get_where('ms_menu', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function getAllSubMenu(){
            $this->db->select('a.ID_SubMenu, a.NamaSubMenu, b.NamaMenu, a.List');
            $this->db->from('ms_submenu a');
            $this->db->join('ms_menu b', 'a.ID_Menu = b.ID_Menu', 'inner');
            $this->db->where('a.FlagActive','Y');
            
            $query = $this->db->get();

            return $query->result();
        }
        
        public function insertAuthMenu($data){
            $query = $this->db->insert_batch('tr_authorizemenu',$data);
        }
    }