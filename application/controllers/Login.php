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
            
            $result = $this->model_login->login($user, $pass);
            $role = $this->model_login->getRole($user);
                        
            if($result){
                if($role == 1){
                
                }else if($role == 2){

                }else if($role == 3){

                }else{

                }
            }else{
                redirect('Login/');
            }
        }
        
        public function doLogOut(){
            
        }
    }