<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   class Karyawan extends MY_Controller{
       public function __construct(){
           parent::__construct();
           $this->load->model('Model_karyawan','mKaryawan');
       }

       public function index(){
           $data['kar'] = $this->mKaryawan->getAllKaryawan();
           $this->getHeader();
           $this->load->view('karyawan',$data);
           $this->load->view('footer');
       }

       public function doInsertKaryawan(){
           $this->form_validation->set_rules('namaK', 'Nama Karyawan', 'trim|required|xss_clean');
           $this->form_validation->set_rules('tempatLahir', 'Tempat Lahir', 'trim|required|xss_clean');
           $this->form_validation->set_rules('TanggalLahir', 'Tanggal Lahir', 'trim|required|xss_clean');
           $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required|xss_clean');
           $this->form_validation->set_rules('agama', 'Agama', 'trim|required|xss_clean');
           $this->form_validation->set_rules('role', 'ID Role', 'trim|required|xss_clean');
           $this->form_validation->set_rules('alt', 'Alamat', 'trim|required|xss_clean');
           $this->form_validation->set_rules('wrg', 'Kewarganegaraan', 'trim|required|xss_clean');
           $this->form_validation->set_rules('stat', 'Status Pernikahan', 'trim|required|xss_clean');
           $this->form_validation->set_rules('NoHP', 'Nomor HP', 'trim|required|xss_clean');
           if(empty($_FILES['gambar']['name'])){
            $this->form_validation->set_rules('gambar', 'Foto', 'trim|required|xss_clean');
           }
           
           if($this->form_validation->run() == TRUE){
            $q = $this->db->query("SELECT MAX(ID_Karyawan) as max FROM ms_karyawan");
            $no = $q->row()->max + 1;
            if($no < 10){
                $nik = '000' . $no;
            }else if($no > 10 && $no < 100){
                $nik = '00' . $no;
            }else if($no > 100 && $no < 1000){
                $nik = '0' . $no;
            }else{
                $nik = $no;
            }
                $config['upload_path']          = './Media/Karyawan/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $nik;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')){
                    $data = array(
                        'ID_Karyawan' => $nik,
                        'NamaKaryawan' => $this->input->post('namaK'),
                        'TempatLahir' => $this->input->post('tempatLahir'),
                        'TanggalLahir' => date("Y-m-d",strtotime($this->input->post('TanggalLahir'))),
                        'Jenis_Kelamin' => $this->input->post('jk'),
                        'Password' => password_hash("Maxxi" . date("dmy",strtotime($this->input->post('TanggalLahir'))), PASSWORD_DEFAULT),
                        'Agama' => $this->input->post('agama'),
                        'ID_Role' => $this->input->post('role'),
                        'Alamat' => $this->input->post('alt'),
                        'Kewarganegaraan' => $this->input->post('wrg'),
                        'StatusPernikahan' => $this->input->post('stat'),
                        'NoHP' => $this->input->post('NoHP'),
                        'TahunMasuk' => date("Y"),
                        'Foto' => $this->upload->data('file_name'),
                        'FlagActive' => 'Y'
                    );

                    $res = $this->mKaryawan->insertKaryawan($data);
                    if($res == true){
                        $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                        redirect(base_url('Module/Karyawan'));
                    }else{
                        $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                        redirect(base_url('Module/Karyawan'));
                    }
                }
           }else{
            $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data Error.</div>");
            redirect(base_url('Module/Karyawan'));
           }
       }

       public function doUpdateKaryawan(){
        $this->form_validation->set_rules('idK', 'Nama Karyawan', 'trim|xss_clean');
        $this->form_validation->set_rules('namaK', 'Nama Karyawan', 'trim|xss_clean');
        $this->form_validation->set_rules('tempatLahir', 'Tempat Lahir', 'trim|xss_clean');
        $this->form_validation->set_rules('TanggalLahir', 'Tanggal Lahir', 'trim|xss_clean');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|xss_clean');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|xss_clean');
        $this->form_validation->set_rules('role', 'ID Role', 'trim|xss_clean');
        $this->form_validation->set_rules('alt', 'Alamat', 'trim|xss_clean');
        $this->form_validation->set_rules('wrg', 'Kewarganegaraan', 'trim|xss_clean');
        $this->form_validation->set_rules('stat', 'Status Pernikahan', 'trim|xss_clean');
        $this->form_validation->set_rules('NoHP', 'Nomor HP', 'trim|xss_clean');
        $this->form_validation->set_rules('flag', 'Flag Active', 'trim|xss_clean');
        if($this->form_validation->run() == TRUE){
            $data = array(
                'NamaKaryawan' => $this->input->post('namaK'),
                'TempatLahir' => $this->input->post('tempatLahir'),
                'TanggalLahir' => date("Y-m-d",strtotime($this->input->post('TanggalLahir'))),
                'Jenis_Kelamin' => $this->input->post('jk'),
                'Agama' => $this->input->post('agama'),
                'ID_Role' => $this->input->post('role'),
                'Alamat' => $this->input->post('alt'),
                'Kewarganegaraan' => $this->input->post('wrg'),
                'StatusPernikahan' => $this->input->post('stat'),
                'NoHP' => $this->input->post('NoHP'),
                'FlagActive' => $this->input->post('flag')
            );

            $res = $this->mKaryawan->updateKaryawan($this->input->post('idK'),$data);
            if($res == true){
                $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                redirect(base_url('Module/Karyawan'));
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                redirect(base_url('Module/Karyawan'));
            }
        }else{
            $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data Error.</div>");
            redirect(base_url('Module/Karyawan'));
        }
       }

       public function doDeleteKaryawan(){
        $this->form_validation->set_rules('id', 'Nama Karyawan', 'trim|required|xss_clean');
        if($this->form_validation->run() == TRUE){
            $res = $this->mKaryawan->deleteKaryawan($this->input->post('id'));
            if($res == true){
                $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                redirect(base_url('Module/Karyawan'));
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                redirect(base_url('Module/Karyawan'));
            }
        }else{
            $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data Error.</div>");
            redirect(base_url('Module/Karyawan'));
        }
       }

       public function doUploadImage(){
        $this->form_validation->set_rules('id', 'Nama Karyawan', 'trim|required|xss_clean');
        if($this->form_validation->run() == TRUE){
            $config['upload_path']          = './Media/Karyawan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->input->post('id');
            $config['overwrite']            = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')){
                $res = $this->mKaryawan->updateKaryawan($this->input->post('id'),array('Foto' => $this->upload->data('file_name')));
                if($res == true){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Image Uploaded.</div>");
                    redirect(base_url('Module/Karyawan'));
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Image can't be Uploaded.</div>");
                    redirect(base_url('Module/Karyawan'));
                }
            }
        }else{
            $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Image Error.</div>");
            redirect(base_url('Module/Karyawan'));
        }
       }
   }