<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
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
		if($this->session->userdata('user')){
			$usersall = new UserModel;
			$user_data['user_data'] = $usersall->getAllUser();
			$user_data['user'] = $this->session->userdata('user');
			$user_data['title'] = "Stock Management App";
			return $this->load->view('dashboard',$user_data);
		}else{
			redirect(base_url().'user/login');
		}
	}
	function createUser()
	{
		$data['title'] = "Add User Page::StockManagement";
		$this->load->library('form_validation');
		$this->load->view('user/addUser', $data);
	}
	function storeUser(){
		$usersall = new UserModel;
		if ($usersall->AddUser()) {
			redirect(base_url().'user/login');
		}
	}
	function showLoginUser(){
		$this->load->view('user/loginUser');
	}
	function loginUser(){
		$usersall = new UserModel;
		$selectedData['login_data']= $usersall->LoginUser();
		if($selectedData['login_data'] != FALSE){
			$this->session->set_userdata('user',$selectedData);
			redirect(base_url());
		}else{
			redirect(base_url().'user/login');
		}
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
		if($usersall->UpdateUser($id)){
			redirect(base_url());
		}
	}
	function UserReport(){	
		ob_start();
		require('pdf/fpdf.php');	
		$pdf= new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(195,10,'User Report',1,1,'C');
		$pdf->Cell(15,10,'NO',1,0,'C');
		$pdf->Cell(30,10,'FirstName',1,0,'C');
		$pdf->Cell(30,10,'lastName',1,0,'C');
		$pdf->Cell(40,10,'email',1,0,'C');
		$pdf->Cell(20,10,'username',1,0,'C');
		$pdf->Cell(25,10,'Tel',1,1,'C');
		$products = new UserModel;
		$data= $products->getAllUserReport();
		foreach($data as $productData){
			$pdf->Cell(15,10, $productData->userId,1,0,'C');
			$pdf->Cell(30,10, $productData->firstName,1,0,'C');
			$pdf->Cell(30,10, $productData->lastName,1,0,'C');
			$pdf->Cell(40,10, $productData->email,1,0,'C');
			$pdf->Cell(20,10,$productData->telephone,1,0,'C');
			$pdf->Cell(20,10,$productData->gender,1,0,'C');
			$pdf->Cell(45,10,$productData->username,1,0,'C');
		}
		$pdf->Output('productReport.pdf','I');
		ob_end_flush();
	}
}
