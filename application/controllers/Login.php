<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('model_login');
        }
        
        public function index(){
            $this->form_validation->set_rules('username','username','trim|required|xss_clean');
            $this->form_validation->set_rules('password','password','trim|required|xss_clean');
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('login');
            }else{
                
            }
        }
        
        public function doLogin(){
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            
            $result = $this->model_login->login($user, $pass);
            $r = $this->model_login->getRole($user);
                        
            if($result){
                $data = array(
                    'is_logged' => true,
                    'username' => $this->input->post('username'),
                    'role' => $role
                );
                $this->session->set_userdata($data);
                $role = $this->session->userdata['is_logged']['role'];
                if($role == 1){
                    redirect('Administrator/');
                }else if($role == 2){
                    redirect('Director/');
                }else if($role == 3){
                    redirect('HRD/');
                }else{
                    redirect('Employee/');
                }
            }else{
                redirect('Login/');
            }
        }
        
        public function doLogOut(){
            $data = array(
                
            );
        }
    }