<?php
require_once APPPATH.'models/BaseModel.php';

class Product extends BaseModel {

    protected $table = 'products';

    public function get_by_id($id) {
        $this->db->where('products.id', $id);
        $this->db->select('products.*,users.name as user_name');
        $this->db->from('products');
        $this->db->join('users', 'products.created_by = users.id', 'left');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_all() {
        $this->db->select('products.*,users.name as user_name');
        $this->db->from('products');
        $this->db->join('users', 'products.created_by = users.id');
        $query = $this->db->get();
        return $query->result();
    }

    function register($data)
    {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }
}
