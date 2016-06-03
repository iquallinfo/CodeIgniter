<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersModel extends CI_Model{
	function __construct() {
            parent::__construct();
	}

        
        function updateProfile($data){

                $this->db->where("id",$this->session->userdata('id'));
		$response = $this->db->update('users', $data); 
                return $response;
	}
	
	public function getUsersdetail() {
             $this->db->select('*');
             $this->db->from('users');
             $query = $this->db->get();
             
             return $query->result_array();
	}
        
        public function getSingleUser() {
             $this->db->select('*');
             $this->db->from('users');
             $this->db->where("id",$this->session->userdata('id'));
             $query = $this->db->get();
             return $query->row_array();
	}
        public function deleteSingleJob($id) {
            $this->db->where('id', $id);
            $this->db->delete('jobs'); 
            return true;
        }
        public function deleteMultipleJob($ids) {
            $this->db->where_in('id', $ids);
            $this->db->where("userid",$this->session->userdata('id'));
            $this->db->delete('jobs'); 
            return true;
        }
         public function getUsersSkills() {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where("id",$this->session->userdata('id'));
            $query = $this->db->get();
            $usersSkills = $query->row_array();
            
            if($usersSkills["skills"] != "")
            {
                $this->db->select('*');
                $this->db->from('skills');
                $this->db->where_in("id",json_decode($usersSkills["skills"]));
                $query = $this->db->get();            
                return $query->result_array();
            }
            return false;
       }
        
        
}
?>