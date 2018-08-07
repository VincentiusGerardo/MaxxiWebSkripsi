<?php

    class LoginController extends CI_Controller{
        public function __construct() {
            parent::__construct();
            //$this->load->model();
            $this->load->helper('form');
            $this->load->library('form_validation');
        }
        
        public function index(){
            
        }
        
        public function doLogin(){
            
        }
        
        public function doLogOut(){
            
        }
    }