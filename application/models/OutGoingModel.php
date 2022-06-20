<?php
class OutGoingModel extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function getOutgoing(){
        $query = $this->db->get('outgoing');
        return $query->result_array();
    }
    public function addOutGoing(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('quantity', 'Quantity Required', 'required');
        $this->form_validation->set_rules('productId', 'Product Required', 'required');
        if($this->form_validation->run()== TRUE){
            $data = array(
                'quantity'=>$this->input->post('quantity'),
                'productId'=>$this->input->post('productId')
            );
            return $this->db->insert('outgoing', $data);
        }
    }
    public function updateOutgoing($id){
        $data = array(
            'quantity'=>$this->input->post('quantity')        );
        $this->db->where('outgoingId',$id);
        return $this->db->update('outgoing',$data);
        
    }
    public function getEachOutgoing($id){
        $this->db->select('*');
        $this->db->from('outgoing');
        $this->db->where('outgoingId',$id);
        $objectQuery = $this->db->get();
        return $objectQuery->result_array();
    }
    public function deleteOutgoing($id){
        $delete = $this->db->delete('outgoing', array('outgoingId'=>$id));
        if($delete){
            return true;
        };
    }
    public function getProductData(){
        $query = $this->db->get('products');
        return $query->result_array();
    }
}
?>