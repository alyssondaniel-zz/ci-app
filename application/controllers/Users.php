<?php
require_once APPPATH.'controllers/BaseController.php';

class Users extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    function index() {
        $data['data'] = $this->user->get_all();
        $data['view'] = 'users/index';

        $this->load->view('layouts/default', $data);
    }

    public function new() {
        $data['data'] = [];
        $data['view'] = 'users/new';

        $this->load->view('layouts/default', $data);
    }

    public function create() {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Nome',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'matriculation',
                'label' => 'Matrícula',
                'rules' => 'required|trim|is_unique[users.matriculation]',
                'errors' => [
                    'required' => 'Você deve preencher uma %s.',
                    'is_unique' => 'A %s informada já foi cadastrada.'
                ],
            ],
            [
                'field' => 'password',
                'label' => 'Senha',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $data['data'] = [];
            $data['view'] = 'users/new';

            $this->load->view('layouts/default', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'matriculation' => $this->input->post('matriculation'),
                'password' => $this->encryption->encrypt($this->input->post('password')),
                'status' => ($this->input->post('status') != null),
            );

            $this->user->insert($data);

            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Usuário criado com êxito!');

            redirect(base_url('users'));
        }
    }

    public function edit($id) {
        $data['data'] = $this->user->get_by_id($id);
        $data['view'] = 'users/edit';
        $this->load->view('layouts/default', $data);
    }

    public function update($id) {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Nome',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],

            ],
            [
                'field' => 'matriculation',
                'label' => 'Matrícula',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'name' => $this->input->post('name'),
                'matriculation' => $this->input->post('matriculation'),
                'status' => ($this->input->post('status') != null),
            ];

            $this->user->update($id,$data);

            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Usuário atualizado com êxito!');

            redirect(base_url('users'));
        } else {
            $data['data'] = $this->user->get_by_id($id);
            $data['view'] = 'users/edit';
            $this->load->view('layouts/default', $data);
        }
    }

    public function remover($id){
        $this->user->delete($id);

        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Usuário removido com êxito!');

        redirect(base_url('users'));
    }

    public function signin()
    {
        $this->load->view('users/signin');
    }

    public function validation()
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
