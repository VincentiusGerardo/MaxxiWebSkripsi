<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Administrator extends MY_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('model_admin');
        }
        
        public function index(){
            $data['namaKaryawan'] = $this->model_admin->getUserName($this->session->userdata('username'));
            $this->getHeader();
            $this->load->view('admin/home',$data);
            $this->load->view('footer');
        }
        
        /* Fleet */
        public function fleet(){
            $data['fleet'] = $this->model_admin->getFleet();
            $this->getHeader();
            $this->load->view();
            $this->load->view();
        }
        
        public function doInsertFleet(){
            
        }
        
        public function doUpdateFleet(){
            
        }
        
        public function doDeleteFleet(){
            
        }
        
        /* Customers */
        
        public function customers(){
            
        }
        
        public function doInsertCustomers(){
            
        }
        
        public function doUpdateCustomers(){
            
        }
        
        public function doDeleteCustomers(){
            
        }
        
        /* Experience */
        
        public function experience(){
            
        }
        
        public function doInsertExperience(){
            
        }
        
        public function doUpdateExperience(){
            
        }
        
        public function doDeleteExperience(){
            
        }
        
    }