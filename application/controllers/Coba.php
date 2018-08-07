<?php
    class Coba extends CI_Controller{
        public function __construct() {
            parent::__construct();    
            $this->load->model('model_admin');
        }
        
        public function index(){
            $this->load->view('test');  
        }
    }