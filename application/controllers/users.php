<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('UsersModel');
            $this->load->library('upload');
            $this->data = array();
            //$this->data["session"] = $this->session->userdata;
        }
	
        public function index()
	{
            redirect("/login");
        }
	public function login()
	{
            if(!empty($this->session->userdata('id')))
            {
                redirect("/");
            }
            if($this->input->post("login"))
            {
                 $records = array(
                   "username" => $this->input->post("username"), 
                   "password" => md5($this->input->post("password")),
               );
               $response = $this->CommonModel->loginUser($records);
            }
            else
            {
               $this->data['pagetitle']  = "Login";
               $this->load->view('include/header',$this->data);
              $this->load->view('login',$this->data);
                $this->load->view('include/footer',$this->data);
               
            }
	}
        public function register()
	{
            if(!empty($this->session->userdata('id')))
            {
                 redirect("/");
            }
            if($this->input->post("register"))
            {
                $imagename = time()."-".$_FILES["profile"]['name'];
                $this->upload->initialize(array(
                        "upload_path" => "./assets/images/users",
                        "allowed_types" => "gif|jpg|png",
                        "file_name"=>$imagename,
                ));
		if ( !$this->upload->do_upload("profile"))
		{
			$error = array('error' => $this->upload->display_errors());

                        print_r($error);
			//$this->load->view('upload_form', $error);
		}
		
                if($this->input->post("password") != $this->input->post("repassword"))
                {
                     $this->session->set_flashdata('mismatch',('Password Mismatch'));
                        redirect("/register");
                }
                $records = array(
                    "username" => $this->input->post("username"), 
                    "userrole" => $this->input->post("userrole"),
                    "location" => $this->input->post("location"),
                    "email" => $this->input->post("email"),
                    "phoneno" => $this->input->post("number"),
                    "password" => md5($this->input->post("password")),
                    "profilepic" => $imagename,
                    
                );
                $response = $this->CommonModel->insert("users",$records);
                
                if($response == "success")
                {
                    $this->session->set_flashdata('success',('Your registration is successfull. Please login from here'));
                    redirect("login");
                }
            }
            else
            {
                $this->data['pagetitle']  = "Register";
                $this->load->view('include/header',$this->data);
                $this->load->view('register',$this->data);
                $this->load->view('include/footer',$this->data);
            }
            
        }

	public function logout()
	{
	       $this->session->sess_destroy();
		
		redirect("/login");
	}
        
        
        
}

/* End of file PageController.php */
/* Location: ./application/controllers/PageController.php */