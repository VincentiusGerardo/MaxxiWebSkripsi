<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('is_logged')){
            redirect(base_url());
        }
        $this->load->model('my_model');
    }
        
    public function getHeader(){
        $data['menu'] = $this->model_admin->getMenu($this->session->userdata('username'));
        $data['submenu'] = $this->model_admin->getSubMenu($this->session->userdata('username'));

        $this->load->view('header',$data);
    }
}