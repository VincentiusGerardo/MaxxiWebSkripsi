<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   class Karyawan extends MY_Controller{
       public function __construct(){
           parent::__construct();
       }

       public function index(){
           $this->getHeader();
           $this->load->view('karyawan');
           $this->load->view('footer');
       }
   }