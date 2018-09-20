<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Administrator extends MY_Controller{
        public function __construct() {
            parent::__construct();
        }
        
        public function index(){
            $this->getHeader();
            $this->load->view('home');
            $this->load->view('footer');
        }
		
        /* Mission Control */
        public function AuthorizeMenu(){
            $data['karyawan'] = $this->model_utama->getKaryawan();
            $this->getHeader();
            $this->load->view('admin/authorizemenu',$data);
            $this->load->view('footer');
        }

        public function getMenuByID(){
            $kd = $this->input->post('kode');
            $data['kode'] = $kd;
            $data['selectedmenu'] = $this->model_utama->getMenuByKode($kd);
            $data['menu'] = $this->model_utama->getAllMenu();
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
            $result = $this->model_utama->insertAuthMenu($menu);
            if($result){
                $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                redirect($this->getPath() . 'AuthorizeMenu');
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                redirect($this->getPath() . 'AuthorizeMenu');
            }
        }

        public function MasterMenu(){
            $data['menu'] = $this->model_utama->getAllMenu();
            $this->getHeader();
            $this->load->view('admin/mastermenu',$data);
            $this->load->view('footer');
        }

        public function doInsertMenu(){
            $this->form_validation->set_rules('namaMenu','MenuName','required|xss_clean|trim');
            $this->form_validation->set_rules('url','Link','xss_clean|trim');
            $this->form_validation->set_rules('icon','icon','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                $nama = $this->input->post('namaMenu');
                $link = $this->input->post('url');
                $icon = $this->input->post('icon');
                if(empty($link)){
                    $link = $nama;
                }
                $dataMenu = array(
                    'NamaMenu' => $nama,
                    'URL' => trim(str_replace(" ","",$link)),
                    'Logo' => $icon
                );
                                
                $result = $this->model_utama->insertMasterMenu($dataMenu);
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                    redirect($this->getPath() . 'MasterMenu');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                    redirect($this->getPath() . 'MasterMenu');
                }
            }
        }
        
        public function doUpdateMenu(){
            $this->form_validation->set_rules('kode','IdMenu','required|xss_clean|trim');
            $this->form_validation->set_rules('namaMenu','MenuName','required|xss_clean|trim');
            $this->form_validation->set_rules('url','Link','xss_clean|trim');
            $this->form_validation->set_rules('icon','icon','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                $cod = $this->input->post('kode');
                $nama = $this->input->post('namaMenu');
                $link = $this->input->post('url');
                $icon = $this->input->post('icon');
                if(empty($link)){
                    $link = $nama;
                }
                $dataMenu = array(
                    'NamaMenu' => $nama,
                    'URL' => trim(str_replace(" ","",$link)),
                    'Logo' => $icon
                );
                
                $result = $this->model_utama->updateMasterMenu($cod,$dataMenu);
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect($this->getPath() . 'MasterMenu');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                redirect($this->getPath() . 'MasterMenu');
                }
                
            }
        }
        
        public function doDeleteMenu(){
            $this->form_validation->set_rules('kode','IdMenu','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                $cod = $this->input->post('kode');
                
                $res = $this->model_utama->deleteMasterMenu($cod);
                if($res){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                    redirect($this->getPath() . 'MasterMenu');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                    redirect($this->getPath() . 'MasterMenu');
                }
            }
        }

        public function MasterSubMenu(){
            $data['submenu'] = $this->model_utama->getAllSubMenu();
            $data['men'] = $this->model_utama->getSubFromMenu();
            $this->getHeader();
            $this->load->view('admin/mastersubmenu',$data);
            $this->load->view('footer');
        }

        public function doInsertSubMenu(){
            $this->form_validation->set_rules('namaSubMenu','NamaSubMenu','required|xss_clean|trim');
            $this->form_validation->set_rules('menu','NamaMenu','required|xss_clean|trim');
            $this->form_validation->set_rules('url','Link','xss_clean|trim');
            
            if($this->form_validation->run() == TRUE){
                $nama = $this->input->post('namaSubMenu');
                $namaM = $this->input->post('menu');
                $link = $this->input->post('url');
                
                if(empty($link)){
                    $link = $nama;
                }
                
                $dataSubMenu = array(
                    'ID_Menu' => $namaM,
                    'NamaSubMenu' => $nama,
                    'URL' => trim(str_replace(" ","",$link))
                );
                
                $result = $this->model_utama->insertSubMenu($dataSubMenu);
                
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                    redirect($this->getPath() . 'MasterSubMenu');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                    redirect($this->getPath() . 'MasterSubMenu');
                }
            }
        }

        public function doUpdateSubMenu(){
            $this->form_validation->set_rules('no','ID_SubMenu','required|xss_clean|trim');
            $this->form_validation->set_rules('namaSubMenu','NamaSubMenu','required|xss_clean|trim');
            $this->form_validation->set_rules('menu','NamaMenu','required|xss_clean|trim');
            $this->form_validation->set_rules('url','Link','xss_clean|trim');
            
            if($this->form_validation->run() == TRUE){
                $nomor = $this->input->post('no');
                $namaS = $this->input->post('namaSubMenu');
                $idM = $this->input->post('menu');
                $link = $this->input->post('url');
                
                if(empty($link)){
                    $link = $namaS;
                }
                
                $dataUpdate = array(
                    'ID_Menu' => $idM,
                    'NamaSubMenu' => $namaS,
                    'URL' => trim(str_replace(" ","",$link))
                );
                
                $result = $this->model_utama->updateSubMenu($nomor,$dataUpdate);
                
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect($this->getPath() . 'MasterSubMenu');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect($this->getPath() . 'MasterSubMenu');
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There's Still an Empty Input!.</div>");
                    redirect($this->getPath() . 'MasterSubMenu');
            }
        }

        public function doDeleteSubMenu(){
            $this->form_validation->set_rules('no','ID_SubMenu','required|xss_clean|trim');
            
            if($this->form_validation->run() == TRUE){
                $kode = $this->input->post('no');
                
                $result = $this->model_utama->deleteSubMenu($kode);
                
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect($this->getPath() . 'MasterSubMenu');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect($this->getPath() . 'MasterSubMenu');
                }
            }
        } 

        public function AuthorizeSubMenu(){
            $data['karyawan'] = $this->model_utama->getKaryawan();
            $this->getHeader();
            $this->load->view('admin/authorizesubmenu',$data);
            $this->load->view('footer');
        }
        
        public function getSubMenuByID(){
            $kd = $this->input->post('kode');
            $data['kode'] = $kd;
            $data['selectedmenu'] = $this->model_utama->getSubMenuByKode($kd);
            $data['menu'] = $this->model_utama->getAllSub();
            $this->load->view('admin/showSubRoles',$data);
        }
       
    }
