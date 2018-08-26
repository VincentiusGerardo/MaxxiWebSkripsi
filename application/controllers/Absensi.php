<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Absensi extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('model_utama');
        }

        public function index(){
            $this->load->view('absensi');
        }
        
        public function doAbsensi(){
            $kode = $this->input->post('');
        }
        
    }