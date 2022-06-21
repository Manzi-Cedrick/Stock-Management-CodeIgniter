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
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstName', 'FirstName Required', 'required');
        $this->form_validation->set_rules('lastName', 'lastname Required', 'required');
        $this->form_validation->set_rules('email', 'email Required', 'required');
        $this->form_validation->set_rules('phone', 'telephone  Required', 'required');
        $this->form_validation->set_rules('gender', 'gender  Required', 'required');
        // $this->form_validation->set_rules('imageprofile', 'imageprofile  Required', 'required');
        $this->form_validation->set_rules('username', 'username  Required', 'required');
        $this->form_validation->set_rules('password', 'password  Required', 'required');
        if($this->form_validation->run()== TRUE){
        $ori_filename = $_FILES['imageprofile']['name'];
        $new_name = time()."".str_replace(' ', '-', $ori_filename);
        $config = [
            'upload_path'=>'./images/',
            'allowed_types'=> 'gif|jpg|png',
            'file_name'=>$new_name
        ];
        $this->load->library('upload',$config);
        if ($this->upload->do_upload('userfile')) {
            $prod_filename = $this->upload->data('file_name');
        }
        $data = array(
            'firstName'=>$this->input->post('firstName'),
            'lastName'=>$this->input->post('lastName'),
            'email'=>$this->input->post('email'),
            'telephone'=>$this->input->post('phone'),
            'gender'=>$this->input->post('gender'),
            'profile'=> $prod_filename,
            'username'=>$this->input->post('username'),
            'password'=>hash('SHA512',$this->input->post('password'))
        );
        return $this->db->insert('users', $data);
    }else{
        echo 'Error Validation';
        redirect(base_url('user/signup'));
    }
    }
    public function LoginUser(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Required', 'required');
        $this->form_validation->set_rules('password', 'Password Required', 'required');
        if($this->form_validation->run()== TRUE){
        $data_validate= array(
        "email ="=>$this->input->post('email'),
        "password ="=>hash('SHA512',$this->input->post('password'))
        );
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($data_validate);
        $objectQuery = $this->db->get();
        return $objectQuery->result_array();
        }else{
            return FALSE;
        }
    }
    public function UpdateUser($id){
        $data = array(
            'firstName'=>$this->input->post('firstName'),
            'lastName'=>$this->input->post('lastName'),
            'email'=>$this->input->post('email'),
            'telephone'=>$this->input->post('phone'),
            'profile'=>$this->input->post('imageprofile'),
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