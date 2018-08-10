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
            $query = $this->db->get_where('ms_customers', array('FlagActive' => 'Y'));
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
    }