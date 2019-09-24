<?php
class Users_test extends TestCase
{
    public function test_signin()
    {
        $output = $this->request('GET', 'users/signin');
		$this->assertStringContainsString('<title>Entrar</title>', $output);
    }

}
