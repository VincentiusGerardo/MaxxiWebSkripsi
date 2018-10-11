<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            // check session user
            if(!$this->session->userdata('is_logged')){
                redirect(base_url());
            }
        }

        public function getRole(){
            $role = $this->session->userdata('role');
            return $role;
        }

        public function setTitle(){
            $id = $this->getRole();
            if($id == 1){
                $title = 'Administrator';
            }else if($id == 2){
                $title = 'Director';
            }else if($id == 3){
                $title = 'HRD';
            }else{
                $title = 'Employee';
            }
            return $title;
        }

        public function getUserCode(){
            $k = $this->session->userdata('username');
            return $k;
        }

        public function getPath(){
            $user = $this->getRole();
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

        public function getHeader(){
            $data['menu'] = $this->model_utama->getMenu($this->getUserCode());
            $data['submenu'] = $this->model_utama->getSubMenu($this->getUserCode());
            $data['namaKaryawan'] = $this->model_utama->getUserName($this->getUserCode());
            $data['path'] = $this->getPath();
            $data['judul'] = $this->setTitle();

            $this->load->view('header',$data);
        }

        /* Change Password */
        public function changePassword(){
            $this->getHeader();
            $this->load->view('pass');
            $this->load->view('footer');
        }

        public function doChangePassword(){
            $old = $this->input->post('oldPass');
            $new = $this->input->post('newPass');
            $rep = $this->input->post('repPass');

            // Validasi password lama dengan yang di database
            $isi = $this->model_utama->validasi($old,$this->getUserCode());
            if($isi == TRUE){
               if($old === $new){
                    $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> New Password cannot be The Same as Old!</div>");
                    redirect($this->getPath() . 'changePassword');
                }else if($new === $rep){
                    $result = $this->model_utama->updatePass($new,$this->getUserCode());
                    if($result){
                        $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Password Changed!</div>");
                        redirect($this->getPath() . 'changePassword');
                    }
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> New Passwords Mismatch!</div>");
                    redirect($this->getPath() . 'changePassword');
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Wrong Password Inserted.</div>");
                redirect($this->getPath() . 'changePassword');
            }
        }

        /* Cuti */
        public function cuti(){
            $this->getHeader();
            if($this->getRole() == 1){

            }else if($this->getRole() == 2){

            }else{
                $data[] = $this->model_utama->getCuti($this->getUserCode());
                $this->load->view('employee/cuti');
            }
            $this->load->view('footer');
        }

        public function doInsertCuti(){

        }

        public function doUpdateCuti(){

        }

        public function RekapAbsensi(){
            $this->getHeader();
            if($this->getRole() == 1 || $this->getRole() == 2 || $this->getRole() == 3){
                $data['karyawan'] = $this->model_utama->getKaryawan();
                $this->load->view('rekapAtasan',$data);
            }else{
                $this->load->view('employee/rekap');
            }
            $this->load->view('footer');
        }

        public function getDataAbsen(){
            $this->form_validation->set_rules('a','From','required|xss_clean|trim');
            $this->form_validation->set_rules('b','To','required|xss_clean|trim');
            if($this->getRole() == 1 || $this->getRole() == 2 || $this->getRole() == 3){
                $this->form_validation->set_rules('c','KodeKaryawan','required|xss_clean|trim');
            }

            if($this->form_validation->run() == TRUE){
                $f = date("Y-m-d",strtotime($this->input->post('a')));
                $t = date("Y-m-d",strtotime($this->input->post('b')));

                if($this->getRole() == 1 || $this->getRole() == 2 || $this->getRole() == 3){
                    $kode = $this->input->post('c');
                    $data['hasil'] = $this->model_utama->getAbsen($kode,$f,$t);
                    $data['total'] = $this->model_utama->getTotalJam($kode,$f,$t);
                }else{
                    $data['hasil'] = $this->model_utama->getAbsen($this->getUserCode(),$f,$t);
                    $data['total'] = $this->model_utama->getTotalJam($this->getUserCode(),$f,$t);
                }

                $this->load->view('hasilrekap',$data);
            }
        }

    }
