<?php

class User_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('User');
        $this->obj = $this->CI->User;
    }

    public function test_create_user()
    {
        $data = [
            'name' => 'Alysson',
            'matriculation' => '222222',
            'password' => '123123',
            'status' => true
        ];
        $id = $this->obj->register($data);

        $this->assertNotNull($id);
        $this->obj->delete($id);
    }

    public function test_get_user()
    {
        $data = [
            'name' => 'Alysson',
            'matriculation' => '1111',
            'password' => '123123',
            'status' => true
        ];
        $id = $this->obj->register($data);
        $result = $this->obj->get_by_id($id);

        $this->assertEquals($data['name'], $result->name);
        $this->assertEquals($data['matriculation'], $result->matriculation);
        $this->assertEquals($data['password'], $result->password);
        $this->assertEquals($data['status'], $result->status);

        $this->obj->delete($id);
    }

}
