<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id'))
        {
            redirect(base_url('users/signin'));
        }
    }

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
