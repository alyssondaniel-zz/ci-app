<?php
require_once APPPATH.'controllers/BaseController.php';

class Customers extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('customer');
    }

    public function index() {
        $data['data'] = $this->customer->get_all();
        $data['view'] = 'customers/index';

        $this->load->view('layouts/default', $data);
    }
    public function new() {
        $data['data'] = [];
        $data['view'] = 'customers/new';

        $this->load->view('layouts/default', $data);
    }

    public function create() {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Nome',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
            [
                'field' => 'document',
                'label' => 'CPF',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Você deve preencher um %s.',
                    'is_unique' => 'A %s informada já foi cadastrada.'
                ],
            ],
            [
                'field' => 'registry',
                'label' => 'RG',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'address',
                'label' => 'Endereço',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'address_number',
                'label' => 'Número',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'address_city',
                'label' => 'Cidade',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
            [
                'field' => 'address_state',
                'label' => 'Estado',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'income',
                'label' => 'Renda',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $data['data'] = [];

            $data['view'] = 'customers/new';

            $this->load->view('layouts/default', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'document' => $this->input->post('document'),
                'registry' => $this->input->post('registry'),
                'address' => $this->input->post('address'),
                'address_number' => $this->input->post('address_number'),
                'address_city' => $this->input->post('address_city'),
                'address_state' => $this->input->post('address_state'),
                'income' => $this->input->post('income'),
                'status' => ($this->input->post('status') != null),
                'created_by' => $this->session->userdata('id'),
            );

            $this->customer->insert($data);

            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Cliente criado com êxito!');

            redirect(base_url('customers'));
        }
    }

    public function edit($id) {
        $data['data'] = $this->customer->get_by_id($id);;

        $data['view'] = 'customers/edit';

        $this->load->view('layouts/default', $data);
    }

    public function update($id) {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Nome',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
            [
                'field' => 'document',
                'label' => 'CPF',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Você deve preencher um %s.',
                    'is_unique' => 'A %s informada já foi cadastrada.'
                ],
            ],
            [
                'field' => 'registry',
                'label' => 'RG',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'address',
                'label' => 'Endereço',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'address_number',
                'label' => 'Número',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'address_city',
                'label' => 'Cidade',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
            [
                'field' => 'address_state',
                'label' => 'Estado',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'income',
                'label' => 'Renda',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'document' => $this->input->post('document'),
                'registry' => $this->input->post('registry'),
                'address' => $this->input->post('address'),
                'address_number' => $this->input->post('address_number'),
                'address_city' => $this->input->post('address_city'),
                'address_state' => $this->input->post('address_state'),
                'income' => $this->input->post('income'),
                'status' => ($this->input->post('status') != null),
                'created_by' => $this->session->userdata('id'),
            );

            $this->customer->update($id, $data);

            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Cliente atualizado com êxito!');

            redirect(base_url('customers'));
        } else {
            $data['data'] = $this->customer->get_by_id($id);;

            $data['view'] = 'customers/edit';

            $this->load->view('layouts/default', $data);
        }
    }

    public function remover($id){
        $this->customer->delete($id);

        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Cliente removido com êxito!');

        redirect(base_url('customers'));
    }
}
