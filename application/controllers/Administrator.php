<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Administrator extends MY_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('model_admin');
        }
        
        public function index(){
            $this->getHeader();
            $this->load->view('home');
            $this->load->view('footer');
        }
        
        /* Fleet */
        public function fleet(){
            $data['fleet'] = $this->model_admin->getFleet();
            $this->getHeader();
            $this->load->view('admin/fleet',$data);
            $this->load->view('footer');
        }
        
        public function doInsertFleet(){
            
        }
        
        public function doUpdateFleet(){
            
        }
        
        public function doDeleteFleet(){
            
        }
        
        /* Customers */
        
        public function customers(){
            $data['customer'] = $this->model_admin->getCustomers();
            $this->getHeader();
            $this->load->view('admin/customers',$data);
            $this->load->view('footer');
        }
        
        public function doInsertCustomers(){
            
        }
        
        public function doUpdateCustomers(){
            
        }
        
        public function doDeleteCustomers(){
            
        }
        
        /* Experience */
        
        public function experience(){
            $this->getHeader();
            $this->load->view('admin/experience');
            $this->load->view('footer');
        }
        
        public function doInsertExperience(){
            
        }
        
        public function doUpdateExperience(){
            
        }
        
        public function doDeleteExperience(){
            
        }
        
        /* UserManagement */
        
        public function users(){
            $this->getHeader();
            $this->load->view('admin/user');
            $this->load->view('footer');
        }
        
        public function doInsertUsers(){
            
        }
        
        public function doUpdateUsers(){
            
        }
        
        public function doDeleteUsers(){
            
        }
        
        /* Mission Control */
        
        public function AuthorizeMenu(){
            $data['karyawan'] = $this->model_admin->getKaryawan();
            $this->getHeader();
            $this->load->view('admin/authorizemenu',$data);
            $this->load->view('footer');
        }
        
        public function getMenuByID(){
            $kd = $this->input->post('kode');
            $data['selectedmenu'] = $this->model_admin->getMenuByKode($kd);
            $data['menu'] = $this->model_admin->getAllMenu();
            $data['kode'] = $kd;
            $this->load->view('admin/showRoles',$data);
        }
        
        public function doInsertAuthMenu(){
            $kar = $this->input->post('kodeK');
            $id = $this->input->post('menu');
            $menu = array();
            
            foreach($id as $i){
                array_push($menu, array(
                    'ID_Menu' => $i,
                    'KodeKaryawan' => $kar
                ));
            }
            $result = $this->model_admin->insertAuthMenu($menu);
            return $result;
        }
        
        public function MasterMenu(){
            $data['menu'] = $this->model_admin->getAllMenu();
            $this->getHeader();
            $this->load->view('admin/mastermenu',$data);
            $this->load->view('footer');
        }
        
        public function MasterSubMenu(){
            $data['submenu'] = $this->model_admin->getAllSubMenu();
            $this->getHeader();
            $this->load->view('admin/mastersubmenu',$data);
            $this->load->view('footer');
        }
        
        public function doInsertMenu(){
            
        }
        
        public function doInsertSubMenu(){
            
        }
        
        public function AuthorizeSubMenu(){
            $this->getHeader();
            $this->load->view('');
            $this->load->view('footer');
        }
    }