<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Administrator extends MY_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('mUtama');
        }
        
        public function index(){
            $this->getHeader();
            $this->load->view('home');
            $this->load->view('footer');
        }
    }