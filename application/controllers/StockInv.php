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
		$stockall = new StockModel;
		$stockData['stockData'] = $stockall->getInventory();
		$stockData['title'] = "Stock Inventory";
        return $this->load->view('inventory/invAll',$stockData);
	}
	function createInv()
	{
		$stockall = new StockModel;
		$data['title'] = "Add Stock Page::StockManagement";
		$data['productData']= $stockall->getProductData();
		$this->load->view('inventory/invAdd', $data);
	}
	function storeInv(){
		$stockall = new StockModel;
		$stockall->AddInventory();
		redirect(base_url().'index.php/StockInv/index');
	}
	function deleteStock($id){
		$stockall = new StockModel;
		$stockall->DeleteInv($id);
		if($stockall){
			redirect(base_url().'index.php/StockInv/index');
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
			redirect(base_url().'index.php/StockInv/index');
		}
	}
	function StockReport(){	
		ob_start();
		require('pdf/fpdf.php');	
		$pdf= new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(100,20,'Stock Inventory Report',1,1,'C');
		$pdf->Cell(25,10,'NO',1,0,'C');
		$pdf->Cell(55,10,'Quantity',1,0,'C');
		$pdf->Cell(20,10,'productId',1,0,'C');
		$stockall = new StockModel;
		$data= $stockall->getStockData();
		foreach($data as $productData){
			$pdf->Cell(25,10, $productData->inventory_id,1,0,'C');
			$pdf->Cell(55,10, $productData->quantity,1,0,'C');
			$pdf->Cell(20,10, $productData->productId,1,0,'C');
		}
		$pdf->Output('stockReport.pdf','I');
		ob_end_flush();
	}
}
