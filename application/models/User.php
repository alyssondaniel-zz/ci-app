<?php
require_once APPPATH.'models/BaseModel.php';

class User extends BaseModel {

    protected $table = 'users';

    public function get_by_id($id) {
        $this->db->where('users.id', $id);
        $this->db->select('users.*,users.name');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_all() {
        $this->db->select('users.*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    function can_login($matriculation, $password)
    {
        $this->db->where('matriculation', $matriculation);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                if($password == $this->encryption->decrypt($row->password) && $row->status == true)
                {
                    $this->session->set_userdata('id', $row->id);
                }
                else
                {
                    return 'Wrong Password';
                }
            }
        }
        else
        {
            return 'Wrong Matriculation';
        }
    }

    function register($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
}
