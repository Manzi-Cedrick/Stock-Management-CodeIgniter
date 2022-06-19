<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$usersall = new UserModel;
		$user_data['user_data'] = $usersall->getAllUser();
		$user_data['title'] = "Dashboard";
        return $this->load->view('dashboard',$user_data);
	}
	function createUser()
	{
		$data['title'] = "Add User Page::StockManagement";
		$this->load->library('form_validation');
		$this->load->view('user/addUser', $data);
	}
	function storeUser(){
		$usersall = new UserModel;
		$usersall->AddUser();
		redirect(base_url());
	}
	function deleteUser($id){
		$usersall = new UserModel;
		$usersall->DeleteUser($id);
		if($usersall){
			redirect(base_url());
		}
	}
	function editUser($id){
		$data['title'] = "User Update Page::StockManagement";
		$usersall = new UserModel;
		$arrData['registered_details'] = $usersall->getEachUserDetail($id);
		$this->load->view('user/editUser', $arrData);
	}
	function updateUser($id){
		$usersall = new UserModel;
		$now=$usersall->UpdateUser($id);
		if($now){
			redirect(base_url());
		}
	}
}
