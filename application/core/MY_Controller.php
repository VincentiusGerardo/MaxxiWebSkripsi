<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            if(!$this->session->userdata('is_logged')){
                redirect(base_url());
            }
            $this->load->model('model_utama');
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

        public function getUploadPath(){
            $url = "https://maxximumservices.com/Maxxi/";
            return $url;
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

        /* Fleet */
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

        /* Customers */
        public function customers(){
            $data['customer'] = $this->model_utama->getCustomers();
            $data['imageurl'] = $this->getUploadPath();
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
                $config['upload_path'] = './media/';
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
                    $dataCustomer = array(
                        'NamaCustomer' => $name,
                        'Image' => $filename
                    );
                    $this->load->library('ftp');
                    $source = '/home/u635941118 /public_html/backend/media/' . $filename;
                    $ftp_config['hostname'] = 'ftp.maxximumservices.com'; 
                    $ftp_config['username'] = 'u635941118';
                    $ftp_config['password'] = 'F3licit@';
                    $ftp_config['port']     = 21;
                    $ftp_config['debug']    = TRUE;

                    //Connect to the remote server
                    $this->ftp->connect($ftp_config);

							$list = $this->ftp->list_files('/home/u635941118 /public_html/backend/');

							print_r($list);
                    //File upload path of remote server
//                     $destination = '/home/u635941118 /public_html/Maxxi/Media/Customer/';

//                     //Upload file to the remote server
//                     $this->ftp->upload($source,$destination, 'ascii', 0775);

                    //Close FTP connection
                    $this->ftp->close();
                    
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

        /* Facility */
        public function facility(){
            $data['facility'] = $this->model_utama->getFacility();
            $this->getHeader();
            $this->load->view('admin/facility',$data);
            $this->load->view('footer');
        }

        public function doInsertFacility(){

        }

        public function doUpdateFacility(){

        }

        public function doDeleteFacility(){

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
            if($this->form_validation->run() == TRUE){
                $nama = $this->input->post('namaMenu');
                $link = $this->input->post('url');
                if(empty($link)){
                    $link = $nama;
                }
                $dataMenu = array(
                    'NamaMenu' => $nama,
                    'URL' => trim(str_replace(" ","",$link))
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
            
            if($this->form_validation->run() == TRUE){
                $cod = $this->input->post('kode');
                $nama = $this->input->post('namaMenu');
                $link = $this->input->post('url');
                if(empty($link)){
                    $link = $nama;
                }
                $dataMenu = array(
                    'NamaMenu' => $nama,
                    'URL' => trim(str_replace(" ","",$link))
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
        
        /* Cuti */
        public function cuti(){
            $this->getHeader();
            $this->load->view('footer');
        }
    }
