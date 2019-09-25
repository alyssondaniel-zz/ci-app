<?php
require_once APPPATH.'models/BaseModel.php';

class Sale extends BaseModel {

    protected $table = 'sales';

    // public function get_by_id($id) {
    //     $this->db->where('customers.id', $id);
    //     $this->db->select('customers.*,users.name as user_name');
    //     $this->db->from('customers');
    //     $this->db->join('users', 'customers.created_by = users.id', 'left');
    //     $query = $this->db->get();
    //     return $query->row();
    // }
    //
    // public function get_all() {
    //     $this->db->select('customers.*,users.name as user_name');
    //     $this->db->from('customers');
    //     $this->db->join('users', 'customers.created_by = users.id');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
}
