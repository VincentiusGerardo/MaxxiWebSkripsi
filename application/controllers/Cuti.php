<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Cuti extends MY_Controller{
       public function __construct(){
           parent::__construct();
       }

       public function index(){
        $this->getHeader();
        $this->load->view('cuti');
        $this->load->view('footer');
       }
       
       public function doInsertCuti(){

        }

        public function doUpdateCuti(){

        }

        public function doCancelCuti(){
            
        }
   }