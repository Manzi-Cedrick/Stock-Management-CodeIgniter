<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outgoing extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('OutGoingModel');
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
		$outgoingall = new OutGoingModel;
		$stockData['outgoing'] = $outgoingall->getOutgoing();
		$stockData['title'] = "Stock Inventory";
        return $this->load->view('outgoing/list',$stockData);
	}
	function createOut()
	{
		$outgoingall = new OutGoingModel;
		$data['title'] = "Add Stock Page::StockManagement";
		$data['productData']= $outgoingall->getProductData();
		$this->load->view('outgoing/addOutgoing', $data);
	}
	function storeOut(){
		$outgoingall = new OutGoingModel;
		$outgoingall->addOutGoing();
		redirect(base_url().'index.php/Outgoing/index');
	}
	function deleteOut($id){
		$outgoingall = new OutGoingModel;
		$outgoingall->deleteOutgoing($id);
		if($outgoingall){
			redirect(base_url().'index.php/Outgoing/index');
		}
	}
	function editOut($id){
		$data['title'] = "Stock Update Page::StockManagement";
		$outgoingall = new OutGoingModel;
		$arrData['registered_details'] = $outgoingall->getEachOutgoing($id);
		$this->load->view('outgoing/editOutgoing', $arrData);
	}
	function updateOut($id){
		$outgoingall = new OutGoingModel;
		$now=$outgoingall->updateOutgoing($id);
		if($now){
			redirect(base_url().'index.php/Outgoing/index');
		}
	}
	function OutgoingReport(){	
		ob_start();
		require('pdf/fpdf.php');	
		$pdf= new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(195,10,'Outgoing Report',1,1,'C');
		$pdf->Cell(25,10,'NO',1,0,'C');
		$pdf->Cell(55,10,'Quantity',1,0,'C');
		$pdf->Cell(20,10,'productId',1,0,'C');
		$outgoing = new OutGoingModel;
		$data= $outgoing->getOutgoingReport();
		foreach($data as $productData){
			$pdf->Cell(25,10, $productData->outgoingId,1,0,'C');
			$pdf->Cell(55,10, $productData->quantity,1,0,'C');
			$pdf->Cell(30,10, $productData->productId,1,0,'C');
		}
		$pdf->Output('outgoingReport.pdf','I');
		ob_end_flush();
	}
}
