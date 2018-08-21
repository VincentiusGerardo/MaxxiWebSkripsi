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
    
    public function getPath(){
        $user = $this->session->userdata('role');
        if($user == 1){
            $path = base_url('Administrator/');
        }else if($user == 2){
            $path = base_url('Director/');
        }else if($user == 3){
            $path = base_url('HRD/');
        }else{
            $path = base_url('Employee/');
        }
        return $path;
    }
    
    public function getUploadPath(){
        $url = "https://maxximumservices.com/Maxxi/";
        return $url;
    }
        
    public function getHeader(){
        $data['menu'] = $this->my_model->getMenu($this->session->userdata('username'));
        $data['submenu'] = $this->my_model->getSubMenu($this->session->userdata('username'));
        $data['namaKaryawan'] = $this->my_model->getUserName($this->session->userdata('username'));
        $data['r'] = $this->session->userdata('role');
        $data['path'] = $this->getPath();
        
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
        
        if(empty($new) || empty($old)){
            echo "Lengkapi semuanya!";
        }else if($new === $rep){
            $result = $this->my_model->updatePass($new,$this->session->userdata('username'));
            if($result){
                redirect($this->getPath() . 'changePassword');
            }
        }else if($old === $new){
            echo "Password tidak boleh sama !";
        }else{
            echo "Pass Beda";
        }
    }
    
    /* Fleet */
    public function fleet(){
        $data['fleet'] = $this->model_admin->getFleet();
        $this->getHeader();
        $this->load->view('admin/fleet',$data);
        $this->load->view('footer');
    }
    
    /* Mission Control */
    
    public function MissionControl(){
        
    }
}