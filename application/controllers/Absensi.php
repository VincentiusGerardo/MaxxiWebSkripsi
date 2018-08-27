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
            $this->form_validation->set_rules('x','KodeKaryawan','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                $kode = $this->input->post('x');
                $tgl = date('Y-m-d');
                
                $result = $this->model_utama->absensi($kode,$tgl);
            }else{
                echo "Kode Karyawan Kosong!";
            }
        }
        
        public function getGambar(){
            $this->form_validation->set_rules('x','KodeKaryawan','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                $kode = $this->input->post('x');
                $res = $this->model_utama->getGambar($kode);
                
                if($res){
                    echo $res;
                }else{
                    echo "ERROR";
                }
            }
        }
    }