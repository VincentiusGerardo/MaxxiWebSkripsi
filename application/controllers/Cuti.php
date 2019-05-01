<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Cuti extends MY_Controller{
       public function __construct(){
           parent::__construct();
           $this->load->model('model_cuti','mCuti');
       }

       public function index(){
        if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){
            $cond = array('StatusAcceptHRD' => 'Y', 'StatusAcceptDirektur' => NULL, 'StatusCuti' => NULL);
            $data['cutiK'] = $this->mCuti->getCutiKaryawan($cond);
        }else if($this->session->userdata('role') == 3){
            $cond = array('StatusAcceptHRD' => NULL, 'StatusAcceptDirektur' => NULL, 'StatusCuti' => NULL);
            $data['cutiK'] = $this->mCuti->getCutiKaryawan($cond);
        }
        $data['cuti'] = $this->mCuti->getCuti($this->session->userdata('username'));
        $this->getHeader();
        $this->load->view('cuti',$data);
        $this->load->view('footer');
       }
       
       public function doInsertCuti(){
           $this->form_validation->set_rules('tglC', 'Tanggal Cuti', 'trim|required|xss_clean');
           $this->form_validation->set_rules('tglK', 'Tanggal Kembali', 'trim|required|xss_clean');
           $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required|xss_clean');
           
           if($this->form_validation->run() == TRUE){
            if($this->session->userdata('role') == 1){
                $data = array(
                    'ID_Karyawan' => $this->session->userdata('username'),
                    'TanggalCuti' => date("Y-m-d",strtotime($this->input->post('tglC'))),
                    'TanggalKembali' => date("Y-m-d",strtotime($this->input->post('tglK'))),
                    'Keterangan' => $this->input->post('ket'),
                    'StatusAcceptHRD' => 'Y',
                    'StatusAcceptDirektur' => 'Y',
                    'StatusCuti' => 'Y'
                );
            }else if($this->session->userdata('role') == 2){
                $data = array(
                    'ID_Karyawan' => $this->session->userdata('username'),
                    'TanggalCuti' => date("Y-m-d",strtotime($this->input->post('tglC'))),
                    'TanggalKembali' => date("Y-m-d",strtotime($this->input->post('tglK'))),
                    'Keterangan' => $this->input->post('ket'),
                    'StatusAcceptHRD' => 'Y',
                    'StatusAcceptDirektur' => 'Y',
                    'StatusCuti' => 'Y'
                );
            }else if($this->session->userdata('role') == 3){
                $data = array(
                    'ID_Karyawan' => $this->session->userdata('username'),
                    'TanggalCuti' => date("Y-m-d",strtotime($this->input->post('tglC'))),
                    'TanggalKembali' => date("Y-m-d",strtotime($this->input->post('tglK'))),
                    'Keterangan' => $this->input->post('ket'),
                    'StatusAcceptHRD' => 'Y'
                );
            }else{
                $data = array(
                    'ID_Karyawan' => $this->session->userdata('username'),
                    'TanggalCuti' => date("Y-m-d",strtotime($this->input->post('tglC'))),
                    'TanggalKembali' => date("Y-m-d",strtotime($this->input->post('tglK'))),
                    'Keterangan' => $this->input->post('ket')
                );   
            }
             $res = $this->mCuti->insertCuti($data);
             if($res == true){
                $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                redirect('Module/Cuti/');
             }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                redirect('Module/Cuti/');
             }
           }else{
               echo "Error";
           }
        }

        public function doUpdateCuti(){
            $this->form_validation->set_rules('id', 'ID Cuti', 'trim|required|xss_clean');
            $this->form_validation->set_rules('jwb', 'Status', 'trim|required|xss_clean');
            
            if($this->form_validation->run() == TRUE){
                $kode = $this->input->post('id');
                $stat = $this->input->post('jwb');
                if($stat === "Y"){
                    if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){
                        $data = array(
                            'StatusAcceptDirektur' => 'Y',
                            'StatusCuti' => 'Y'
                        );
                    }else{
                        $data = array(
                            'StatusAcceptHRD' => 'Y'
                        );
                    }
                }else{
                    if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){
                        $data = array(
                            'StatusAcceptDirektur' => 'N',
                            'StatusCuti' => 'N'
                        );
                    }else{
                        $data = array(
                            'StatusAcceptHRD' => 'N',
                            'StatusAcceptDirektur' => 'N',
                            'StatusCuti' => 'N'
                        );
                    }
                }
                $res = $this->mCuti->updateCuti($kode,$data);
                if($res == true){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect('Module/Cuti/');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect('Module/Cuti/');
                }
            }else{
                echo "Error";
            }
        }

        public function doCancelCuti(){
            
        }
   }