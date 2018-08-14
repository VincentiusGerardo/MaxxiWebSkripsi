<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Director extends MY_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('Model_Director');
        }
        
        public function index(){
            $this->getHeader();
            //$this->load->view('director/home');
            $this->load->view('footer');
        }
    }
