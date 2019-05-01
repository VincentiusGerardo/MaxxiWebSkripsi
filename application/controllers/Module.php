<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   class Module extends MY_Controller{
       public function __construct(){
           parent::__construct();
           $this->load->model('model_absensi','mAbsensi');
       }

       public function index(){
            $this->getHeader();
            $this->load->view('home');
            $this->load->view('footer');
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

            // Validasi password lama dengan yang di database
            $isi = $this->mAbsensi->validasi($old,$this->session->userdata('username'));
            if($isi == TRUE){
               if($old === $new){
                    $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> New Password cannot be The Same as Old!</div>");
                    redirect($this->agent->referrer());
                }else if($new === $rep){
                    $result = $this->mAbsensi->updatePass($new,$this->session->userdata('username'));
                    if($result){
                        $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Password Changed!</div>");
                        redirect($this->agent->referrer());
                    }
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> New Passwords Mismatch!</div>");
                    redirect($this->agent->referrer());
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Wrong Password Inserted.</div>");
                redirect($this->agent->referrer());
            }
        }

        public function RekapAbsensi(){
            $this->getHeader();
            if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){
                $data['karyawan'] = $this->mAbsensi->getKaryawan();
                $this->load->view('rekap',$data);
            }else{
                $this->load->view('rekap');
            }
            $this->load->view('footer');
        }

        public function getDataAbsen(){
            $this->form_validation->set_rules('a','From','required|xss_clean|trim');
            $this->form_validation->set_rules('b','To','required|xss_clean|trim');
            if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){
                $this->form_validation->set_rules('c','KodeKaryawan','required|xss_clean|trim');
            }

            if($this->form_validation->run() == TRUE){
                $f = date("Y-m-d",strtotime($this->input->post('a')));
                $t = date("Y-m-d",strtotime($this->input->post('b')));

                if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){
                    $kode = $this->input->post('c');
                    $data['hasil'] = $this->mAbsensi->getAbsen($kode,$f,$t);
                    $data['total'] = $this->mAbsensi->getTotalJam($kode,$f,$t);
                }else{
                    $data['hasil'] = $this->mAbsensi->getAbsen($this->session->userdata('username'),$f,$t);
                    $data['total'] = $this->mAbsensi->getTotalJam($this->session->userdata('username'),$f,$t);
                }

                $this->load->view('hasilrekap',$data);
            }
        }
   }