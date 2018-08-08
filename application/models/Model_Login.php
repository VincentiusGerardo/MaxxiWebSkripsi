<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_Login extends CI_Model{

        public function __construct(){
            parent::__construct();  
        }

        public function login($user, $pass){
            if($this->validatePass($pass)){
                $cond = array('KodeKaryawan' => $user);
                $query = $this->db->get_where('ms_karyawan',$cond);
                
                if($query->num_rows() > 0){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }else{
                return FALSE;
            }            
        }
        
        public function validatePass($pass){
            if(password_verify($pass, $this->getStored())){
                return $pass;
            }else{
                return FALSE;
            }
        }
        
        public function getStored(){
            $kdk = $this->input->post('username');
            $cond = array('KodeKaryawan' => $kdk);
            $query = $this->db->get_where('ms_karyawan', $cond);
            
            if($query->num_rows() > 0){
                $row = $query->row();
                return $row->Password;
            }else{
                return FALSE;
            }
        }
        
        public function getRole(){
                
        }
        
        public function getMenu($role){
            
        }
    }