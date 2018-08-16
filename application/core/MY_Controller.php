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
        $data['menu'] = $this->my_model->getMenu($this->session->userdata('username'));
        $data['submenu'] = $this->my_model->getSubMenu($this->session->userdata('username'));
        $data['namaKaryawan'] = $this->my_model->getUserName($this->session->userdata('username'));
        $data['r'] = $this->session->userdata('role');
        
        $this->load->view('header',$data);
    }
    
    public function changePassword(){
        $this->getHeader();
        $this->load->view('pass');
        $this->load->view('footer');
    }
    
    public function doChangePassword(){
        $old = $this->input->post('oldPass');
        $new = $this->input->post('newPass');
        $rep = $this->input->post('repPass');
        
        if(empty($new) || empty($old) || empty($rep)){
            echo "Lengkapi semuanya!";
        }else if($new === $rep){
            $this->my_model->updatePass($new,$this->session->userdata('username'));
            redirect('./changePassword');
        }else if($old === $new){
            echo "Password tidak boleh sama !";
        }else{
            echo "Pass Beda";
        }
    }
}