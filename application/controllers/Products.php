<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Products extends CI_Controller
{
	public function __construct(){
		//load database in autoload libraries 
			  parent::__construct();
		$this->load->model('ProductModel');
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
	function index()
	{
		$products = new ProductModel;
		$data['titles']="All Products::Store Management";
		$data['data'] = $products->getProducts();
		$this->load->view('products/productsread', $data);
	}
	function createProduct()
	{
		$data['title'] = "Product Page::StockManagement";
		$this->load->library('form_validation');
		$this->load->view('products/addproduct', $data);
	}
	function storeProduct(){
		$products = new ProductModel;
		$products->AddProduct();
		redirect(base_url().'index.php/Products/index');
	}
	function deleteProduct($id){
		$products = new ProductModel;
		$products->DeleteProduct($id);
		if($products){
			redirect(base_url().'index.php/Products/index');
		}
	}
	function editProduct($id){
		$data['title'] = "Product Update Page::StockManagement";
		$products = new ProductModel;
		$arrData['registered_details'] = $products->getEachProductDetails($id);
		$this->load->view('products/updateProduct', $arrData);
	}
	function updateProduct($id){
		$products = new ProductModel;
		$products->UpdateProduct($id);
		redirect(base_url().'index.php/Products/index');
	}
	function ProductReport(){
		$pdf= new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(195,10,'Products Report',1,1,'C');
		$pdf->Cell(15,10,'Product Name',1,0,'C');
		$pdf->Cell(65,10,'brand',1,0,'C');
		$pdf->Cell(60,10,'supplier',1,0,'C');
		$pdf->Cell(55,10,'supplier Tel',1,1,'C');
		$products = new ProductModel;
		$data['data'] = $products->getProducts();
		foreach($data as $product){
		$pdf->Cell(15,10,$product['product_Name'],1,0,'C');
		$pdf->Cell(65,10,$product['brand'],1,0,'C');
		$pdf->Cell(60,10,$product['supplier'],1,0,'C');
		$pdf->Cell(55,10,$product['supplier_phone'],1,1,'C');
		}
		$pdf->Output('productReport.pdf','I');
	}
}
