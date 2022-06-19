<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockInv extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('StockModel');
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
		$stockall = new UserModel;
		$stockData['stockData'] = $stockall->getAllUser();
		$stockData['title'] = "Stock Inventory";
        return $this->load->view('inventory/invAll',$stockData);
	}
	function createInv()
	{
		$data['title'] = "Add Stock Page::StockManagement";
		$this->load->library('form_validation');
		$this->load->view('inventory/invAdd', $data);
	}
	function storeInv(){
		$stockall = new StockModel;
		$stockall->AddInventory();
		redirect(base_url());
	}
	function deleteStock($id){
		$stockall = new StockModel;
		$stockall->DeleteInv($id);
		if($stockall){
			redirect(base_url());
		}
	}
	function editStock($id){
		$data['title'] = "Stock Update Page::StockManagement";
		$stockall = new StockModel;
		$arrData['registered_details'] = $stockall->getEachInv($id);
		$this->load->view('inventory/invEdit', $arrData);
	}
	function updateStock($id){
		$stockall = new StockModel;
		$now=$stockall->UpdateInv($id);
		if($now){
			redirect(base_url());
		}
	}
}
