<?php
class ProductModel extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function getProducts(){
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getProductData(){
        $query = $this->db->get('products');
        return $query->result();
    }
    public function AddProduct(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('productName', 'Quantity Required', 'required');
        $this->form_validation->set_rules('brand', 'Brand Required', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier Required', 'required');
        $this->form_validation->set_rules('supplier_phone', 'Supplier Tel Required', 'required');
        if($this->form_validation->run()== TRUE){
        $data = array(
            'product_Name'=>$this->input->post('productName'),
            'brand'=>$this->input->post('brand'),
            'supplier'=>$this->input->post('supplier'),
            'supplier_phone'=>$this->input->post('supplier_phone'),
        );
        return $this->db->insert('products', $data);
    }
    }
    public function UpdateProduct($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('productName', 'Quantity Required', 'required');
        $this->form_validation->set_rules('brand', 'Brand Required', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier Required', 'required');
        $this->form_validation->set_rules('supplier_phone', 'Supplier Tel Required', 'required');
        if($this->form_validation->run()== TRUE){
        $data = array(
            'product_Name'=>$this->input->post('productName'),
            'brand'=>$this->input->post('brand'),
            'supplier'=>$this->input->post('supplier'),
            'supplier_phone'=>$this->input->post('supplier_phone'),
        );
        $this->db->where('productId',$id);
        return $this->db->update('products',$data);
    }
    }
    public function getEachProductDetails($id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('productId',$id);
        $objectQuery = $this->db->get();
        return $objectQuery->result_array();
    }
    public function DeleteProduct($id){
        $delete = $this->db->delete('products', array('productId'=>$id));
        if($delete){
            return true;
        };
    }
}
?>