<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            if(!$this->session->userdata('is_logged')){
                redirect(base_url());
            }
            $this->load->model('mUtama');
        }
        
        public function getRole(){
            $role = $this->session->userdata('role');
            return $role;
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
            $data['menu'] = $this->mUtama->getMenu($this->session->userdata('username'));
            $data['submenu'] = $this->mUtama->getSubMenu($this->session->userdata('username'));
            $data['namaKaryawan'] = $this->mUtama->getUserName($this->session->userdata('username'));
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
                $result = $this->mUtama->updatePass($new,$this->session->userdata('username'));
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
            $data['fleet'] = $this->mUtama->getFleet();
            $this->getHeader();
            if($this->getRole() == 1){
                $this->load->view('admin/fleet',$data);
            }else{
                $this->load->view('director/fleet',$data);
            }
            $this->load->view('footer');
        }

        public function doInsertFleet(){
            $this->form_validation->set_rules('nopol','NomorPolisi','required|xss_clean');
            $this->form_validation->set_rules('namaS','NamaSupir','required|xss_clean');
            $this->form_validation->set_rules('nickN','NickName','required|xss_clean');
            $this->form_validation->set_rules('JenisA','JenisArmada','required|xss_clean');
            $this->form_validation->set_rules('tahunP','TahunPembuatan','required|xss_clean');
            
            if($this->form_validation->run() == TRUE){
                $noplat = strtoupper($this->input->post('nopol'));
                $nama = $this->input->post('namaS');
                $nick = $this->input->post('nickN');
                $jenis = $this->input->post('JenisA');
                $tahun = $this->input->post('tahunP');
                
                $dataFleet = array(
                    'NoPolisi' => $noplat,
                    'NamaSupir' => $nama,
                    'NickName' => $nick,
                    'JenisArmada' => $jenis,
                    'TahunPembuatan' => $tahun
                );
                
                $result = $this->mUtama->insertFleet($dataFleet);
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                    redirect($this->getPath() . 'Fleet');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                    redirect($this->getPath() . 'Fleet');
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There is Still an Empty Input!.</div>");
                redirect($this->getPath() . 'Fleet');
            }
            
        }

        public function doUpdateFleet(){
            $this->form_validation->set_rules('nomor','Kode','required|xss_clean');
            $this->form_validation->set_rules('nopol','NomorPolisi','required|xss_clean');
            $this->form_validation->set_rules('namaS','NamaSupir','required|xss_clean');
            $this->form_validation->set_rules('nickN','NickName','required|xss_clean');
            $this->form_validation->set_rules('JenisA','JenisArmada','required|xss_clean');
            $this->form_validation->set_rules('tahunP','TahunPembuatan','required|xss_clean');
            
            if($this->form_validation->run() == TRUE){
                $kd = $this->input->post('nomor');
                $no = $this->input->post('nopol');
                $name = $this->input->post('namaS');
                $nic = $this->input->post('nickN');
                $ja = $this->input->post('JenisA');
                $tp = $this->input->post('tahunP');
                
                $dataUpdate = array(
                    'NoPolisi' => $no,
                    'NamaSupir' => $name,
                    'NickName' => $nic,
                    'JenisArmada' => $ja,
                    'TahunPembuatan' => $tp
                );
                $result = $this->mUtama->updateFleet($kd,$dataUpdate);
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect($this->getPath() . 'Fleet');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect($this->getPath() . 'Fleet');
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There is Still an Empty Input!.</div>");
                redirect($this->getPath() . 'Fleet');
            }
        }

        public function doDeleteFleet(){
            $this->form_validation->set_rules('nomor','Kode','required|xss_clean');
            
            if($this->form_validation->run() == TRUE){
                $kd = $this->input->post('nomor');
                
                $res = $this->mUtama->deleteFleet($kd);
                
                if($res){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                    redirect($this->getPath() . 'Fleet');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                    redirect($this->getPath() . 'Fleet');
                }
            }
        }

        /* Customers */

        public function customers(){
            $data['customer'] = $this->mUtama->getCustomers();
            $this->getHeader();
            $this->load->view('admin/customers',$data);
            $this->load->view('footer');
        }

        public function doInsertCustomers(){

        }

        public function doUpdateCustomers(){

        }

        public function doDeleteCustomers(){

        }

        /* Experience */

        public function experience(){
            $this->getHeader();
            $this->load->view('admin/experience');
            $this->load->view('footer');
        }

        public function doInsertExperience(){

        }

        public function doUpdateExperience(){

        }

        public function doDeleteExperience(){

        }

        /* UserManagement */

        public function users(){
            $this->getHeader();
            $this->load->view('admin/user');
            $this->load->view('footer');
        }

        public function doInsertUsers(){

        }

        public function doUpdateUsers(){

        }

        public function doDeleteUsers(){

        }

        /* Mission Control */

        public function AuthorizeMenu(){
            $data['karyawan'] = $this->mUtama->getKaryawan();
            $this->getHeader();
            $this->load->view('admin/authorizemenu',$data);
            $this->load->view('footer');
        }

        public function getMenuByID(){
            $kd = $this->input->post('kode');
            $data['selectedmenu'] = $this->mUtama->getMenuByKode($kd);
            $data['menu'] = $this->mUtama->getAllMenu();
            $data['kode'] = $kd;
            $this->load->view('admin/showRoles',$data);
        }

        public function doInsertAuthMenu(){
            $kar = $this->input->post('kodeK');
            $id = $this->input->post('menu');
            $menu = array();

            foreach($id as $i){
                array_push($menu, array(
                    'ID_Menu' => $i,
                    'KodeKaryawan' => $kar
                ));
            }
            $result = $this->mUtama->insertAuthMenu($menu);
            if($result){
                redirect($this->getPath() . 'AuthorizeMenu');
            }else{
                echo "Error";
            }
        }

        public function MasterMenu(){
            $data['menu'] = $this->mUtama->getAllMenu();
            $this->getHeader();
            $this->load->view('admin/mastermenu',$data);
            $this->load->view('footer');
        }

        public function MasterSubMenu(){
            $data['submenu'] = $this->mUtama->getAllSubMenu();
            $this->getHeader();
            $this->load->view('admin/mastersubmenu',$data);
            $this->load->view('footer');
        }

        public function doInsertMenu(){


        }

        public function doInsertSubMenu(){

        }

        public function AuthorizeSubMenu(){
            $this->getHeader();
            $this->load->view('');
            $this->load->view('footer');
        }
    }