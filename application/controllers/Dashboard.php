<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/BaseController.php';

class Dashboard extends BaseController {

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }

    function logout()
    {
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value)
        {
            $this->session->unset_userdata($row);
        }
        redirect(base_url('users/signin'));
    }
}
