<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('model_login');
        }
        
        public function index(){
            //$this->form_validation->set_rules();
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('login');
            }
        }
        
        public function doLogin(){
            $user = $this->input->post('');
            $pass = $this->input->post('');
            
        }
        
        public function doLogOut(){
            
        }
    }