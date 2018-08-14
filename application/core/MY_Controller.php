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
        $old = $this->input->post();
        $new = $this->input->post();
        $rep = $this->input->post();
        
        if($new != $rep){
            
        }else if($old == $rep){
            
        }else{
            
        }
    }
}