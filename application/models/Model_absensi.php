<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_absensi extends MY_Model{

        public function __construct(){
            parent::__construct();
        }

        /* Absensi */
        public function absensi($id,$date){
            $this->db->select('*');
            $this->db->from('tr_absensi');
            $this->db->where('ID_Karyawan', $id);
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
                'ID_Karyawan' => $id,
                'Tanggal' => $date,
                'ClockIn' => $waktu
            );

            $res = $this->db->insert('tr_absensi',$data);
            if($res){
                $query = $this->db->get_where('ms_karyawan',array('ID_Karyawan' => $id));
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
            // Get ID Terakhir dari user
            $s = $this->db->query('SELECT ID_Absensi FROM tr_absensi WHERE ID_Karyawan = ? AND Tanggal = ? ORDER BY ID_Absensi DESC LIMIT 1',array($id,$date))->row()->ID_Absensi;
            // Get Waktu Clock In
            $sql = $this->db->get_where('tr_absensi', array('ID_Karyawan' => $id,'Tanggal' => $date, 'ID_Absensi' => $s));
            $cin = $sql->row()->ClockIn;

            $query = "UPDATE tr_absensi SET ClockOut = ?, LamaKerja = TIMEDIFF(?,?) WHERE ID_Karyawan = ? AND Tanggal = ? AND ID_Absensi = ?";
            if($this->db->query($query, array($waktu, $waktu, $cin, $id,$date,$s))){
                $query = $this->db->get_where('ms_karyawan',array('ID_Karyawan' => $id));
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
            $this->db->where('ID_Karyawan',$kode);

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
            $this->db->where('ID_Karyawan',$kode);
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
            $this->db->where('ID_Karyawan',$kode);
            $this->db->where('Tanggal BETWEEN "'. $from . '" AND "' . $to .'"');

            $query = $this->db->get();

            if($query){
                return $query->row()->timeSum;
            }else{
                return FALSE;
            }
        }
    }
