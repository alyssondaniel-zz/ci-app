<?php

class Customer_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('customer');
        $this->obj = $this->CI->customer;
    }

    public function test_create_customer()
    {
        $data = [
            'name' => 'Lorem',
            'document' => '123.123.123-12',
            'registry' => '23.23',
            'address' => 'Rua 1',
            'address_number' => 'N 1',
            'address_city' => 'Teresina',
            'address_state' => 'Piauí',
            'income' => '12312.12',
            'status' => true,
        ];

        $id = $this->obj->register($data);

        $result = $this->obj->get_by_id($id);

        $this->obj->delete($id);

        $this->assertNotNull($id);

        $this->assertNotNull($result->id);
        $this->assertNotNull($result->name);
        $this->assertNotNull($result->document);
        $this->assertNotNull($result->registry);
        $this->assertNotNull($result->address);
        $this->assertNotNull($result->address_number);
        $this->assertNotNull($result->address_city);
        $this->assertNotNull($result->address_state);
        $this->assertNotNull($result->income);
        $this->assertNotNull($result->status);

        $this->assertEquals($id, $result->id);
        $this->assertEquals($data['name'], $result->name);
        $this->assertEquals($data['document'], $result->document);
        $this->assertEquals($data['registry'], $result->registry);
        $this->assertEquals($data['address'], $result->address);
        $this->assertEquals($data['address_number'], $result->address_number);
        $this->assertEquals($data['address_city'], $result->address_city);
        $this->assertEquals($data['address_state'], $result->address_state);
        $this->assertEquals($data['income'], $result->income);
        $this->assertEquals($data['status'], $result->status);
    }

}
