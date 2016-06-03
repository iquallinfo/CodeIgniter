<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
	$this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('upload');	
        $this->load->library('session');
        $this->data = array();
    }
    
    public function loadView($fileName,$data = array()){
        $this->data = $data;
        $this->load->view('include/header',$this->data);
        $this->load->view($fileName,$this->data);
        $this->load->view('include/footer',$this->data);
    }
    public function checkSession()
    {
        if(empty($this->session->userdata('id')))
        {
             redirect("/login");
        }
    }
    
    public function profilepic($profilepic)
    {
        $profile = ($profilepic != "")?$profilepic:"default.jpg";
        return $profile;
    }
    
    
    
}

class Admin_Controller extends MY_Controller{
		
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
	$this->load->library('form_validation');
        $this->load->library('upload');	
        $this->load->model('admin/AdminCommonModel');
    }
    public function loadAdminView($fileName,$data = array()){
		
        $this->load->view('admin/include/header',$data);
        $this->load->view($fileName,$data);
        $this->load->view('admin/include/footer',$data);
    }
    
    
}