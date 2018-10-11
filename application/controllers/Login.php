<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('model_login');
        }

        public function index(){
            if(!$this->session->userdata('is_logged')){
                $this->load->view('login');
            }else{
                $r = $this->session->userdata('role');

                $this->pageRedirct($r);
            }
        }

        public function doLogin(){
            $this->form_validation->set_rules('username','username','trim|required|xss_clean');
            $this->form_validation->set_rules('password','password','trim|required|xss_clean');

            if($this->form_validation->run() == TRUE){
                $user = $this->input->post('username');
                $pass = $this->input->post('password');

                $result = $this->model_login->login($user, $pass);
                $r = $this->model_login->getRole($user);

                if($result){
                    $data = array(
                        'is_logged' => TRUE,
                        'username' => $this->input->post('username'),
                        'role' => $r
                    );

                    $this->session->set_userdata($data);
                    $role =  $this->session->userdata('role');

                    $this->pageRedirct($role);
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Failed!</strong> Invalid Username or Password!</div>");
                    redirect(base_url());
                }
            }
        }

        public function pageRedirct($role){
          if($role == 1){
              $dir =  'Administrator/';
          }else if($role == 2){
              $dir =  'Director/';
          }else if($role == 3){
              $dir =  'HRD/';
          }else{
              $dir =  'Employee/';
          }

          return redirect($dir);
        }

        public function doLogOut(){
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
