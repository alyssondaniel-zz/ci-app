<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id'))
        {
            redirect('private_area');
        }
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('user');
    }

    function signin()
    {
        $this->load->view('users/signin');
    }

    function validation()
    {
        $this->form_validation->set_rules('matriculation', 'Matrícula', 'required|trim');
        $this->form_validation->set_rules('password', 'Senha', 'required');
        if($this->form_validation->run())
        {
            $result = $this->user->can_login($this->input->post('matriculation'), $this->input->post('password'));
            if($result == '')
            {
                redirect(base_url('dashboard'));
            }
            else
            {
                $this->session->set_flashdata('message',$result);
                redirect(base_url('users/signin'));
            }
        }
        else
        {
            $this->index();
        }
    }

}
