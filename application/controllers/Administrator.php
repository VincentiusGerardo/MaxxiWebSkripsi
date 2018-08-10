<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Administrator extends MY_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('model_admin');
        }
        
        public function index(){
            $data['namaKaryawan'] = $this->model_admin->getUserName($this->session->userdata('username'));
            
            $this->load->view('header');
            $this->load->view('admin/home',$data);
            $this->load->view('footer');
        }
        
    }