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
		$data['title']="All Products";
		$data['data'] = $products->getProducts();
		$this->load->view('products/productsread', $data);
	}
	function create()
	{
		$data['title'] = "Product Page::StockManagement";
		$this->load->library('form_validation');
		$this->load->view('products/addproduct', $data);
	}
	function store(){
		$products = new ProductModel;
		$products->AddProduct();
		redirect(base_url().'index.php/Products/index');
	}
	function delete($id){
		$products = new ProductModel;
		$products->DeleteProduct($id);
		if($products){
			redirect(base_url().'index.php/Products/index');
		}
	}
	function edit($id){
		$data['title'] = "Product Update Page::StockManagement";
		$products = new ProductModel;
		$arrData['registered_details'] = $products->getEachProductDetails($id);
		$this->load->view('products/updateProduct', $arrData);
	}
	function update($id){
		$products = new ProductModel;
		$products->UpdateProduct($id);
		redirect(base_url().'index.php/Products/index');
	}
}
