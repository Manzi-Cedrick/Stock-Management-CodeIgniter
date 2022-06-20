<?php
class StockModel extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function getInventory(){
        $query = $this->db->get('stk_inventory');
        return $query->result_array();
    }
    public function AddInventory(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('quantity', 'Quantity Required', 'required');
        $this->form_validation->set_rules('productId', 'Product Required', 'required');
        if($this->form_validation->run()== TRUE){
            $data = array(
                'quantity'=>$this->input->post('quantity'),
                'productId'=>$this->input->post('productId')
            );
            return $this->db->insert('stk_inventory', $data);
        }
    }
    public function UpdateInv($id){
        $data = array(
            'quantity'=>$this->input->post('quantity')        );
        $this->db->where('inventory_id',$id);
        return $this->db->update('stk_inventory',$data);
        
    }
    public function getEachInv($id){
        $this->db->select('*');
        $this->db->from('stk_inventory');
        $this->db->where('inventory_id',$id);
        $objectQuery = $this->db->get();
        return $objectQuery->result_array();
    }
    public function DeleteInv($id){
        $delete = $this->db->delete('stk_inventory', array('inventory_id'=>$id));
        if($delete){
            return true;
        };
    }
    public function getProductData(){
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getStockData(){
        $query = $this->db->get('stk_inventory');
        return $query->result();
    }
}
?>