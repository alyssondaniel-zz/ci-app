<?php

class Product_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('product');
        $this->obj = $this->CI->product;
    }

    public function test_create_product()
    {
        $data = [
            'description' => 'Lorem',
            'cash_price' => 12.12,
            'forward_price' => 23.23,
            'barcode' => '123123123123123123',
            'status' => true,
        ];

        $id = $this->obj->register($data);

        $result = $this->obj->get_by_id($id);

        $this->obj->delete($id);

        $this->assertNotNull($id);

        $this->assertNotNull($result->id);
        $this->assertNotNull($result->description);
        $this->assertNotNull($result->cash_price);
        $this->assertNotNull($result->forward_price);
        $this->assertNotNull($result->barcode);
        $this->assertNotNull($result->status);

        $this->assertEquals($id, $result->id);
        $this->assertEquals($data['description'], $result->description);
        $this->assertEquals($data['cash_price'], $result->cash_price);
        $this->assertEquals($data['forward_price'], $result->forward_price);
        $this->assertEquals($data['barcode'], $result->barcode);
        $this->assertEquals($data['status'], $result->status);
    }

}
