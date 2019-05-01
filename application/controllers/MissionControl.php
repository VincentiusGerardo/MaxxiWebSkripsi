<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class MissionControl extends MY_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function AuthorizeMenu(){
            $data['karyawan'] = $this->mUtama->getKaryawan();
            $this->getHeader();
            $this->load->view('authorizemenu',$data);
            $this->load->view('footer');
        }

        public function getMenuByID(){
            $kd = $this->input->post('kode');
            $data['kode'] = $kd;
            $data['selectedmenu'] = $this->mUtama->getMenuByKode($kd);
            $data['menu'] = $this->mUtama->getAllMenu();
            $this->load->view('showRoles',$data);
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
                $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                redirect(base_url('MissionControl/AuthorizeMenu'));
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                redirect(base_url('MissionControl/AuthorizeMenu'));
            }
        }

        public function MasterMenu(){
            $data['menu'] = $this->mUtama->getAllMenu();
            $this->getHeader();
            $this->load->view('mastermenu',$data);
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

                $result = $this->mUtama->insertMasterMenu($dataMenu);
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                    redirect(base_url('MissionControl/MasterMenu'));
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                    redirect(base_url('MissionControl/MasterMenu'));
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

                $result = $this->mUtama->updateMasterMenu($cod,$dataMenu);
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect(base_url('MissionControl/MasterMenu'));
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                redirect(base_url('MissionControl/MasterMenu'));
                }

            }
        }

        public function doDeleteMenu(){
            $this->form_validation->set_rules('kode','IdMenu','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                $cod = $this->input->post('kode');

                $res = $this->mUtama->deleteMasterMenu($cod);
                if($res){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                    redirect(base_url('MissionControl/MasterMenu'));
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                    redirect(base_url('MissionControl/MasterMenu'));
                }
            }
        }

        public function MasterSubMenu(){
            $data['submenu'] = $this->mUtama->getAllSubMenu();
            $data['men'] = $this->mUtama->getSubFromMenu();
            $this->getHeader();
            $this->load->view('mastersubmenu',$data);
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

                $result = $this->mUtama->insertSubMenu($dataSubMenu);

                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                    redirect(base_url('MissionControl/MasterSubMenu'));
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                    redirect(base_url('MissionControl/MasterSubMenu'));
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

                $result = $this->mUtama->updateSubMenu($nomor,$dataUpdate);

                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect(base_url('MissionControl/MasterSubMenu'));
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect(base_url('MissionControl/MasterSubMenu'));
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There's Still an Empty Input!.</div>");
                    redirect(base_url('MissionControl/MasterSubMenu'));
            }
        }

        public function doDeleteSubMenu(){
            $this->form_validation->set_rules('no','ID_SubMenu','required|xss_clean|trim');

            if($this->form_validation->run() == TRUE){
                $kode = $this->input->post('no');

                $result = $this->mUtama->deleteSubMenu($kode);

                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect(base_url('MissionControl/MasterSubMenu'));
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect(base_url('MissionControl/MasterSubMenu'));
                }
            }
        }

        public function AuthorizeSubMenu(){
            $data['karyawan'] = $this->mUtama->getKaryawan();
            $this->getHeader();
            $this->load->view('authorizesubmenu',$data);
            $this->load->view('footer');
        }

        public function getSubMenuByID(){
            $kd = $this->input->post('kd');
            $data['kode'] = $kd;
            $data['selectedmenu'] = $this->mUtama->getSubMenuByKode($kd);
            $data['menu'] = $this->mUtama->getAllSub();
            $this->load->view('showSubRoles',$data);
        }

        public function doInsertAuthSubMenu(){
          $kar = $this->input->post('kodeK');
          $idSub = $this->input->post('submenu');
          $sub = array();

          foreach($idSub as $s){
            array_push($sub,array(
              'ID_SubMenu' => $s,
              'KodeKaryawan' => $kar
            ));
          }
          $result = $this->mUtama->insertAuthSubMenu($sub);
          if($result){
              $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
              redirect(base_url('MissionControl/AuthorizeSubMenu'));
          }else{
              $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
              redirect(base_url('MissionControl/AuthorizeSubMenu'));
          }
        }
    }