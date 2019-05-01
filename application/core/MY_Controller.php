<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            // check session user
            if(!$this->session->userdata('is_logged')){
                redirect(base_url(),'refresh');
            }
            $this->load->model('my_model','mUtama');
        }

        public function getHeader(){
            $data['menu'] = $this->mUtama->getMenu($this->session->userdata('username'));
            $data['namaKaryawan'] = $this->mUtama->getUserName($this->session->userdata('username'));

            $this->load->view('header',$data);
        }
    }
