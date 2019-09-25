<?php
require_once APPPATH.'controllers/BaseController.php';

class Sales extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('sale');
        $this->load->model('product');
        $this->load->model('customer');
    }

    public function new() {

        $data['data'] = [];
        $data['view'] = 'sales/new';
        $data['products'] =  $this->product->get_all();
        $data['customers'] =  $this->customer->get_all();

        $this->load->view('layouts/default', $data);
    }

    public function create() {
        $rules = [
            [
                'field' => 'product_id',
                'label' => 'Produto',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve selecionar um %s.'],
            ],
            [
                'field' => 'customer_id',
                'label' => 'Cliente',
                'rules' => 'required',
                'errors' => ['required' => 'Você deve selecionar um %s.'],
            ],
            [
                'field' => 'payment_method',
                'label' => 'Tipo de pagamento',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Você deve selecionar um %s.',
                ],
            ],
            [
                'field' => 'quantity',
                'label' => 'Quantidade',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Você deve preencher uma %s.',
                    'greater_than' => 'A %s não pode ser menor ou igual a zero'
                ],
            ],
            [
                'field' => 'amount',
                'label' => 'Valor',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'O %s deve ser preenchido.',
                    'greater_than' => 'O %s não pode ser menor ou igual a zero'
                ],
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $data = array(
                'product_id' => $this->input->post('product_id'),
                'customer_id' => $this->input->post('customer_id'),
                'payment_method' => $this->input->post('payment_method'),
                'quantity' => $this->input->post('quantity'),
                'amount' => $this->input->post('amount'),
                'status' => true,
                'created_by' => $this->session->userdata('id'),
                'sale_at' => date('Y-m-d H:i:s'),
            );

            $this->sale->insert($data);

            $result['success'] = '<div class="alert alert-success">
                Venda realizada com êxito!
            </div>';
        } else {
            $result['error'] = true;
            $result['product_id'] = form_error('product_id');
            $result['customer_id'] = form_error('customer_id');
            $result['payment_method'] = form_error('payment_method');
            $result['quantity'] = form_error('quantity');
            $result['amount'] = form_error('amount');
        }

        echo json_encode($result);
    }

}
