<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_utama extends CI_Model{

        public function __construct(){
            parent::__construct();
        }
        
        /* Menu & SubMenu */
        public function getMenu($kode){
            $this->db->select('b.ID_Menu,b.NamaMenu,b.URL,b.Logo');
            $this->db->from('tr_authorizemenu a');
            $this->db->join('ms_menu b','a.ID_Menu = b.ID_Menu','inner');
            $this->db->where('a.KodeKaryawan', $kode);
            $this->db->where('b.FlagActive', 'Y');
            
            $query = $this->db->get();
            return $query->result();
            //$query = $this->db->get_compiled_select();
            //echo $query;
            /*
                SELECT b.ID_Menu,b.NamaMenu,b.URL,b.List
                FROM tr_authorizemenu a, ms_menu b
                WHERE a.ID_Menu = b.ID_Menu
                AND b.FlagActive = 'Y'
                AND a.KodeKaryawan = '$kode'
            $query = $this->db->get_where('ms_menu', array('ID_Role' => $role));
            return $query->result();
            */
        }
        
        public function getSubMenu($kode){
            $this->db->select('b.ID_SubMenu,b.NamaSubMenu,b.URL,b.ID_Menu');
            $this->db->from('tr_authorizesubmenu a');
            $this->db->join('ms_submenu b','a.ID_SubMenu = b.ID_SubMenu','inner');
            $this->db->where('a.KodeKaryawan', $kode);
            $this->db->where('b.FlagActive', 'Y');
            
            $query = $this->db->get();
            return $query->result();
        }
        
        public function getUserName($kode){
            $query = $this->db->get_where('ms_karyawan', array('KodeKaryawan' => $kode));
            return $query->row()->NamaKaryawan;
        }
        
        /* Change Password */
        public function updatePass($pass,$kode){
            $data = array('Password' => $this->hashPassword($pass));
            $this->db->set($data);
            $this->db->where('KodeKaryawan', $kode);
            $query = $this->db->update('ms_karyawan');
            
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function hashPassword($pass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            return $hash;
        }
        
        public function getStoredPass($kode){
            $cond = array('KodeKaryawan' => $kode);
            $q = $this->db->get_where('ms_karyawan',$cond);
            
            if($q->num_rows() > 0){
                $rs = $q->row();
                return $rs->Password;
            }else{
                return FALSE;
            }
        }
        
        public function validasi($pass,$kode){
            if(password_verify($pass, $this->getStoredPass($kode))){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        
        /* Fleet */
        
        public function getFleet(){
            $query = $this->db->get_where('ms_fleet', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertFleet($data){
            $res = $this->db->insert('ms_fleet',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function updateFleet($no,$data){
            $cond = array('No' => $no);
            $res = $this->db->update('ms_fleet',$data,$cond);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function deleteFleet($no){
            $data = array('FlagActive' => 'N');
            $cond = array('No' => $no);
            $res = $this->db->update('ms_fleet',$data,$cond);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        /* Services */
        
        public function getServices(){
            $query = $this->db->get_where('ms_services', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertServices(){
            
        }
        
        public function updateServices(){
            
        }
        
        public function deleteServices(){
            
        }
        
        /* About */
        
        public function getComPro(){
            $query = $this->db->get_where('ms_compro', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertComPro($data){
            $query = $this->db->insert('ms_compro',$data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function updateComPro($id,$data){
            $cond = array('id_compro' => $id);
            $query = $this->db->update('ms_compro',$data,$cond);
            
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function deleteComPro($id){
            $cond = array('id_compro' => $id);
            $data = array('FlagActive' => 'N');
            
            $query = $this->db->update('ms_compro',$data,$cond);
            
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        /* Facility */
        
        public function getFacility(){
            $query = $this->db->get_where('ms_facility', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertFacility($data){
            $query = $this->db->insert('ms_facility',$data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function updateFacility(){
            
        }
        
        public function deleteFacility($id){
            $cond = array('id_facility' => $id);
            $data = array('FlagActive' => 'N');
            $res = $this->db->update('ms_facility',$data,$cond);
            
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        /* Customers */
        
        public function getCustomers(){
            $query = $this->db->get_where('ms_customer', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertCustomers($data){
            $res = $this->db->insert('ms_customer',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function updateCustomers($id,$data){
            $cond = array('idCustomer' => $id);
            $res = $this->db->update('ms_customer',$data,$cond);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function deleteCustomers($id){
            $cond = array('idCustomer' => $id);
            $data = array('FlagActive' => 'N');
            $res = $this->db->update('ms_customer', $data,$cond);
            
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        /* Experience Gallery */
        
        public function getExperience(){
            $query = $this->db->get_where('ms_experience', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertExperience($data){
            
        }
        
        public function updateExperience(){
            
        }
        
        public function deleteExperience(){
            
        }
        
        /* Mission Control */
        
        public function getKaryawan(){
            $query = $this->db->get_where('ms_karyawan', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function getMenuByKode($kode){
            $this->db->select('a.ID_Menu, a.NamaMenu');
            $this->db->from('ms_menu a');
            $this->db->join('tr_authorizemenu b','a.ID_Menu = b.ID_Menu', 'inner');
            $this->db->where('b.KodeKaryawan', $kode);
            $query = $this->db->get();
            
            return $query->result();
        }
        
        public function getAllMenu(){
            $query = $this->db->get_where('ms_menu', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function getAllSubMenu(){
            $this->db->select('a.ID_SubMenu, a.NamaSubMenu, b.NamaMenu,a.ID_Menu,a.URL');
            $this->db->from('ms_submenu a');
            $this->db->join('ms_menu b', 'a.ID_Menu = b.ID_Menu', 'inner');
            $this->db->where('a.FlagActive','Y');
            
            $query = $this->db->get();

            return $query->result();
        }
        
        public function getAllSub(){
            $query = $this->db->get_where('ms_submenu', array('FlagActive' => 'Y'));
            return $query->result();
        }
        
        public function insertAuthMenu($data){
            $query = $this->db->insert_batch('tr_authorizemenu',$data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function insertAuthSubMenu($data){
            $query = $this->db->insert_batch('tr_authorizesubmenu', $data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function insertMasterMenu($data){
            $res = $this->db->insert('ms_menu',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function updateMasterMenu($kode,$data){
            $cond = array('ID_Menu' => $kode);
            $res = $this->db->update('ms_menu',$data,$cond);
            
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function deleteMasterMenu($kode){
            $data = array('FlagActive' => 'N');
            $cond = array('ID_Menu' => $kode);
            $res = $this->db->update('ms_menu',$data,$cond);
            
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function getSubFromMenu(){
            $query = $this->db->get_where('ms_menu', array('FlagActive' => 'Y', 'URL' => '#'));
            return $query->result();
        }
        
        public function insertSubMenu($data){
            $res = $this->db->insert('ms_submenu',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function updateSubMenu($id,$data){
            $cond = array('ID_SubMenu' => $id);
            $res = $this->db->update('ms_submenu',$data,$cond);
            
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function deleteSubMenu($id){
            $data = array('FlagActive' => 'N');
            $cond = array('ID_SubMenu' => $id);
            $res = $this->db->update('ms_submenu', $data,$cond);
            
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function getSubMenuByKode($n){
            $this->db->select('a.ID_SubMenu, a.NamaSubMenu');
            $this->db->from('ms_submenu a');
            $this->db->join('tr_authorizesubmenu b','a.ID_SubMenu = b.ID_SubMenu', 'inner');
            $this->db->where('b.KodeKaryawan', $n);
            $query = $this->db->get();
            
            return $query->result();
        }
        
        /* Absensi */
        public function absensi($id,$date){
            $this->db->select('*');
            $this->db->from('tr_absensi');
            $this->db->where('KodeKaryawan', $id);
            $this->db->where('Tanggal', $date);
            $this->db->where('ClockOut IS NULL');
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                //echo "Clock Out";
                $this->clockout($id,$date);
            }else{
                //echo "Clock In";
                $this->clockin($id,$date);
            }
        }
        
        public function clockin($id,$date){
            $waktu = date("H:i:s");
            $data = array(
                'KodeKaryawan' => $id,
                'Tanggal' => $date,
                'ClockIn' => $waktu
            );
            
            $res = $this->db->insert('tr_absensi',$data);
            if($res){
                $query = $this->db->get_where('ms_karyawan',array('KodeKaryawan' => $id));
                $r = $query->row()->NamaKaryawan;
                echo "Welcome " . $r;
                return TRUE;
            }else{
                return FALSE;
            }
//            $sql = $this->db->set($data)->get_compiled_insert('tr_absensi');
//            echo $sql;
        }
        
        public function clockout($id,$date){
            $waktu = date("H:i:s");
            // Get Waktu Clock In
            $sql = $this->db->get_where('tr_absensi', array('KodeKaryawan' => $id,'Tanggal' => $date));
            $cin = $sql->row()->ClockIn;
            
            $query = "UPDATE tr_absensi SET ClockOut = ?, LamaKerja = TIMEDIFF(?,?) WHERE KodeKaryawan = ? AND Tanggal = ?";
            if($this->db->query($query, array($waktu, $waktu, $cin, $id,$date))){   
                $query = $this->db->get_where('ms_karyawan',array('KodeKaryawan' => $id));
                $r = $query->row()->NamaKaryawan;
                echo "Goodbye " . $r;
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function getGambar($kode){
            $this->db->select('Foto');
            $this->db->from('ms_karyawan');
            $this->db->where('KodeKaryawan',$kode);
            
            $query = $this->db->get();
            
            if($query){
                return $query->row()->Foto;
            }else{
                return FALSE;
            }
        }
        
        /* Rekap Absensi */
        
        public function getAbsen($kode,$from,$to){
            $this->db->select('*');
            $this->db->from('tr_absensi');
            $this->db->where('KodeKaryawan',$kode);
            $this->db->where('Tanggal BETWEEN "'. $from . '" AND "' . $to .'"');
            $this->db->order_by('Tanggal', 'ASC');
            
            $sql = $this->db->get();
            
            return $sql->result();
            /*$sql = $this->db->get_compiled_select();
            echo $sql;*/
        }
        
        public function getTotalJam($kode,$from,$to){
            $this->db->select('SEC_TO_TIME( SUM( TIME_TO_SEC( LamaKerja ) ) ) AS timeSum ');
            $this->db->from('tr_absensi');
            $this->db->where('KodeKaryawan',$kode);
            $this->db->where('Tanggal BETWEEN "'. $from . '" AND "' . $to .'"');
            
            $query = $this->db->get();
            
            if($query){
                return $query->row()->timeSum;
            }else{
                return FALSE;
            }
        }
        
    }
