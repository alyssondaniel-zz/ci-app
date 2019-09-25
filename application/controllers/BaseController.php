<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if
        (
            !$this->session->userdata('id')
            && $this->router->fetch_method() != 'signin'
            && $this->router->fetch_method() != 'validation'
            && $this->router->fetch_method() != 'get_amount_by_id'
        )
        {
            redirect(base_url('users/signin'));
        }

        $this->load->helper(['url', 'form', 'date']);
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }
}
