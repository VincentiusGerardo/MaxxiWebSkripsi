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
           $this->form_validation->set_rules('idK', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('namaK', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('tempatLahir', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('TanggalLahir', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('jk', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('agama', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('role', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('alt', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('wrg', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('stat', '', 'trim|required|xss_clean');
           $this->form_validation->set_rules('NoHP', '', 'trim|required|xss_clean');
           
           if($this->form_validation->run() == TRUE){
                $config['upload_path']          = './Media/Karyawan/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $this->input->post('idK');
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')){
                    $data = array(
                        'ID_Karyawan' => $this->input->post('idK'),
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
                }
           }else{
               # code...
           }
       }

       public function doUpdateKaryawan(){

       }

       public function doDeleteKaryawan(){

       }
   }