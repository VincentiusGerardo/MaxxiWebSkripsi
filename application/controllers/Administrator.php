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
        
        /* Dari Web */
        /* About -Fleet - Company Profile -Crew */
        public function fleet(){
            $data['fleet'] = $this->model_utama->getFleet();
            $this->getHeader();
            if($this->getRole() == 1){
                $this->load->view('admin/fleet',$data);
            }else{
                $this->load->view('director/fleet',$data);
            }
            $this->load->view('footer');
        }

        public function doInsertFleet(){
            $this->form_validation->set_rules('nopol','NomorPolisi','required|xss_clean|trim');
            $this->form_validation->set_rules('namaS','NamaSupir','required|xss_clean|trim');
            $this->form_validation->set_rules('nickN','NickName','required|xss_clean|trim');
            $this->form_validation->set_rules('JenisA','JenisArmada','required|xss_clean|trim');
            $this->form_validation->set_rules('tahunP','TahunPembuatan','required|xss_clean|trim');
            
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
                
                $result = $this->model_utama->insertFleet($dataFleet);
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
            $this->form_validation->set_rules('nomor','Kode','required|xss_clean|trim');
            $this->form_validation->set_rules('nopol','NomorPolisi','required|xss_clean|trim');
            $this->form_validation->set_rules('namaS','NamaSupir','required|xss_clean|trim');
            $this->form_validation->set_rules('nickN','NickName','required|xss_clean|trim');
            $this->form_validation->set_rules('JenisA','JenisArmada','required|xss_clean|trim');
            $this->form_validation->set_rules('tahunP','TahunPembuatan','required|xss_clean|trim');
            
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
                $result = $this->model_utama->updateFleet($kd,$dataUpdate);
                if($result){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect($this->getPath() . 'Fleet');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect($this->getPath() . 'Fleet');
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There's Still an Empty Input!.</div>");
                redirect($this->getPath() . 'Fleet');
            }
        }

        public function doDeleteFleet(){
            $this->form_validation->set_rules('nomor','Kode','required|xss_clean');
            
            if($this->form_validation->run() == TRUE){
                $kd = $this->input->post('nomor');
                
                $res = $this->model_utama->deleteFleet($kd);
                
                if($res){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                    redirect($this->getPath() . 'Fleet');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                    redirect($this->getPath() . 'Fleet');
                }
            }
        }
        
        public function crew(){
            $this->getHeader();
            $this->load->view('admin/crew');
            $this->load->view('footer');
        }
        
        public function doInsertCrew(){
            
        }
        
        public function doUpdateCrew(){
            
        }
        
        public function doDeleteCrew(){
            
        }
        
        public function CompanyProfile(){
            $data['compro'] = $this->model_utama->getComPro();
            $this->getHeader();
            $this->load->view('admin/compro',$data);
            $this->load->view('footer');
        }
        
        public function doInsertCompanyProfile(){
            $this->form_validation->set_rules('namaMenu','NamaMenu','required|xss_clean|trim');
            $this->form_validation->set_rules('isiText','Keterangan','required|xss_clean|trim');
            
            if($this->form_validation->run() == TRUE){
                $nama = $this->input->post('namaMenu');
                $isi = $this->input->post('isiText');
                
                $data = array(
                    'header' => $nama,
                    'isi' => $isi
                );
                
                $result = $this->model_utama->insertComPro($data);
                
                if($result){
                     $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Inserted.</div>");
                    redirect($this->getPath() . 'CompanyProfile');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Inserted.</div>");
                    redirect($this->getPath() . 'CompanyProfile');
                }
            }else{
               $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There's Still an Empty Input!.</div>");
                redirect($this->getPath() . 'CompanyProfile');
            }
        }
        
        public function doUpdateCompanyProfile(){
            $this->form_validation->set_rules('kode','KodeComPro','required|xss_clean|trim');
            $this->form_validation->set_rules('isiText','Keterangan','required|xss_clean|trim');
            
            if($this->form_validation->run() == TRUE){
                $id = $this->input->post('kode');
                $isi = $this->input->post('isiText');
                
                $data = array(
                    'isi' => $isi
                );
                
                $result = $this->model_utama->updateComPro($id,$data);
                if($result){
                     $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Updated.</div>");
                    redirect($this->getPath() . 'CompanyProfile');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Updated.</div>");
                    redirect($this->getPath() . 'CompanyProfile');
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There's Still an Empty Input!.</div>");
                redirect($this->getPath() . 'CompanyProfile');
            }
        }
        
        public function doDeleteCompanyProfile(){
            $this->form_validation->set_rules('kode','KodeComPro','required|xss_clean|trim');
            
            if($this->form_validation->run() == TRUE){
                $kd = $this->input->post('kode');
                
                $res = $this->model_utama->deleteComPro($kd);
                
                if($res){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                    redirect($this->getPath() . 'CompanyProfile');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                    redirect($this->getPath() . 'CompanyProfile');
                }
            }
        }

        /* Customers */
        public function customers(){
            $data['customer'] = $this->model_utama->getCustomers();
            $this->getHeader();
            $this->load->view('admin/customers',$data);
            $this->load->view('footer');
        }

        public function doInsertCustomers(){
            $this->form_validation->set_rules('namaCustomer','NamaCustomer','required|xss_clean|trim');
            if(empty($_FILES['gambar']['name'])){
                $this->form_validation->set_rules('gambar','gambar','required');
            }
            
            if($this->form_validation->run() == TRUE){
                $name = $this->input->post('namaCustomer');
                $config['upload_path'] = './Media/Customer/';
                $config['allowed_types'] = "jpg|jpeg|png";
                $config['file_name'] = str_replace(".", "", str_replace(" ", "-", $name));
                $config['file_ext_tolower'] = TRUE;
                $config['max_size'] = 2097152;
                
                $this->load->library('upload', $config);
                
                    
                if(!$this->upload->do_upload('gambar')){
                    $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> " . $this->upload->display_errors() . "</div>");
                    redirect($this->getPath() . 'Customers');
                }else{
                    $filename = $this->upload->data('file_name');
                    $dataCustomer = array(
                        'NamaCustomer' => $name,
                        'Image' => $filename
                    );
                    
                    
                    $result = $this->model_utama->insertCustomers($dataCustomer);
                    
                     if($result){
                         $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Customer Inserted!</div>");
                         redirect($this->getPath() . 'Customers');
                     }else{
                         $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Failed!</strong> Customer can't be Inserted!</div>");
                         redirect($this->getPath() . 'Customers');
                     }
                 }
             }else{
                 $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There's Still an Empty Input!</div>");
                 redirect($this->getPath() . 'Customers');
             }
        }

        public function doUpdateCustomers(){
            $this->form_validation->set_rules('nomor','ID','required|xss_clean|trim');
            $this->form_validation->set_rules('namaCustomer','NamaCustomer','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                if(empty($_FILES['gambar']['name'])){
                    $id = $this->input->post('nomor');
                    $name = $this->input->post('namaCustomer');
                    
                    $dataUpdate = array(
                        'NamaCustomer' => $name
                    );
                    
                    $result = $this->model_utama->updateCustomers($id,$dataUpdate);
                    
                    if($result){
                        $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Customer Updated!</div>");
                        redirect($this->getPath() . 'Customers');
                    }else{
                        $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Failed!</strong> Customer can't be Updated!</div>");
                        redirect($this->getPath() . 'Customers');
                    }
                }else{
                    $id = $this->input->post('nomor');
                    $name = $this->input->post('namaCustomer');
                    $config['upload_path'] = './Media/Customer/';
                    $config['allowed_types'] = "jpg|jpeg|png";
                    $config['file_name'] = str_replace(".", "", str_replace(" ", "-", $name));
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size'] = 2097152;

                    $this->load->library('upload', $config);
                    if(! $this->upload->do_upload('gambar')){
                        $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> " . $this->upload->display_errors() . "</div>");
                        redirect($this->getPath() . 'Customers');
                    }else{
                        $filename = $this->upload->data('file_name');
                        $dataUpdate = array(
                            'NamaCustomer' => $name,
                            'Image' => $filename
                        );
                        $result = $this->model_utama->updateCustomers($id,$dataUpdate);

                        if($result){
                            $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Customer Updated!</div>");
                            redirect($this->getPath() . 'Customers');
                        }else{
                            $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Failed!</strong> Customer can't be Updated!</div>");
                            redirect($this->getPath() . 'Customers');
                        }
                    }
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> Company Name can't be Empty!</div>");
                 redirect($this->getPath() . 'Customers');
            }
        }

        public function doDeleteCustomers(){
            $this->form_validation->set_rules('nomor','ID','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                
                $kd = $this->input->post('nomor');
                
                $res = $this->model_utama->deleteCustomers($kd);
                
                if($res){
                    $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                    redirect($this->getPath() . 'Customers');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                    redirect($this->getPath() . 'Customers');
                }
            }
        }

        /* Image Upload -Experience - Background -ServicesImage -Facility */
        public function experienceimage(){
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

        /* Facility */
        public function facilityimage(){
            $data['facility'] = $this->model_utama->getFacility();
            $this->getHeader();
            $this->load->view('admin/facility',$data);
            $this->load->view('footer');
        }

        public function doInsertFacility(){
            $this->form_validation->set_rules('header','Header','required|xss_clean|trim');
            $this->form_validation->set_rules('isiKet','Keterangan','required|xss_clean|trim');
            if(empty($_FILES['gambar']['name'])){
                $this->form_validation->set_rules('gambar','gambar','required');
            }
            
            if($this->form_validation->run() == TRUE){
                $head = $this->input->post('header');
                $ket = $this->input->post('isiKet');
                $config['upload_path'] = './Media/Facility/';
                $config['allowed_types'] = "jpg|jpeg|png";
                $config['file_name'] = str_replace(".", "", str_replace(" ", "-", $head));
                $config['file_ext_tolower'] = TRUE;
                $config['max_size'] = 2097152;
                
                $this->load->library('upload', $config);
                
                     
                if(!$this->upload->do_upload('gambar')){
                    $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> " . $this->upload->display_errors() . "</div>");
                    redirect($this->getPath() . 'facilityimage');
                }else{
                    $img = $this->upload->data('file_name');
                    $dataFacility = array(
                        'header' => $head,
                        'keterangan' => $ket,
                        'gambar' => $img
                    );
                    
                    $result = $this->model_utama->insertFacility($dataFacility);
                    
                    if($result){
                        $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Customer Inserted!</div>");
                        redirect($this->getPath() . 'facilityimage');
                    }else{
                        $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Failed!</strong> Customer can't be Inserted!</div>");
                        redirect($this->getPath() . 'facilityimage');
                    }
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-warning'><strong>Warning!</strong> There's Still an Empty Input!</div>");
                redirect($this->getPath() . 'facilityimage');
            }
        }

        public function doUpdateFacility(){
            $this->form_validation->set_rules();
        }

        public function doDeleteFacility(){
            $this->form_validation->set_rules('nomor','ID','required|xss_clean|trim');
            if($this->form_validation->run() == TRUE){
                $kd = $this->input->post('nomor');
                
                $res = $this->model_utama->deleteFacility($kd);
                
                if($res){
                   $this->session->set_flashdata("message","<div class='alert alert-success'><strong>Success!</strong> Data has been Deleted.</div>");
                    redirect($this->getPath() . 'facilityimage');
                }else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                    redirect($this->getPath() . 'facilityimage');
                }
            }else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><strong>Fail!</strong> Data can't be Deleted.</div>");
                redirect($this->getPath() . 'facilityimage');
            }
        }
        
          /* Location & Contact */
        public function LocationContact(){
            $this->getHeader();
            $this->load->view('footer');
        }
        
        /* Services */
        public function services(){
            $this->getHeader();
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