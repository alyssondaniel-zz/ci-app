<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id'))
        {
            redirect(base_url('users/signin'));
        }

        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }
}
