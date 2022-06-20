<?php
class UserModel extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function getAllUser(){
        $query = $this->db->get('users');
        return $query->result_array();
    }
    public function getAllUserReport(){
        $query = $this->db->get('users');
        return $query->result();
    }
    public function AddUser(){
        $data = array(
            'firstName'=>$this->input->post('firstName'),
            'lastName'=>$this->input->post('lastName'),
            'email'=>$this->input->post('email'),
            'telephone'=>$this->input->post('phone'),
            'gender'=>$this->input->post('gender'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        );
        return $this->db->insert('users', $data);
    }
    public function UpdateUser($id){
        $data = array(
            'firstName'=>$this->input->post('firstName'),
            'lastName'=>$this->input->post('lastName'),
            'email'=>$this->input->post('email'),
            'telephone'=>$this->input->post('phone'),
            'gender'=>$this->input->post('gender'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        );
        $this->db->where('userId',$id);
        return $this->db->update('users',$data);
        
    }
    public function getEachUserDetail($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userId',$id);
        $objectQuery = $this->db->get();
        return $objectQuery->result_array();
    }
    public function DeleteUser($id){
        $delete = $this->db->delete('users', array('userId'=>$id));
        if($delete){
            return true;
        };
    }
}
?>