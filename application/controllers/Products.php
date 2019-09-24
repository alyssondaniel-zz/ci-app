<?php
require_once APPPATH.'controllers/BaseController.php';

class Products extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('product');
    }

    public function index() {
        $data['data'] = $this->product->get_all();
        $data['view'] = 'products/index';

        $this->load->view('layouts/default', $data);
    }
    public function new() {
        $data['data'] = [];
        $data['view'] = 'products/new';

        $this->load->view('layouts/default', $data);
    }

    public function create() {
        $rules = [
            [
                'field' => 'description',
                'label' => 'Descrição',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
            [
                'field' => 'cash_price',
                'label' => 'Preço a vista',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Você deve preencher um %s.',
                    'is_unique' => 'A %s informada já foi cadastrada.'
                ],
            ],
            [
                'field' => 'forward_price',
                'label' => 'Preço a prazo',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'barcode',
                'label' => 'Código de barras',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $data['data'] = [];

            $data['view'] = 'products/new';

            $this->load->view('layouts/default', $data);
        } else {
            $data = array(
                'description' => $this->input->post('description'),
                'cash_price' => $this->input->post('cash_price'),
                'forward_price' => $this->input->post('forward_price'),
                'barcode' => $this->input->post('barcode'),
                'status' => ($this->input->post('status') != null),
                'created_by' => $this->session->userdata('id'),
            );

            $this->product->insert($data);

            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Produto criado com êxito!');

            redirect(base_url('products'));
        }
    }

    public function edit($id) {
        $data['data'] = $this->product->get_by_id($id);;

        $data['view'] = 'products/edit';

        $this->load->view('layouts/default', $data);
    }

    public function update($id) {
        $rules = [
            [
                'field' => 'description',
                'label' => 'Descrição',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher uma %s.'],
            ],
            [
                'field' => 'cash_price',
                'label' => 'Preço a vista',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Você deve preencher um %s.',
                    'is_unique' => 'A %s informada já foi cadastrada.'
                ],
            ],
            [
                'field' => 'forward_price',
                'label' => 'Preço a prazo',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
            [
                'field' => 'barcode',
                'label' => 'Código de barras',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve preencher um %s.'],
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'description' => $this->input->post('description'),
                'cash_price' => $this->input->post('cash_price'),
                'forward_price' => $this->input->post('forward_price'),
                'barcode' => $this->input->post('barcode'),
                'status' => ($this->input->post('status') != null),
                'created_by' => $this->session->userdata('id'),
            );

            $this->product->update($id, $data);

            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', 'Produto atualizado com êxito!');

            redirect(base_url('products'));
        } else {
            $data['data'] = $this->product->get_by_id($id);;

            $data['view'] = 'products/edit';

            $this->load->view('layouts/default', $data);
        }
    }

    public function remover($id){
        $this->product->delete($id);

        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', 'Produto removido com êxito!');

        redirect(base_url('products'));
    }
}
